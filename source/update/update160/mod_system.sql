CREATE TABLE `jieqi_system_report` (
  `reportid` int(11) unsigned NOT NULL auto_increment,
  `siteid` smallint(6) unsigned NOT NULL default '0',
  `reporttime` int(11) unsigned NOT NULL default '0',
  `reportuid` int(11) unsigned NOT NULL default '0',
  `reportname` varchar(30) binary NOT NULL default '',
  `authtime` int(11) unsigned NOT NULL default '0',
  `authuid` int(11) unsigned NOT NULL default '0',
  `authname` varchar(30) binary NOT NULL default '',
  `reporttitle` varchar(100) NOT NULL default '',
  `reporttext` mediumtext NOT NULL,
  `reportsize` int(11) unsigned NOT NULL default '0',
  `reportfield` varchar(250) NOT NULL default '',
  `authnote` text NOT NULL,
  `reportsort` smallint(6) unsigned NOT NULL default '0',
  `reporttype` smallint(6) unsigned NOT NULL default '0',
  `authflag` tinyint(3) unsigned NOT NULL default '0',
  PRIMARY KEY  (`reportid`),
  KEY (`reportsort`),
  KEY (`reporttype`),
  KEY (`reportname`),
  KEY (`authname`)
) TYPE=MyISAM;

CREATE TABLE `jieqi_system_userlink` (
  `ulid` int(11) unsigned NOT NULL auto_increment,
  `ultitle` varchar(60) NOT NULL default '',
  `ulurl` varchar(100) NOT NULL default '',
  `ulinfo` varchar(255) NOT NULL default '',
  `userid` int(11) unsigned NOT NULL default '0',
  `username` varchar(30) NOT NULL default '',
  `score` tinyint(1) NOT NULL default '0',
  `weight`  smallint(6) NOT NULL default '0',
  `toptime` int(11) NOT NULL default '0',
  `addtime` int(11) NOT NULL default '0',
  `allvisit` int(11) NOT NULL default '0',
  PRIMARY KEY  (`ulid`),
  KEY (`userid`, `toptime`)
) TYPE=MyISAM;

DELETE FROM `jieqi_system_configs` WHERE modname='system' AND cname='JIEQI_SYSTEM_MENU';

DELETE FROM `jieqi_system_blocks` WHERE modname='system' AND filename='block_userstatus';

UPDATE `jieqi_system_blocks` SET contenttype=4 WHERE modname='system' AND filename='block_login';
UPDATE `jieqi_system_blocks` SET publish=3 WHERE modname='system' AND filename='block_login' AND publish=1;
UPDATE `jieqi_system_blocks` SET contenttype=4 WHERE modname='system' AND filename='block_userlist';


INSERT INTO `jieqi_system_blocks` (`bid`, `blockname`, `modname`, `filename`, `classname`, `side`, `title`, `description`, `content`, `vars`, `template`, `cachetime`, `contenttype`, `weight`, `showstatus`, `custom`, `canedit`, `publish`, `hasvars`) VALUES(0, '�û��Ƽ�����', 'system', 'block_usercommend', 'BlockSystemUsercommend', 0, '�û��Ƽ�', '&nbsp;&nbsp;&nbsp;&nbsp;������������õĲ�����ʾ��ӦID���û�<br>&nbsp;&nbsp;&nbsp;&nbsp;Ĭ��һ�������������Ƽ����û�ID�����ID�á�|���ָ���� 12|34|56', '', '', 'block_usercommend.html', 0, 4, 11250, 0, 0, 0, 0, 2);

