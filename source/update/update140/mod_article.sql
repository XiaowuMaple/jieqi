CREATE TABLE `jieqi_article_articlelog` (
  `logid` int(11) unsigned NOT NULL auto_increment,
  `siteid` smallint(6) unsigned NOT NULL default '0',
  `logtime` int(11) unsigned NOT NULL default '0',
  `userid` int(11) unsigned NOT NULL default '0',
  `username` varchar(30) binary NOT NULL default '',
  `articleid` int(11) unsigned NOT NULL default '0',
  `articlename` varchar(255) binary NOT NULL default '',
  `chapterid` int(11) unsigned NOT NULL default '0',
  `chaptername` varchar(255) NOT NULL default '',
  `reason` text NOT NULL,
  `chginfo` text NOT NULL,
  `chglog` text NOT NULL,
  `ischapter` tinyint(1) unsigned NOT NULL default '0',
  `isdel` tinyint(1) unsigned NOT NULL default '0',
  `databak` mediumtext NOT NULL,
  PRIMARY KEY  (`logid`),
  KEY `userid` (`userid`),
  KEY `ischapter` (`ischapter`),
  KEY `isdel` (`isdel`)
) TYPE=MyISAM;

CREATE TABLE `jieqi_article_applywriter` (
  `applyid` int(11) unsigned NOT NULL auto_increment,
  `siteid` smallint(6) unsigned NOT NULL default '0',
  `applytime` int(11) unsigned NOT NULL default '0',
  `applyuid` int(11) unsigned NOT NULL default '0',
  `applyname` varchar(30) binary NOT NULL default '',
  `penname` varchar(30) binary NOT NULL default '',
  `authtime` int(11) unsigned NOT NULL default '0',
  `authuid` int(11) unsigned NOT NULL default '0',
  `authname` varchar(30) binary NOT NULL default '',
  `applytitle` varchar(100) NOT NULL default '',
  `applytext` mediumtext NOT NULL,
  `applysize` int(11) unsigned NOT NULL default '0',
  `authnote` text NOT NULL,
  `applyflag` tinyint(1) unsigned NOT NULL default '0',
  PRIMARY KEY  (`applyid`),
  KEY `applyflag` (`applyflag`),
  KEY `applyename` (`applyname`),
  KEY `authname` (`authname`)
) TYPE=MyISAM;

CREATE TABLE `jieqi_article_avote` (
  `voteid` int(11) unsigned NOT NULL auto_increment,
  `articleid` int(11) unsigned NOT NULL default '0',
  `posterid` int(11) NOT NULL default '0',
  `poster` varchar(30) NOT NULL default '',
  `posttime` int(11) NOT NULL default '0',
  `title` varchar(100) NOT NULL default '',
  `item1` varchar(100) NOT NULL default '',
  `item2` varchar(100) NOT NULL default '',
  `item3` varchar(100) NOT NULL default '',
  `item4` varchar(100) NOT NULL default '',
  `item5` varchar(100) NOT NULL default '',
  `item6` varchar(100) NOT NULL default '',
  `item7` varchar(100) NOT NULL default '',
  `item8` varchar(100) NOT NULL default '',
  `item9` varchar(100) NOT NULL default '',
  `item10` varchar(100) NOT NULL default '',
  `useitem` tinyint(2) NOT NULL default '0',
  `description` text NOT NULL,
  `ispublish` tinyint(1) NOT NULL default '0',
  `mulselect` tinyint(1) NOT NULL default '0',
  `timelimit` tinyint(1) NOT NULL default '0',
  `needlogin` tinyint(1) NOT NULL default '0',
  `starttime` int(11) NOT NULL default '0',
  `endtime` int(11) NOT NULL default '0',
  PRIMARY KEY  (`voteid`),
  KEY `articleid` (`articleid`,`ispublish`)
) TYPE=MyISAM;

