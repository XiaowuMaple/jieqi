CREATE TABLE `jieqi_system_pposts` (
  `ppostid` int(11) unsigned NOT NULL auto_increment,
  `siteid` smallint(6) unsigned NOT NULL default '0',
  `ptopicid` int(11) unsigned NOT NULL default '0',
  `istopic` tinyint(1) NOT NULL default '0',
  `ownerid` int(11) unsigned NOT NULL default '0',
  `posterid` int(11) NOT NULL default '0',
  `poster` varchar(30) NOT NULL default '',
  `posttime` int(11) NOT NULL default '0',
  `posterip` varchar(25) NOT NULL default '',
  `subject` varchar(60) NOT NULL default '',
  `posttext` mediumtext NOT NULL,
  `size` int(11) NOT NULL default '0',
  PRIMARY KEY  (`ppostid`),
  KEY `ownerid` (`ownerid`),
  KEY `ptopicid` (`ptopicid`,`posttime`)
) TYPE=MyISAM;

CREATE TABLE `jieqi_system_ptopics` (
  `ptopicid` int(11) unsigned NOT NULL auto_increment,
  `siteid` smallint(6) unsigned NOT NULL default '0',
  `ownerid` int(11) unsigned NOT NULL default '0',
  `title` varchar(60) NOT NULL default '',
  `posterid` int(11) NOT NULL default '0',
  `poster` varchar(30) NOT NULL default '',
  `posttime` int(11) NOT NULL default '0',
  `replytime` int(11) NOT NULL default '0',
  `views` mediumint(8) unsigned NOT NULL default '0',
  `replies` mediumint(8) unsigned NOT NULL default '0',
  `islock` tinyint(1) NOT NULL default '0',
  `istop` int(11) NOT NULL default '0',
  `isgood` tinyint(1) NOT NULL default '0',
  `topictype` tinyint(1) NOT NULL default '0',
  `lastinfo` varchar(255) NOT NULL default '',
  `size` int(11) NOT NULL default '0',
  PRIMARY KEY  (`ptopicid`),
  KEY `ownerid` (`ownerid`,`istop`,`replytime`)
) TYPE=MyISAM;


CREATE TABLE `jieqi_system_blockconfigs` (
  `id` int(11) unsigned NOT NULL auto_increment,
  `modules` varchar(10) NOT NULL default '',
  `name` varchar(30) NOT NULL default '',
  `file` varchar(30) NOT NULL default '',
  PRIMARY KEY  (`id`)
) TYPE=MyISAM;

CREATE TABLE `jieqi_system_mblock` (
  `id` int(11) unsigned NOT NULL auto_increment,
  `modules` varchar(10) NOT NULL default '',
  `name` varchar(20) NOT NULL default '',
  `file` varchar(20) NOT NULL default '',
  `classname` varchar(20) NOT NULL default '',
  `introduce` mediumtext NOT NULL,
  `vars` tinyint(1) NOT NULL default '1',
  PRIMARY KEY  (`id`)
) TYPE=MyISAM;




DELETE FROM `jieqi_system_configs` WHERE modname='system' AND cname='userrnum';

ALTER TABLE `jieqi_system_online` ADD `name` VARCHAR( 30 ) BINARY NOT NULL DEFAULT '' AFTER `uname` ;

DELETE FROM `jieqi_system_configs` WHERE modname='system' AND cname='onlinernum';

ALTER TABLE `jieqi_system_users` CHANGE `avatar` `avatar` INT( 11 ) NOT NULL DEFAULT '0';

ALTER TABLE `jieqi_system_users` CHANGE `otherinfo` `badges` TEXT NOT NULL DEFAULT '';


INSERT INTO `jieqi_system_configs` (`cid`, `modname`, `cname`, `ctitle`, `cvalue`, `cdescription`, `cdefine`, `ctype`, `options`, `catorder`, `catname`) VALUES (0, 'system', 'JIEQI_AJAX_PAGE', '�Ƿ�ʹ��AJAX��ҳ', '0', '', 1, 7, 'a:2:{i:1;s:2:"��";i:0;s:2:"��";}', 32460, '��ʾ����');


INSERT INTO `jieqi_system_configs` (`cid`, `modname`, `cname`, `ctitle`, `cvalue`, `cdescription`, `cdefine`, `ctype`, `options`, `catorder`, `catname`) VALUES (0, 'system', 'mailtype', '�ʼ����ͷ�ʽ', '1', '', 0, 7, 'a:4:{i:0;s:14:"�������κ��ʼ�";i:1;s:40:"ͨ�� PHP ������ UNIX sendmail ����(�Ƽ�)";i:2;s:49:"ͨ�� SOCKET ���� SMTP ����������(֧�� ESMTP ��֤)";i:3;s:60:"ͨ�� PHP ���� SMTP ���� Email(�� win32 ����Ч, ��֧�� ESMTP)";}', 30100, '�ʼ�����');

