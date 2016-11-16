<?php
/**
 * HTTP�ͻ���
 *
 * HTTP�ͻ���
 * 
 * ����ģ�壺��
 * 
 * @category   jieqicms
 * @package    system
 * @copyright  Copyright (c) Hangzhou Jieqi Network Technology Co.,Ltd. (http://www.jieqi.com)
 * @author     $Author: juny $
 * @version    $Id: client.php 301 2008-12-26 04:36:17Z juny $
 */

require_once('request.php');
require_once('cookiemanager.php');


class JieqiClient extends JieqiObject
{

    var $_cookieManager;

    var $_responses;

    var $_defaultHeaders = array();

    var $_defaultRequestParams = array();

    var $_redirectCount = 0;

    var $_maxRedirects = 5;

    var $_listeners = array();

    var $_propagate = array();

    var $_isHistoryEnabled = false; //������ʷ��¼


    function JieqiClient($defaultRequestParams = NULL, $defaultHeaders = NULL, $defaultCookies = NULL)
    {
		$this->JieqiObject();
        $this->_cookieManager =& new JieqiClient_CookieManager();
        if (isset($defaultHeaders)) {
            $this->setDefaultHeader($defaultHeaders);
        }
        if (isset($defaultRequestParams)) {
            $this->setRequestParameter($defaultRequestParams);
        }
        if (isset($defaultCookies)) {
            $this->setDefaultCookies($defaultCookies);
        }
    }


    //�������Ӷ������
    function setMaxRedirects($value)
    {
        $this->_maxRedirects = $value;
    }


    //�Ƿ��¼��ʷ����
    function enableHistory($enable)
    {
        $this->_isHistoryEnabled = (bool)$enable;
    }

    //��������
    function &_createRequest($url, $method = HTTP_REQUEST_METHOD_GET)
    {
        $req =& new JieqiRequest($url, $this->_defaultRequestParams);
        $req->setMethod($method);
        foreach ($this->_defaultHeaders as $name => $value) {
            $req->addHeader($name, $value);
        }
        $this->_cookieManager->passCookies($req);
        foreach ($this->_propagate as $id => $propagate) {
            if ($propagate) {
                $req->attach($this->_listeners[$id]);
            }
        }
        return $req;
    }
    

    //����ͷ��Ϣ
    function head($url)
    {
        $request =& $this->_createRequest($url, HTTP_REQUEST_METHOD_HEAD);
        return $this->_performRequest($request);
    }
   

    //����GET����
    function get($url, $data = NULL, $preEncoded = false)
    {
        $request =& $this->_createRequest($url);
        if (is_array($data)) {
            foreach ($data as $name => $value) {
                $request->addQueryString($name, $value, $preEncoded);
            }
        } elseif (isset($data)) {
            $request->addRawQueryString($data, $preEncoded);
        }
        return $this->_performRequest($request);
    }


    //����post����
    function post($url, $data, $preEncoded = false, $files = array())
    {
        $request =& $this->_createRequest($url, HTTP_REQUEST_METHOD_POST);
        
        if (is_array($data)) {
            foreach ($data as $name => $value) {
                $request->addPostData($name, $value, $preEncoded);
            }
        } else {
            $request->addRawPostData($data, $preEncoded);
        }
        foreach ($files as $fileData) {
            $res = call_user_func_array(array(&$request, 'addFile'), $fileData);
            if ($res==false) {
                return $res;
            }
        }
        return $this->_performRequest($request);
    }


    //����Ĭ��ͷ
    function setDefaultHeader($name, $value = NULL)
    {
        if (is_array($name)) {
            $this->_defaultHeaders = array_merge($this->_defaultHeaders, $name);
        } else {
            $this->_defaultHeaders[$name] = $value;
        }
    }


    //�����������
    function setRequestParameter($name, $value = NULL)
    {
        if (is_array($name)) {
            $this->_defaultRequestParams = array_merge($this->_defaultRequestParams, $name);
        } else {
            $this->_defaultRequestParams[$name] = $value;
        }
    }
    
    //Ĭ��cookie
    function setDefaultCookies($defaultCookies){
    	$this->_cookieManager->setCookies($defaultCookies);
    }
    
    //ȡ��cookie
    function getDefaultCookies(){
    	return $this->_cookieManager->getCookies();
    }
      