CREATE TABLE `jieqi_article_avstat` (
  `statid` int(11) unsigned NOT NULL auto_increment,
  `voteid` int(11) unsigned NOT NULL default '0',
  `statall` int(11) unsigned NOT NULL default '0',
  `stat1` int(11) unsigned NOT NULL default '0',
  `stat2` int(11) unsigned NOT NULL default '0',
  `stat3` int(11) unsigned NOT NULL default '0',
  `stat4` int(11) unsigned NOT NULL default '0',
  `stat5` int(11) unsigned NOT NULL default '0',
  `stat6` int(11) unsigned NOT NULL default '0',
  `stat7` int(11) unsigned NOT NULL default '0',
  `stat8` int(11) unsigned NOT NULL default '0',
  `stat9` int(11) unsigned NOT NULL default '0',
  `stat10` int(11) unsigned NOT NULL default '0',
  `canstat` tinyint(1) NOT NULL default '0',
  PRIMARY KEY  (`statid`),
  KEY `voteid` (`voteid`,`canstat`)
) TYPE=MyISAM;


UPDATE `jieqi_system_configs` SET cname='maxbookmarks' WHERE modname='article' AND cname='bookcasenum';
UPDATE `jieqi_system_configs` SET cname='dayvotes' WHERE modname='article' AND cname='pollnum';
UPDATE `jieqi_system_configs` SET cdescription='ָ�����������Ķ�ҳ���һЩ���֣�����<{$randtext}>�����滻��һ������ַ������磺��<span style="display:none">��Ȩ���У�<{$randtext}>��������</span>����style="display:none" ��ָĬ�ϲ��ɼ�������ҳ����ȫѡ����ʱ���������������ݣ�' WHERE modname='article' AND cname='textwatermark';

DELETE FROM `jieqi_system_configs` WHERE modname='article' AND cname='badreviewwords';
DELETE FROM `jieqi_system_configs` WHERE modname='article' AND cname='badarticlewords';

UPDATE `jieqi_system_blocks` SET contenttype=4 WHERE modname='article' AND classname='BlockArticleArticlelist';


INSERT INTO `jieqi_system_configs` (`cid`, `modname`, `cname`, `ctitle`, `cvalue`, `cdescription`, `cdefine`, `ctype`, `options`, `catorder`, `catname`) VALUES (0, 'article', 'pageimagecode', '�Ķ�ҳ��ͼƬ��ʾ����', '<div class="divimage"><img src="<{$imageurl}>" border="0" class="imagecontent"></div>', '���������Ķ�ҳ��ʱ����ʾͼƬ������html���롣����<{$imageurl}>�����滻��ʵ��ͼƬ��ַ', 0, 2, '', 13860, '��ʾ����');

INSERT INTO `jieqi_system_configs` (`cid`, `modname`, `cname`, `ctitle`, `cvalue`, `cdescription`, `cdefine`, `ctype`, `options`, `catorder`, `catname`) VALUES (0, 'article', 'txtarticlehead', 'TXTȫ��ͷ����������', '', '����TXTȫ�����أ�����ͷ����β�����Ը���һЩԤ�����õ����ݣ����籾վ���ֵ�ַ��', 0, 2, '', 13870, '��ʾ����');

INSERT INTO `jieqi_system_configs` (`cid`, `modname`, `cname`, `ctitle`, `cvalue`, `cdescription`, `cdefine`, `ctype`, `options`, `catorder`, `catname`) VALUES (0, 'article', 'txtarticlefoot', 'TXTȫ��β����������', '', '����TXTȫ�����أ�����ͷ����β�����Ը���һЩԤ�����õ����ݣ����籾վ���ֵ�ַ��', 0, 2, '', 13880, '��ʾ����');