INSERT INTO `jieqi_system_configs` (`cid`, `modname`, `cname`, `ctitle`, `cvalue`, `cdescription`, `cdefine`, `ctype`, `options`, `catorder`, `catname`) VALUES (0, 'system', 'maildelimiter', '�ʼ�ͷ�ķָ���', '1', '', 0, 7, 'a:2:{i:0;s:18:"ʹ�� LF ��Ϊ�ָ���";i:1;s:20:"ʹ�� CRLF ��Ϊ�ָ���";}', 30200, '�ʼ�����');

INSERT INTO `jieqi_system_configs` (`cid`, `modname`, `cname`, `ctitle`, `cvalue`, `cdescription`, `cdefine`, `ctype`, `options`, `catorder`, `catname`) VALUES (0, 'system', 'mailserver', 'SMTP ������', '', '�磺smtp.jieqi.com', 0, 1, '', 30300, '�ʼ�����');

INSERT INTO `jieqi_system_configs` (`cid`, `modname`, `cname`, `ctitle`, `cvalue`, `cdescription`, `cdefine`, `ctype`, `options`, `catorder`, `catname`) VALUES (0, 'system', 'mailport', 'SMTP �˿�', '25', 'Ĭ�ϲ����޸�', 0, 3, '', 30400, '�ʼ�����');

INSERT INTO `jieqi_system_configs` (`cid`, `modname`, `cname`, `ctitle`, `cvalue`, `cdescription`, `cdefine`, `ctype`, `options`, `catorder`, `catname`) VALUES (0, 'system', 'mailauth', '�Ƿ���Ҫ AUTH LOGIN ��֤', '1', '', 0, 7, 'a:2:{i:1;s:2:"��";i:0;s:2:"��";}', 30500, '�ʼ�����');

INSERT INTO `jieqi_system_configs` (`cid`, `modname`, `cname`, `ctitle`, `cvalue`, `cdescription`, `cdefine`, `ctype`, `options`, `catorder`, `catname`) VALUES (0, 'system', 'mailfrom', '�����˵�ַ', '', '�����Ҫ��֤,����Ϊ����������ַ����ַд�������� webmaster@jieqi.com ���� JieqiCMS <webmaster@jieqi.com>', 0, 1, '', 30500, '�ʼ�����');

INSERT INTO `jieqi_system_configs` (`cid`, `modname`, `cname`, `ctitle`, `cvalue`, `cdescription`, `cdefine`, `ctype`, `options`, `catorder`, `catname`) VALUES (0, 'system', 'mailuser', '��֤�û���', '', 'SMTP �ʼ��������û���(�磺webmaster@jieqi.com)', 0, 1, '', 30600, '�ʼ�����');

INSERT INTO `jieqi_system_configs` (`cid`, `modname`, `cname`, `ctitle`, `cvalue`, `cdescription`, `cdefine`, `ctype`, `options`, `catorder`, `catname`) VALUES (0, 'system', 'mailpassword', '��֤����', '', 'SMTP �ʼ�����������', 0, 1, '', 30700, '�ʼ�����');


INSERT INTO `jieqi_system_power` (`pid`, `modname`, `pname`, `ptitle`, `pdescription`, `pgroups`) VALUES (0, 'system', 'haveparlor', 'ӵ�и��˻����', '', '');
INSERT INTO `jieqi_system_power` (`pid`, `modname`, `pname`, `ptitle`, `pdescription`, `pgroups`) VALUES (0, 'system', 'parlorpost', '�����ڻ���ҷ���', '', '');
INSERT INTO `jieqi_system_power` (`pid`, `modname`, `pname`, `ptitle`, `pdescription`, `pgroups`) VALUES (0, 'system', 'manageallparlor', '�������л����', '', '');


INSERT INTO `jieqi_system_configs` (`cid`, `modname`, `cname`, `ctitle`, `cvalue`, `cdescription`, `cdefine`, `ctype`, `options`, `catorder`, `catname`) VALUES (0, 'system', 'ppostneedscore', '���ٻ������������ڻ���ҷ���', '', '', 0, 3, '', 21000, '��������');

INSERT INTO `jieqi_system_configs` (`cid`, `modname`, `cname`, `ctitle`, `cvalue`, `cdescription`, `cdefine`, `ctype`, `options`, `catorder`, `catname`) VALUES (0, 'system', 'scoreptopic', '����ҷ������ӻ���', '', '', 0, 3, '', 21100, '��������');

INSERT INTO `jieqi_system_configs` (`cid`, `modname`, `cname`, `ctitle`, `cvalue`, `cdescription`, `cdefine`, `ctype`, `options`, `catorder`, `catname`) VALUES (0, 'system', 'minpposttime', '����ҷ�����Ҫ���������', '0', '', 0, 3, '', 13100, '��ʾ����');

