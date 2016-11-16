<?php
define('JIEQI_MODULE_NAME', 'article');
require_once('../../global.php');
//if(empty($_REQUEST['id'])) jieqi_printfail(LANG_ERROR_PARAMETER);
jieqi_checklogin();
jieqi_loadlang('article', JIEQI_MODULE_NAME);
include_once(JIEQI_ROOT_PATH.'/class/users.php');
$users_handler =& JieqiUsersHandler::getInstance('JieqiUsersHandler');
$jieqiUsers = $users_handler->get($_SESSION['jieqiUserId']);
if(!$jieqiUsers) jieqi_printfail(LANG_NO_USER);
$userset=unserialize($jieqiUsers->getVar('setting','n'));
include_once(JIEQI_ROOT_PATH.'/header.php');

$jieqiTpl->assign('username', $jieqiUsers->vars['uname']['value']);
$jieqiTpl->assign('flowernums', $jieqiUsers->vars['flower']['value']);
$jieqiTpl->assign('eggnums', $jieqiUsers->vars['egg']['value']);
$jieqiTpl->assign('scorenums', $jieqiUsers->vars['score']['value']);


if($_POST){
    if(empty($_POST['dhflower']) && empty($_POST['dhegg'])){
        jieqi_jumppage('/modules/article/jifen.php', '����ȫ��Ϊ��Ŷ', '<font color="blue">������ת�����Ժ�...</font>');exit;
    }
    $dhflower = $_POST['dhflower'] ? abs((int)$_POST['dhflower']) : '0';$dhegg = $_POST['dhegg'] ? abs((int)$_POST['dhegg']) : '0';
    if($dhflower == '0' && $dhegg == '0'){
        jieqi_jumppage('/modules/article/jifen.php', '�������������', '<font color="blue">������ת�����Ժ�...</font>');exit;
    }
    $zong = $dhflower + $dhegg;
    if($zong > $jieqiUsers->vars['score']['value']){
        jieqi_jumppage('/modules/article/jifen.php', '�������Ļ�������', '<font color="blue">������ת�����Ժ�...</font>');exit;
    }

	mysql_query("UPDATE `jieqi_system_users` SET `score` = `score` - '$zong', `flower` = `flower` + '$dhflower', `egg` = `egg` + '$dhegg' WHERE `uid` = '$_SESSION[jieqiUserId]' LIMIT 1;");

	jieqi_jumppage('/modules/article/jifen.php', '��ϲ���һ��ɹ���', '<font color="blue">������ת�����Ժ�...</font>');
}
include_once($jieqiModules['article']['path'].'/class/article.php');

$jieqiTset['jieqi_contents_template'] = $jieqiModules['article']['path'].'/templates/jifen.html';
include_once(JIEQI_ROOT_PATH.'/footer.php');