INSERT INTO `jieqi_system_blocks` (`bid`, `blockname`, `modname`, `filename`, `classname`, `side`, `title`, `description`, `content`, `vars`, `template`, `cachetime`, `contenttype`, `weight`, `showstatus`, `custom`, `canedit`, `publish`, `hasvars`) VALUES(0, '�û���������', 'system', 'block_userlink', 'BlockSystemUserlink', 1, '�û���������', '&nbsp;&nbsp;&nbsp;&nbsp;��������ʾĳһ�û�����ӵ���������<br>&nbsp;&nbsp;&nbsp;&nbsp;�������������������ͬ����֮����Ӣ�Ķ��ŷָ���,����<br>&nbsp;&nbsp;&nbsp;&nbsp;����һ�������ֶΣ��������óɡ�toptime��-�ö�ʱ�䣬���ߡ�addtime��-���ʱ��<br>&nbsp;&nbsp;&nbsp;&nbsp;����������ʾ������¼��Ĭ��10<br>&nbsp;&nbsp;&nbsp;&nbsp;������������ʽ��0-�Ӵ�С��1-��С����<br>&nbsp;&nbsp;&nbsp;&nbsp;����������ʾ�ĸ��û����������ӣ��������óɡ�self��-��ǰ�û�����uid��-url��������uidֵ��Ӧ���û�����0��-�����û������óɴ���0��һ����������ʾָ�����uid���û�<br>&nbsp;&nbsp;&nbsp;&nbsp;�����������ݹ��ˣ�0-����ʾ��1-��ʾ�ö������ӣ�2-��ʾ���ö�����', '', 'toptime,10,0,uid,0', 'block_userlink.html', 0, 4, 11300, 0, 0, 0, 0, 1);

INSERT INTO `jieqi_system_blocks` (`bid`, `blockname`, `modname`, `filename`, `classname`, `side`, `title`, `description`, `content`, `vars`, `template`, `cachetime`, `contenttype`, `weight`, `showstatus`, `custom`, `canedit`, `publish`, `hasvars`) VALUES(0, '�û������б�', 'system', 'block_ufriends', 'BlockSystemUfriends', 1, '�û������б�', '&nbsp;&nbsp;&nbsp;&nbsp;��������ʾĳһ�û������б�<br>&nbsp;&nbsp;&nbsp;&nbsp;���������ĸ���������ͬ����֮����Ӣ�Ķ��ŷָ���,����<br>&nbsp;&nbsp;&nbsp;&nbsp;����һ�������ֶΣ��������óɡ�friendsid��-���Ѽ�¼ID�����ߡ�adddate��-���ʱ��<br>&nbsp;&nbsp;&nbsp;&nbsp;����������ʾ������¼��Ĭ��10<br>&nbsp;&nbsp;&nbsp;&nbsp;������������ʽ��0-�Ӵ�С��1-��С����<br>&nbsp;&nbsp;&nbsp;&nbsp;����������ʾ�ĸ��û��ĺ����б��������óɡ�self��-��ǰ�û�����uid��-url��������uidֵ��Ӧ���û�����0��-�����û������óɴ���0��һ����������ʾָ�����uid���û�', '', 'friendsid,10,0,uid', 'block_ufriends.html', 0, 4, 11400, 0, 0, 0, 0, 1);


INSERT INTO `jieqi_system_blocks` (`bid`, `blockname`, `modname`, `filename`, `classname`, `side`, `title`, `description`, `content`, `vars`, `template`, `cachetime`, `contenttype`, `weight`, `showstatus`, `custom`, `canedit`, `publish`, `hasvars`) VALUES(0, '�û�����', 'system', 'block_uinfo', 'BlockSystemUinfo', 0, '�û�����', '&nbsp;&nbsp;&nbsp;&nbsp;��������ʾĳһ�û�����<br>&nbsp;&nbsp;&nbsp;&nbsp;��������һ����������ͬ����֮����Ӣ�Ķ��ŷָ���,����<br>&nbsp;&nbsp;&nbsp;&nbsp;����һ����ʾ�ĸ��û������ϣ��������óɡ�self��-��ǰ�û�����uid��-url��������uidֵ��Ӧ���û������óɴ���0��һ����������ʾָ�����uid���û�', '', 'uid', 'block_uinfo.html', 0, 4, 11500, 0, 0, 0, 0, 1);