INSERT INTO `jieqi_system_configs` (`cid`, `modname`, `cname`, `ctitle`, `cvalue`, `cdescription`, `cdefine`, `ctype`, `options`, `catorder`, `catname`) VALUES (0, 'article', 'checkappwriter', '���������Ƿ���Ҫ���', '1', '��Ҫ���ʱ��Ա�ύ���룬����Ա��ˡ�����Ҫ������û������룬ֱ�ӳ�Ϊ����', 0, 7, 'a:2:{i:1;s:2:"��";i:0;s:2:"��";}', 14900, '��ʾ����');

INSERT INTO `jieqi_system_configs` (`cid`, `modname`, `cname`, `ctitle`, `cvalue`, `cdescription`, `cdefine`, `ctype`, `options`, `catorder`, `catname`) VALUES (0, 'article', 'scoreuservote', 'ÿ���Ƽ����ӻ���', '0', '', 0, 3, '', 30610, '��������');

INSERT INTO `jieqi_system_configs` (`cid`, `modname`, `cname`, `ctitle`, `cvalue`, `cdescription`, `cdefine`, `ctype`, `options`, `catorder`, `catname`) VALUES (0, 'article', 'uservotescore', '�����Ƽ�����������Ƽ�ÿ�μ��ٻ���', '0', '������ó� 0 ������������������Ƽ�', 0, 3, '', 30620, '��������');

INSERT INTO `jieqi_system_configs` (`cid`, `modname`, `cname`, `ctitle`, `cvalue`, `cdescription`, `cdefine`, `ctype`, `options`, `catorder`, `catname`) VALUES (0, 'article', 'voteminsize', '�����������ϵ����²������Ƽ�', '0', '������ó� 0 ���ʾ����������', 0, 3, '', 30630, '��������');

INSERT INTO `jieqi_system_configs` (`cid`, `modname`, `cname`, `ctitle`, `cvalue`, `cdescription`, `cdefine`, `ctype`, `options`, `catorder`, `catname`) VALUES (0, 'article', 'addcasescore', '��������ղ���������ղ�ÿ�����ٻ���', '0', '������ó� 0 ���������ղ�������', 0, 3, '', 30640, '��������');

INSERT INTO `jieqi_system_configs` (`cid`, `modname`, `cname`, `ctitle`, `cvalue`, `cdescription`, `cdefine`, `ctype`, `options`, `catorder`, `catname`) VALUES (0, 'article', 'articlevote', '�����Ƿ�������ͶƱ', '0', '���������Ƿ�����ͶƱ���������һ��ͶƱѡ��', 0, 7, 'a:10:{i:0;s:10:"������ͶƱ";i:2;s:11:"���2��ѡ��";i:3;s:11:"���3��ѡ��";i:4;s:11:"���4��ѡ��";i:5;s:11:"���5��ѡ��";i:6;s:11:"���6��ѡ��";i:7;s:11:"���7��ѡ��";i:8;s:11:"���8��ѡ��";i:9;s:11:"���9��ѡ��";i:10;s:12:"���10��ѡ��";}', 14950, '��ʾ����');

INSERT INTO `jieqi_system_configs` (`cid`, `modname`, `cname`, `ctitle`, `cvalue`, `cdescription`, `cdefine`, `ctype`, `options`, `catorder`, `catname`) VALUES (0, 'article', 'scoretxtdown', '����TXTȫ�Ŀۻ���', '0', '', 0, 3, '', 30660, '��������');

INSERT INTO `jieqi_system_configs` (`cid`, `modname`, `cname`, `ctitle`, `cvalue`, `cdescription`, `cdefine`, `ctype`, `options`, `catorder`, `catname`) VALUES (0, 'article', 'eachlinknum', 'ÿƪ����������������', '0', '��һƪ���¿�������Ϣҳ�����ü���վ�ڵ�����Ϊ�Ƽ�����Ϊ0��ʾ����������', 0, 3, '', 15300, '��ʾ����');

INSERT INTO `jieqi_system_power` (`pid`, `modname`, `pname`, `ptitle`, `pdescription`, `pgroups`) VALUES (0, 'article', 'setwriter', '��˻�Ա�����Ϊ����', '', '');