INSERT INTO `jieqi_system_configs` (`cid`, `modname`, `cname`, `ctitle`, `cvalue`, `cdescription`, `cdefine`, `ctype`, `options`, `catorder`, `catname`) VALUES (0, 'system', 'minppostsize', '����ҷ��������ֽ���', '0', '', 0, 3, '', 13200, '��ʾ����');

INSERT INTO `jieqi_system_configs` (`cid`, `modname`, `cname`, `ctitle`, `cvalue`, `cdescription`, `cdefine`, `ctype`, `options`, `catorder`, `catname`) VALUES (0, 'system', 'maxppostsize', '����ҷ�������ֽ���', '0', '', 0, 3, '', 13300, '��ʾ����');

INSERT INTO `jieqi_system_configs` (`cid`, `modname`, `cname`, `ctitle`, `cvalue`, `cdescription`, `cdefine`, `ctype`, `options`, `catorder`, `catname`) VALUES (0, 'system', 'checkppostrubbish', '�Ƿ����ˮ', '0', '', 0, 7, 'a:2:{i:1;s:2:"��";i:0;s:2:"��";}', 13400, '��ʾ����');

INSERT INTO `jieqi_system_configs` (`cid`, `modname`, `cname`, `ctitle`, `cvalue`, `cdescription`, `cdefine`, `ctype`, `options`, `catorder`, `catname`) VALUES (0, 'system', 'hideppostwords', '����ҷ������ص���', '', '', 0, 1, '', 13500, '��ʾ����');


INSERT INTO `jieqi_system_configs` (`cid`, `modname`, `cname`, `ctitle`, `cvalue`, `cdescription`, `cdefine`, `ctype`, `options`, `catorder`, `catname`) VALUES (0, 'system', 'ptopicpnum', '���������ÿҳ��ʾ��', '20', '', 0, 3, '', 13600, '��ʾ����');

INSERT INTO `jieqi_system_configs` (`cid`, `modname`, `cname`, `ctitle`, `cvalue`, `cdescription`, `cdefine`, `ctype`, `options`, `catorder`, `catname`) VALUES (0, 'system', 'ppostpnum', '����һظ�ÿҳ��ʾ��', '10', '', 0, 3, '', 13700, '��ʾ����');

INSERT INTO `jieqi_system_configs` (`cid`, `modname`, `cname`, `ctitle`, `cvalue`, `cdescription`, `cdefine`, `ctype`, `options`, `catorder`, `catname`) VALUES (0, 'system', 'avatardir', '��Աͷ�񱣴�Ŀ¼', 'avatar', '', 0, 1, '', 13100, '��ʾ����');

INSERT INTO `jieqi_system_configs` (`cid`, `modname`, `cname`, `ctitle`, `cvalue`, `cdescription`, `cdefine`, `ctype`, `options`, `catorder`, `catname`) VALUES (0, 'system', 'avatartype', 'ͷ�������ϴ����ļ�����', '.gif .jpg .jpeg .png', '��������ÿո�ֿ�����".gif .jpg .jpeg .png"', 0, 1, '', 13200, '��ʾ����');

INSERT INTO `jieqi_system_configs` (`cid`, `modname`, `cname`, `ctitle`, `cvalue`, `cdescription`, `cdefine`, `ctype`, `options`, `catorder`, `catname`) VALUES (0, 'system', 'avatarsize', 'ͷ���ļ����ó�����K', '20', '', 0, 3, '', 13300, '��ʾ����');


INSERT INTO `jieqi_system_blockconfigs` (`id` ,`modules` ,`name` ,`file`) VALUES (0 , 'system', '��վ��ҳ', 'blocks');
INSERT INTO `jieqi_system_blockconfigs` (`id` ,`modules` ,`name` ,`file`) VALUES (0 , 'system', '�û��б���', 'memberblocks');
INSERT INTO `jieqi_system_blockconfigs` (`id` ,`modules` ,`name` ,`file`) VALUES (0 , 'system', '�û���嵼��', 'userblocks');

INSERT INTO `jieqi_system_blockconfigs` (`id` ,`modules` ,`name` ,`file`) VALUES (0 , 'article', 'С˵���ҵ���', 'authorblocks');
INSERT INTO `jieqi_system_blockconfigs` (`id` ,`modules` ,`name` ,`file`) VALUES (0 , 'article', 'С˵�б���', 'guideblocks');

INSERT INTO `jieqi_system_blockconfigs` (`id` ,`modules` ,`name` ,`file`) VALUES (0 , 'obook', '���������ҵ���', 'authorblocks');
INSERT INTO `jieqi_system_blockconfigs` (`id` ,`modules` ,`name` ,`file`) VALUES (0 , 'obook', '�������б���', 'guideblocks');

INSERT INTO `jieqi_system_blockconfigs` (`id` ,`modules` ,`name` ,`file`) VALUES (0 , 'cartoon', '�������ҵ���', 'authorblocks');
INSERT INTO `jieqi_system_blockconfigs` (`id` ,`modules` ,`name` ,`file`) VALUES (0 , 'cartoon', '�����б���', 'guideblocks');