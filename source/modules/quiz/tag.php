<?php
define('JIEQI_MODULE_NAME', 'quiz');
require_once('../../global.php');

jieqi_getconfigs('quiz', 'tag_list','jieqiBlocks');

$linkurl=$jieqiConfigs['quiz']['domainname']==""?$jieqiModules['quiz']['url']:$jieqiConfigs['quiz']['domainname'];

jieqi_getconfigs('quiz', 'configs');
jieqi_getconfigs('quiz', 'blocks');

//��TAG��ǩ�ĵ��������1
jieqi_includedb();//�������ݿ���
$query=JieqiQueryHandler::getInstance('JieqiQueryHandler');//ʵ�������ݿ���
$sql="update ".jieqi_dbprefix('quiz_tag')." set click=click+1 where tagname = '".$_REQUEST['tagname']."'";
$res=$query->execute($sql);//ִ��SQL���

include_once(JIEQI_ROOT_PATH.'/header.php');
if(!is_object($jieqiTpl)) $jieqiTpl =& JieqiTpl::getInstance();
$jieqiTpl->assign('linkurl',$linkurl); 
$jieqiTset['jieqi_contents_template'] = '';  //����λ�ò���ֵ��ȫ��������
include_once(JIEQI_ROOT_PATH.'/footer.php');
?>