INSERT INTO `jieqi_system_blocks` (`bid`, `blockname`, `modname`, `filename`, `classname`, `side`, `title`, `description`, `content`, `vars`, `template`, `cachetime`, `contenttype`, `weight`, `showstatus`, `custom`, `canedit`, `publish`, `hasvars`) VALUES(0, '�û����������', 'system', 'block_utopics', 'BlockSystemUptopics', 6, '���������', '&nbsp;&nbsp;&nbsp;&nbsp;��������ʾĳһ�û�����ӵ���������<br>&nbsp;&nbsp;&nbsp;&nbsp;���������߸���������ͬ����֮����Ӣ�Ķ��ŷָ���,����<br>&nbsp;&nbsp;&nbsp;&nbsp;����һ�������ֶΣ��������óɡ�topicid��-������ţ���posttime��-����ʱ�䣬��replytime��-���ظ�ʱ�䣬��views��-���������replies��-�ظ�����<br>&nbsp;&nbsp;&nbsp;&nbsp;����������ʾ������¼��Ĭ��10<br>&nbsp;&nbsp;&nbsp;&nbsp;������������ʽ��0-�Ӵ�С��1-��С����<br>&nbsp;&nbsp;&nbsp;&nbsp;����������ʾ�ĸ��û����������ӣ��������óɡ�self��-��ǰ�û�����uid��-url��������uidֵ��Ӧ���û�����0��-�����û������óɴ���0��һ����������ʾָ�����uid���û�<br>&nbsp;&nbsp;&nbsp;&nbsp;�������Ƿ��ö�����0-����ʾ��1-��ʾ�ö���2-��ʾ���ö�<br>&nbsp;&nbsp;&nbsp;&nbsp;�������Ƿ񾫻�����0-����ʾ��1-��ʾ������2-��ʾ�Ǿ���<br>&nbsp;&nbsp;&nbsp;&nbsp;�������Ƿ���������0-����ʾ��1-��ʾ������2-��ʾ������', '', 'topicid,10,0,uid,0,0,0', 'block_uptopics.html', 0, 4, 11600, 0, 0, 0, 0, 1);

INSERT INTO `jieqi_system_blocks` (`bid`, `blockname`, `modname`, `filename`, `classname`, `side`, `title`, `description`, `content`, `vars`, `template`, `cachetime`, `contenttype`, `weight`, `showstatus`, `custom`, `canedit`, `publish`, `hasvars`) VALUES(0, '��ҳ���ݵ�������', 'system', 'block_fileget', 'BlockSystemFileget', 0, '', '&nbsp;&nbsp;&nbsp;&nbsp;��������ͨ��URL��ȡ��ҳ������Ϊ�Լ����������ݡ�<br>&nbsp;&nbsp;&nbsp;&nbsp;������������������������ͬ����֮����Ӣ�Ķ��ŷָ���,����<br>&nbsp;&nbsp;&nbsp;&nbsp;����һ�Ƿ��ʵ�URL(��������)���� http://www.domain.com/block.php?id=1<br>&nbsp;&nbsp;&nbsp;&nbsp;�������ǻ���ʱ�䣨��λ���룩���������������ջ������ó�0����ʾʹ��ϵͳĬ�ϻ���ʱ�䡣���ó�-1��ʾ���û��棬���ô���0��������ʾ�Զ��建��ʱ�䡣<br>&nbsp;&nbsp;&nbsp;&nbsp;��������ָ��ȡ����ҳ���ݱ��룬���ձ�ʾ��ϵͳĬ�ϱ�����ͬ��<br>&nbsp;&nbsp;&nbsp;&nbsp;����������һ����߶������վ���ʾʹ��Ĭ��ֵ�����ӣ� ��http://www.domain.com/block.php?id=1,1800,utf-8�� ��ʾ��ȡ�����ַ���ݣ�������Сʱ�����ݱ�����utf-8', '', '', '', 0, 4, 12500, 0, 0, 0, 0, 1);

INSERT INTO `jieqi_system_configs` (`cid`, `modname`, `cname`, `ctitle`, `cvalue`, `cdescription`, `cdefine`, `ctype`, `options`, `catorder`, `catname`) VALUES (0, 'system', 'avatarcut', '�Ƿ�Ҫ��ü�ͷ��ͼƬ', '1', '�ü�ͼƬ��ҪGD��֧��', 0, 7, 'a:2:{i:1;s:2:"��";i:0;s:2:"��";}', 13250, '��ʾ����');

INSERT INTO `jieqi_system_configs` (`cid`, `modname`, `cname`, `ctitle`, `cvalue`, `cdescription`, `cdefine`, `ctype`, `options`, `catorder`, `catname`) VALUES (0, 'system', 'avatarurl', '��Աͷ�����URL', '', '��Ӧ����Ŀ¼��url����󲻴�б�ܣ����������ϵͳ�Զ��ж�', 0, 1, '', 13150, '��ʾ����');

INSERT INTO `jieqi_system_configs` (`cid`, `modname`, `cname`, `ctitle`, `cvalue`, `cdescription`, `cdefine`, `ctype`, `options`, `catorder`, `catname`) VALUES(0, 'system', 'JIEQI_AJAX_PAGE', '�Ƿ�ʹ��AJAX��ҳ', '0', '', 1, 9, 'a:2:{i:1;s:2:"��";i:0;s:2:"��";}', 32460, '��ʾ����');