    //ִ������
    function _performRequest(&$request)
    {
        // If this is not a redirect, notify the listeners of new request
        if (0 == $this->_redirectCount) {
            $this->_notify('request', $request->_url->getUrl());
        }
		$err = $request->sendRequest();
		if($err==false) return false;
        $this->_pushResponse($request);

        $code = $request->getResponseCode();
        
        if ($this->_maxRedirects > 0 && in_array($code, array(300, 301, 302, 303, 307))) {
            if (++$this->_redirectCount > $this->_maxRedirects) {
                $this->raiseError('too many redirects!', JIEQI_ERROR_RETURN);
				return false;
            }
            $location = $request->getResponseHeader('Location');
            if ('' == $location) {
				$this->raiseError('error redirects url!', JIEQI_ERROR_RETURN);
				return false;
            }
            $url = $this->_redirectUrl($request->_url, $location);
            // Notify of redirection
            $this->_notify('httpRedirect', $url);
            // we access the private properties directly, as there are no accessors for them
            switch ($request->_method) {
                case HTTP_REQUEST_METHOD_POST: 
                    if (302 == $code || 303 == $code) {
                        return $this->get($url);
                    } else {
                        $postFiles = array();
                        foreach ($request->_postFiles as $name => $data) {
                            $postFiles[] = array($name, $data['name'], $data['type']);
                        }
                        return $this->post($url, $request->_postData, true, $postFiles);
                    }
                case HTTP_REQUEST_METHOD_HEAD:
                    return (303 == $code? $this->get($url): $this->head($url));
                case HTTP_REQUEST_METHOD_GET: 
                default:
                    return $this->get($url);
            } // switch

        } else {
            $this->_redirectCount = 0;
            if (400 >= $code) {
                $this->_notify('httpSuccess');
                $this->setDefaultHeader('Referer', $request->_url->getUrl());
                // some result processing should go here
            } else {
                $this->_notify('httpError');
            }
        }
        return $code;
    }


    //�������ķ�����Ϣ
    function &currentResponse()
    {
        return $this->_responses[count($this->_responses) - 1];      
    }

    //���淵���������ջ
    function _pushResponse(&$request)
    {
        $this->_cookieManager->updateCookies($request);
        $idx   = $this->_isHistoryEnabled? count($this->_responses): 0;
        $this->_responses[$idx] = array(
            'code'    => $request->getResponseCode(),
            'headers' => $request->getResponseHeader(),
            'body'    => $request->getResponseBody()
        );
    }


    //����
    function reset()
    {
        $this->_cookieManager->reset();
        $this->_responses            = array();
        $this->_defaultHeaders       = array();
        $this->_defaultRequestParams = array();
    }


    //���Ӽ���
    function attach(&$listener, $propagate = false)
    {
        if (!is_a($listener, 'JieqiRequest_Listener')) {
            return false;
        }
        $this->_listeners[$listener->getId()] =& $listener;
        $this->_propagate[$listener->getId()] =  $propagate;
        return true;
    }


    //ɾ������
    function detach(&$listener)
    {
        if (!is_a($listener, 'JieqiRequest_Listener') || 
            !isset($this->_listeners[$listener->getId()])) {
            return false;
        }
        unset($this->_listeners[$listener->getId()], $this->_propagate[$listener->getId()]);
        return true;
    }


    //��������
    function _notify($event, $data = NULL)
    {
        foreach (array_keys($this->_listeners) as $id) {
            $this->_listeners[$id]->update($this, $event, $data);
        }
    }


    //�ض���
    function _redirectUrl($url, $location)
    {
        if (preg_match('!^https?://!i', $location)) {
            return $location;
        } else {
            if ('/' == $location{0}) {
                $url->path = JieqiUrl::resolvePath($location);
            } elseif('/' == substr($url->path, -1)) {
                $url->path = JieqiUrl::resolvePath($url->path . $location);
            } else {
                $dirname = (DIRECTORY_SEPARATOR == dirname($url->path)? '/': dirname($url->path));
                $url->path = JieqiUrl::resolvePath($dirname . '/' . $location);
            }
            $url->querystring = array();
            $url->anchor      = '';
            return $url->getUrl();
        }
    }
}
?>