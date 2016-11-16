CREATE TABLE `jieqi_system_promotions` (
  `ip` char(15) NOT NULL default '',                        
  `uid` int(11) NOT NULL default '0',                       
  `username` varchar(30) NOT NULL default '',               
  PRIMARY KEY  (`ip`)
) TYPE=MyISAM;

CREATE TABLE jieqi_system_registerip (
  ip char(15) NOT NULL default '',
  regtime int(11) unsigned NOT NULL default '0',
  count smallint(6) NOT NULL default '0',
  KEY (ip)
) TYPE=MyISAM;

ALTER TABLE `jieqi_system_users` ADD `weekscore` INT( 11 ) NOT NULL DEFAULT '0' AFTER `monthscore`;
ALTER TABLE `jieqi_system_users` ADD `dayscore` INT( 11 ) NOT NULL DEFAULT '0' AFTER `weekscore`;
ALTER TABLE `jieqi_system_users` ADD `lastscore` INT( 11 ) UNSIGNED NOT NULL DEFAULT '0' AFTER `dayscore`;
ALTER TABLE `jieqi_system_users` CHANGE `petid` `workid` TINYINT( 3 ) NOT NULL DEFAULT '0';

ALTER TABLE `jieqi_system_honors` CHANGE `caption` `caption` VARCHAR( 250 ) NOT NULL;


UPDATE `jieqi_system_configs` SET cname='maxfriends' WHERE modname='system' AND cname='maxfriendsnum';

UPDATE `jieqi_system_configs` SET cname='maxdaymsg' WHERE modname='system' AND cname='msgdaylimit';

UPDATE `jieqi_system_configs` SET ctitle='�û��б�ÿҳ��ʾ��' WHERE modname='system' AND cname='userpnum';

INSERT INTO `jieqi_system_configs` (`cid`, `modname`, `cname`, `ctitle`, `cvalue`, `cdescription`, `cdefine`, `ctype`, `options`, `catorder`, `catname`) VALUES (0, 'system', 'friendspnum', '�����б�ÿҳ��ʾ��', '50', '', 0, 3, '', 11200, '��ʾ����');
INSERT INTO `jieqi_system_configs` (`cid`, `modname`, `cname`, `ctitle`, `cvalue`, `cdescription`, `cdefine`, `ctype`, `options`, `catorder`, `catname`) VALUES (0, 'system', 'maxfriends', '����������', '50', '', 0, 3, '', 11300, '��ʾ����');

INSERT INTO `jieqi_system_configs` (`cid`, `modname`, `cname`, `ctitle`, `cvalue`, `cdescription`, `cdefine`, `ctype`, `options`, `catorder`, `catname`) VALUES (0, 'system', 'JIEQI_COOKIE_DOMAIN', 'cookie����Ч����', '', '�����ö��������ʱ��Ϊ��cookieͬ���������������ó�����������abc.com��������ʹ��ϵͳĬ��ֵ', 1, 1, '', 31820, '��ʾ����');

INSERT INTO `jieqi_system_configs` (`cid`, `modname`, `cname`, `ctitle`, `cvalue`, `cdescription`, `cdefine`, `ctype`, `options`, `catorder`, `catname`) VALUES (0, 'system', 'JIEQI_MAIN_SERVER', '����������ַ', '', '��ʹ�ö�������������������������ַ���磺http://www.domain.com�������治��б�ߣ�����������������', 1, 1, '', 10520, '��վ������Ϣ');

INSERT INTO `jieqi_system_configs` (`cid`, `modname`, `cname`, `ctitle`, `cvalue`, `cdescription`, `cdefine`, `ctype`, `options`, `catorder`, `catname`) VALUES (0, 'system', 'JIEQI_USER_ENTRY', '�û���ڷ�������ַ', '', '��ʹ�ö����������������û�ע�ᡢ��¼���˳��ȹ��ܵķ�������ַ���磺http://www.domain.com�������治��б�ߣ�����������������', 1, 1, '', 10530, '��վ������Ϣ');

INSERT INTO `jieqi_system_configs` (`cid`, `modname`, `cname`, `ctitle`, `cvalue`, `cdescription`, `cdefine`, `ctype`, `options`, `catorder`, `catname`) VALUES (0, 'system', 'JIEQI_PROMOTION_VISIT', '�����ƹ����ӹ���ֵ', '0', '������ͨ���û��ṩ���ƹ�����(�� index.php?fromuid=1)������վ���ƹ������õĹ���ֵ������Ϊ 0 ��ʾ�����ñ����ܡ�', 1, 3, '', 33100, '��ʾ����');

INSERT INTO `jieqi_system_configs` (`cid`, `modname`, `cname`, `ctitle`, `cvalue`, `cdescription`, `cdefine`, `ctype`, `options`, `catorder`, `catname`) VALUES (0, 'system', 'JIEQI_PROMOTION_REGISTER', 'ע���ƹ����ӹ���ֵ', '0', '������ͨ���û��ṩ���ƹ�����(�� index.php?fromuid=1)������վ��ע��Ϊ��Ա���ƹ������õĹ���ֵ������Ϊ 0 ��ʾ�����ñ����ܡ�', 1, 3, '', 33200, '��ʾ����');

INSERT INTO `jieqi_system_configs` (`cid`, `modname`, `cname`, `ctitle`, `cvalue`, `cdescription`, `cdefine`, `ctype`, `options`, `catorder`, `catname`) VALUES (0, 'system', 'maxdaymsg', 'ÿ��������Ϣ��', '0', '���ó� 0 ��ʾ������ÿ�췢��������', 0, 3, '', 11050, '��ʾ����');

INSERT INTO `jieqi_system_configs` (`cid`, `modname`, `cname`, `ctitle`, `cvalue`, `cdescription`, `cdefine`, `ctype`, `options`, `catorder`, `catname`) VALUES (0, 'system', 'sendmsgscore', '����ÿ�췢��Ϣ�����������һ�����ٻ���', '0', '������ó� 0 ��������Ͷ���', 0, 3, '', 20250, '��������');

INSERT INTO `jieqi_system_configs` (`cid`, `modname`, `cname`, `ctitle`, `cvalue`, `cdescription`, `cdefine`, `ctype`, `options`, `catorder`, `catname`) VALUES (0, 'system', 'regtimelimit', 'ͬһIP����Сʱ�ڽ�ֹ�ظ�ע��', '0', '���ó� 0 ��ʾ������', 0, 3, '', 12100, '��ʾ����');

INSERT INTO `jieqi_system_configs` (`cid`, `modname`, `cname`, `ctitle`, `cvalue`, `cdescription`, `cdefine`, `ctype`, `options`, `catorder`, `catname`) VALUES (0, 'system', 'usernamelimit', 'ע���û�������', '0', '', 0, 7, 'a:2:{i:0;s:20:"������Ӣ�ļ��������";i:1;s:20:"������Ӣ�ĺ��������";}', 12200, '��ʾ����');

INSERT INTO `jieqi_system_right` (`rid`, `modname`, `rname`, `rtitle`, `rdescription`, `rhonors`) VALUES (0, 'system', 'maxdaymsg', 'ÿ��������Ϣ��', '', '');