INSERT INTO `jieqi_system_power` (`pid`, `modname`, `pname`, `ptitle`, `pdescription`, `pgroups`) VALUES (0, 'system', 'adminreport', '�����û�����', '', '');

UPDATE `jieqi_system_configs` SET ctype=5, cdescription='���ձ�ʾ���޸�����' WHERE modname='system' AND cname='JIEQI_DB_PASS';

UPDATE `jieqi_system_configs` SET ctype=9 WHERE ctype=7 AND options='a:2:{i:1;s:2:"��";i:0;s:2:"��";}';

DELETE FROM `jieqi_system_configs` WHERE modname='system' AND cname='JIEQI_BLOCKCACHE_DIR';
UPDATE `jieqi_system_configs` SET cdescription='֧������д����1��ֻ��Ŀ¼����ָ��վ��Ŀ¼�µ���Ŀ¼�������磺 cahce ��2��ʹ������·�����磺 D:/web/cache ��3��ʹ��Memcached����ʽΪ memcached://�����ַ:�˿ںţ��磺memcached://127.0.0.1:11211' WHERE modname='system' AND cname='JIEQI_CACHE_DIR';

INSERT INTO `jieqi_system_configs` (`cid`, `modname`, `cname`, `ctitle`, `cvalue`, `cdescription`, `cdefine`, `ctype`, `options`, `catorder`, `catname`) VALUES (0, 'system', 'posttitlemax', '����������༸���ֽ�', '60', '�����ݽṹ�е��ֶγ����йأ�һ�㲻���޸�', 0, 3, '', 40100, '���ݼ������');

UPDATE `jieqi_system_configs` SET modname='system', cname='postintervaltime', ctitle='���η������ټ��ʱ��', cdescription='��λ���룬���ó� 0 ��ʾ��ʱ��������', catorder=40200, catname='���ݼ������' WHERE modname='forum' AND cname='minposttime';

UPDATE `jieqi_system_configs` SET modname='system', cname='postdenywords', ctitle='��ֹ����Ĵ���', cvalue=REPLACE(cvalue, ' ', '\n'), cdescription='�滻����ÿ��һ�У�д��Ϊ����from=to����ʾ���ݡ�from�������滻�ɡ�to����Ҳ����ֻд��from�������������еġ�from�����滻�ɡ�**�����൱�����عؼ���Ч����', catorder=40300, catname='���ݼ������' WHERE modname='forum' AND cname='badpostwords';

UPDATE `jieqi_system_configs` SET modname='system', cname='postreplacewords', ctitle='���������滻', cvalue=REPLACE(cvalue, ' ', '\n'), cdescription='�������ö���滻����ÿ��һ�С�', catorder=40400, catname='���ݼ������' WHERE modname='forum' AND cname='hidepostwords';

UPDATE `jieqi_system_configs` SET modname='system', cname='postminsize', ctitle='�������������ֽ���', cdescription='0 ��ʾ������', catorder=40500, catname='���ݼ������' WHERE modname='forum' AND cname='minpostsize';

UPDATE `jieqi_system_configs` SET modname='system', cname='postmaxsize', ctitle='������������ֽ���', cdescription='0 ��ʾ������', catorder=40600, catname='���ݼ������' WHERE modname='forum' AND cname='maxpostsize';

UPDATE `jieqi_system_configs` SET modname='system', cname='postdenyrubbish', ctitle='��ֹ��ˮ����', cdescription='�������ǹ�ˮ�����ӽ���ֹ���������жϲ�һ��׼ȷ��������', catorder=40700, catname='���ݼ������' WHERE modname='forum' AND cname='checkpostrubbish';

DELETE FROM `jieqi_system_configs` WHERE modname='system' AND cname='minpposttime';
DELETE FROM `jieqi_system_configs` WHERE modname='system' AND cname='minppostsize';
DELETE FROM `jieqi_system_configs` WHERE modname='system' AND cname='maxppostsize';
DELETE FROM `jieqi_system_configs` WHERE modname='system' AND cname='checkppostrubbish';
DELETE FROM `jieqi_system_configs` WHERE modname='system' AND cname='hideppostwords';

UPDATE jieqi_system_friends SET yourname = (SELECT name FROM jieqi_system_users WHERE jieqi_system_friends.yourid = jieqi_system_users.uid AND jieqi_system_users.name != '') WHERE yourid > 0;

