<?php
/**
 * HTTP������
 *
 * HTTP������
 * 
 * ����ģ�壺��
 * 
 * @category   jieqicms
 * @package    system
 * @copyright  Copyright (c) Hangzhou Jieqi Network Technology Co.,Ltd. (http://www.jieqi.com)
 * @author     $Author: juny $
 * @version    $Id: listener.php 312 2008-12-29 05:30:54Z juny $
 */

class JieqiRequest_Listener extends JieqiObject { 

    var $_id;

    function JieqiRequest_Listener()
    {
		$this->JieqiObject();
        $this->_id = md5(uniqid('http_request_', 1));
    }


    //���id
    function getId()
    {
        return $this->_id;
    }


    //�����ļ����¼�
    function update(&$subject, $event, $data = NULL)
    {
        echo "Notified of event: '$event'\n";
        if (NULL !== $data) {
            echo "Additional data: ";
            var_dump($data);
        }
    }
}
?>