UPDATE jieqi_system_friends SET myname = (SELECT name FROM jieqi_system_users WHERE jieqi_system_friends.myid = jieqi_system_users.uid AND jieqi_system_users.name != '') WHERE myid > 0;

UPDATE jieqi_system_message SET fromname = (SELECT name FROM jieqi_system_users WHERE jieqi_system_message.fromid = jieqi_system_users.uid AND jieqi_system_users.name != '') WHERE fromid > 0;

UPDATE jieqi_system_message SET toname = (SELECT name FROM jieqi_system_users WHERE jieqi_system_message.toid = jieqi_system_users.uid AND jieqi_system_users.name != '') WHERE toid > 0;


ALTER TABLE `jieqi_system_ptopics` CHANGE `ptopicid` `topicid` mediumint(8) unsigned NOT NULL auto_increment;
ALTER TABLE `jieqi_system_ptopics` CHANGE `title` `title` varchar(80) NOT NULL default '';
ALTER TABLE `jieqi_system_ptopics` ADD `replierid` int(10) NOT NULL default '0' AFTER `posttime`;
ALTER TABLE `jieqi_system_ptopics` ADD `replier` varchar(30) NOT NULL default '' AFTER `replierid`;
ALTER TABLE `jieqi_system_ptopics` ADD `rate` tinyint(1) NOT NULL default '0' AFTER `isgood`;
ALTER TABLE `jieqi_system_ptopics` ADD `attachment` tinyint(1) NOT NULL default '0' AFTER `rate`;
ALTER TABLE `jieqi_system_ptopics` ADD `needperm` int(10) unsigned NOT NULL default '0' AFTER `attachment`;
ALTER TABLE `jieqi_system_ptopics` ADD `needscore` int(10) unsigned NOT NULL default '0' AFTER `needperm`;
ALTER TABLE `jieqi_system_ptopics` ADD `needexp` int(10) unsigned NOT NULL default '0' AFTER `needscore`;
ALTER TABLE `jieqi_system_ptopics` ADD `needprice` int(10) unsigned NOT NULL default '0' AFTER `needexp`;
ALTER TABLE `jieqi_system_ptopics` CHANGE `topictype` `sortid` tinyint(3) NOT NULL default '0' AFTER `needprice`;
ALTER TABLE `jieqi_system_ptopics` ADD `iconid` tinyint(3) NOT NULL default '0' AFTER `sortid`;
ALTER TABLE `jieqi_system_ptopics` ADD `typeid` tinyint(3) NOT NULL default '0' AFTER `iconid`;
ALTER TABLE `jieqi_system_ptopics` ADD `linkurl` varchar(100) NOT NULL default '' AFTER `lastinfo`;

ALTER TABLE `jieqi_system_ptopics` ADD INDEX `posterid` (`posterid`,`replytime`);

ALTER TABLE `jieqi_system_pposts` CHANGE `ppostid` `postid` int(10) unsigned NOT NULL auto_increment;
ALTER TABLE `jieqi_system_pposts` CHANGE `ptopicid` `topicid` int(10) unsigned NOT NULL default '0';
ALTER TABLE `jieqi_system_pposts` ADD `replypid` int(10) unsigned NOT NULL default '0' AFTER `istopic`;
ALTER TABLE `jieqi_system_pposts` ADD `editorid` int(10) NOT NULL default '0' AFTER `posterip`;
ALTER TABLE `jieqi_system_pposts` ADD `editor` varchar(30) NOT NULL default '' AFTER `editorid`;
ALTER TABLE `jieqi_system_pposts` ADD `edittime` int(10) NOT NULL default '0' AFTER `editor`;
ALTER TABLE `jieqi_system_pposts` ADD `editorip` varchar(25) NOT NULL default '' AFTER `edittime`;
ALTER TABLE `jieqi_system_pposts` ADD `editnote` varchar(250) NOT NULL default '' AFTER `editorip`;
ALTER TABLE `jieqi_system_pposts` ADD `iconid` tinyint(3) NOT NULL default '0' AFTER `editnote`;
ALTER TABLE `jieqi_system_pposts` ADD `attachment` text NOT NULL AFTER `iconid`;
ALTER TABLE `jieqi_system_pposts` CHANGE `subject` `subject` varchar(80) NOT NULL default '';