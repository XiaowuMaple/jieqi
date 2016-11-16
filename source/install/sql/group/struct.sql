-- phpMyAdmin SQL Dump
-- version 2.10.2-rc1
-- http://www.phpmyadmin.net
-- 
-- ����: localhost
-- ��������: 2009 �� 02 �� 12 �� 17:57
-- �������汾: 5.0.45
-- PHP �汾: 5.1.4

-- 
-- ���ݿ�: `jieqi16`
-- 

-- --------------------------------------------------------

-- 
-- ��Ľṹ `jieqi_group_admingroup`
-- 

CREATE TABLE `jieqi_group_admingroup` (
  `admingid` smallint(6) unsigned NOT NULL default '0',
  `allowmanalbum` tinyint(1) NOT NULL default '0' COMMENT '�������',
  `allowmanparty` tinyint(1) NOT NULL default '0' COMMENT '����',
  `allowmantopic` tinyint(1) NOT NULL default '0' COMMENT '������',
  `allowmanmember` tinyint(1) NOT NULL default '0' COMMENT '�����Ա',
  `allowmanbasic` tinyint(1) NOT NULL default '0' COMMENT '��������'
) TYPE=MyISAM;

-- --------------------------------------------------------

-- 
-- ��Ľṹ `jieqi_group_album`
-- 

CREATE TABLE `jieqi_group_album` (
  `albumid` int(11) unsigned NOT NULL auto_increment COMMENT '���',
  `albumname` varchar(80) NOT NULL COMMENT '�������',
  `albumorder` int(11) NOT NULL default '0' COMMENT '����',
  `lastuptime` int(11) NOT NULL default '0' COMMENT '������ʱ��',
  `lastphotoid` int(11) NOT NULL default '0' COMMENT '���һ����ƬID',
  `nums` int(11) unsigned NOT NULL default '0' COMMENT '��Ƭ����',
  `intro` varchar(40) NOT NULL COMMENT '���',
  `hits` int(11) unsigned NOT NULL default '0' COMMENT '�����',
  `needexp` int(11) unsigned NOT NULL default '0' COMMENT '��Ҫ����ֵ',
  `gid` int(11) NOT NULL default '0' COMMENT '����ID',
  `poster` char(30) NOT NULL COMMENT '������',
  `posterid` int(11) NOT NULL default '0' COMMENT '����',
  `defaultflag` tinyint(1) NOT NULL default '0' COMMENT 'Ĭ����ɾ��ʶ',
  `lastpostfix` char(30) NOT NULL COMMENT '���һ����Ƭ��չ��',
  PRIMARY KEY  (`albumid`)
) TYPE=MyISAM;

-- 
-- ��Ľṹ `jieqi_group_attachs`
-- 

CREATE TABLE `jieqi_group_attachs` (
  `attachid` mediumint(8) unsigned NOT NULL auto_increment,
  `siteid` smallint(6) unsigned NOT NULL default '0',
  `topicid` mediumint(8) unsigned NOT NULL default '0',
  `postid` int(10) unsigned NOT NULL default '0',
  `name` varchar(100) NOT NULL default '',
  `description` varchar(100) NOT NULL default '',
  `class` varchar(30) NOT NULL default '',
  `postfix` varchar(30) NOT NULL default '',
  `size` int(10) unsigned NOT NULL default '0',
  `hits` mediumint(8) unsigned NOT NULL default '0',
  `needperm` int(10) unsigned NOT NULL default '0',
  `needscore` int(10) unsigned NOT NULL default '0',
  `needexp` int(10) unsigned NOT NULL default '0',
  `needprice` int(10) unsigned NOT NULL default '0',
  `uptime` int(10) NOT NULL default '0',
  `uid` int(10) unsigned NOT NULL default '0',
  `remote` tinyint(3) unsigned NOT NULL default '0',
  PRIMARY KEY  (`attachid`),
  KEY `topicid` (`topicid`),
  KEY `postid` (`postid`,`attachid`),
  KEY `uid` (`uid`)
) TYPE=MyISAM;

-- --------------------------------------------------------

-- 
-- ��Ľṹ `jieqi_group_gcat`
-- 

CREATE TABLE `jieqi_group_gcat` (
  `gcatid` smallint(5) unsigned NOT NULL auto_increment COMMENT '���',
  `gcatname` varchar(20) NOT NULL COMMENT '�������',
  `gcatorder` smallint(6) NOT NULL default '0' COMMENT '����',
  PRIMARY KEY  (`gcatid`)
) TYPE=MyISAM;

-- --------------------------------------------------------

-- 
-- ��Ľṹ `jieqi_group_group`
-- 

CREATE TABLE `jieqi_group_group` (
  `gid` int(10) unsigned NOT NULL auto_increment COMMENT '���',
  `gname` varchar(20) NOT NULL COMMENT '��������',
  `gcatid` int(10) unsigned NOT NULL COMMENT '���ID',
  `gdomain` varchar(20) NOT NULL COMMENT '����',
  `guid` int(11) unsigned NOT NULL default '0' COMMENT '������ID',
  `guname` varchar(15) NOT NULL default '0' COMMENT '�������û���',
  `gowner_name` varchar(30) NOT NULL COMMENT '�������س�',
  `gprovince` varchar(30) NOT NULL,
  `gcity` varchar(30) NOT NULL,
  `gpic` varchar(32) NOT NULL COMMENT 'LOGO',
  `gbrief` text NOT NULL COMMENT '���',
  `gaudit` smallint(6) NOT NULL COMMENT '�Ƿ���Ҫ���',
  `gtime` int(11) NOT NULL COMMENT '����ʱ��',
  `gtheme` varchar(40) NOT NULL COMMENT '���ģ��',
  `gmembers` int(11) NOT NULL default '0' COMMENT '��Ա����',
  `gparties` int(11) NOT NULL default '0' COMMENT '�����',
  `gpics` int(11) NOT NULL default '0' COMMENT '��Ƭ����',
  `topicnum` int(11) NOT NULL default '0' COMMENT '��������',
  `gtopics` int(11) NOT NULL default '0',
  PRIMARY KEY  (`gid`)
) TYPE=MyISAM;

-- --------------------------------------------------------

-- 
-- ��Ľṹ `jieqi_group_member`
-- 

CREATE TABLE `jieqi_group_member` (
  `mid` int(11) unsigned NOT NULL auto_increment COMMENT '���',
  `uid` int(11) unsigned NOT NULL COMMENT '��Ա���',
  `uname` char(30) NOT NULL COMMENT '�û���',
  `name` varchar(30) NOT NULL COMMENT '�س�',
  `mtime` int(11) default NULL COMMENT '����ʱ��',
  `offer` int(11) unsigned NOT NULL default '0',
  `gid` int(11) NOT NULL default '0' COMMENT '����ID',
  `membergid` int(11) NOT NULL default '0' COMMENT '��Ա��ID',
  `mswitch` tinyint(1) NOT NULL default '0' COMMENT '�Ƿ����ͨ��',
  `creater` tinyint(1) NOT NULL default '0' COMMENT '�Ƿ񴴽���',
  PRIMARY KEY  (`mid`)
) TYPE=MyISAM;

-- --------------------------------------------------------

-- 
-- ��Ľṹ `jieqi_group_membergroup`
-- 

CREATE TABLE `jieqi_group_membergroup` (
  `membergid` smallint(6) unsigned NOT NULL auto_increment COMMENT '���',
  `admingid` smallint(6) unsigned NOT NULL default '0' COMMENT '��ID',
  `membergtype` enum('system','special','member','default') default 'member' COMMENT '������',
  `membergtitle` char(30) NOT NULL COMMENT '��Ա������',
  `allowpostmessage` tinyint(1) NOT NULL default '0' COMMENT '������ϢȨ��',
  `allowpostparty` tinyint(1) NOT NULL default '0' COMMENT '����Ȩ��',
  `allowreplyparty` tinyint(1) NOT NULL default '0' COMMENT '�ظ��Ȩ��',
  `allowsignparty` tinyint(1) NOT NULL default '0',
  `allowposttopic` tinyint(1) NOT NULL default '0' COMMENT '������Ȩ��',
  `allowreplytopic` tinyint(1) NOT NULL default '0' COMMENT '�ظ�����Ȩ��',
  `allowpostpic` tinyint(1) NOT NULL default '0' COMMENT '�ϴ�����Ȩ��',
  PRIMARY KEY  (`membergid`),
  KEY `membergid` (`membergid`)
) TYPE=MyISAM;

-- --------------------------------------------------------

-- 
-- ��Ľṹ `jieqi_group_party`
-- 

CREATE TABLE `jieqi_group_party` (
  `pid` int(11) unsigned NOT NULL auto_increment COMMENT '���',
  `ptitle` varchar(50) NOT NULL COMMENT '����',
  `pcontent` text NOT NULL COMMENT '����',
  `pstart` int(11) unsigned NOT NULL default '0' COMMENT '��ʼʱ��',
  `pstop` int(11) unsigned NOT NULL default '0' COMMENT '����ʱ��',
  `pplace` varchar(200) default NULL,
  `ptime` int(11) unsigned NOT NULL default '0' COMMENT '����ʱ��',
  `pmaxnums` smallint(6) unsigned NOT NULL default '0' COMMENT '�޶��������',
  `pvisits` smallint(6) unsigned NOT NULL default '0',
  `pnums` smallint(6) unsigned NOT NULL default '0',
  `gid` int(11) unsigned NOT NULL default '0' COMMENT '����ID',
  `gname` varchar(50) default NULL COMMENT '��������',
  `uid` int(11) default NULL COMMENT '������ID',
  `uname` varchar(50) default NULL COMMENT '�������û���',
  `ptop` tinyint(1) NOT NULL default '0' COMMENT '�ö�',
  `replies` int(11) NOT NULL default '0' COMMENT '�ظ���Ϣ��',
  `passnums` int(11) NOT NULL default '0',
  PRIMARY KEY  (`pid`),
  KEY `ptitle` (`ptitle`)
) TYPE=MyISAM;

-- --------------------------------------------------------

-- 
-- ��Ľṹ `jieqi_group_partyreply`
-- 

CREATE TABLE `jieqi_group_partyreply` (
  `rid` int(11) unsigned NOT NULL auto_increment COMMENT '���',
  `pid` int(11) unsigned NOT NULL default '0' COMMENT '����',
  `rtime` int(11) unsigned NOT NULL default '0' COMMENT '�ظ�ʱ��',
  `rcontent` text COMMENT '����',
  `uid` int(11) NOT NULL default '0' COMMENT '�ظ���ID',
  `uname` char(30) default NULL COMMENT '�ظ����س�',
  `gid` int(11) NOT NULL default '0' COMMENT '����ID',
  PRIMARY KEY  (`rid`)
) TYPE=MyISAM;

-- --------------------------------------------------------

-- 
-- ��Ľṹ `jieqi_group_photo`
-- 

CREATE TABLE `jieqi_group_photo` (
  `photoid` int(11) unsigned NOT NULL auto_increment COMMENT '��Ƭ���',
  `albumid` int(11) NOT NULL default '0' COMMENT '�����',
  `name` varchar(80) NOT NULL COMMENT '�������',
  `intro` varchar(40) NOT NULL COMMENT '��Ƭ˵��',
  `postfix` varchar(30) NOT NULL COMMENT '��Ƭ��չ',
  `size` int(11) unsigned NOT NULL default '0' COMMENT '��Ƭ��С/�ֽ�',
  `hits` int(11) unsigned NOT NULL default '0' COMMENT '�����',
  `needexp` int(11) unsigned NOT NULL default '0' COMMENT '��Ҫ����ֵ',
  `uptime` int(11) NOT NULL default '0' COMMENT '�ϴ�ʱ��',
  `gid` int(11) NOT NULL default '0' COMMENT '������',
  `poster` char(30) NOT NULL COMMENT '�ϴ��˱��',
  `posterid` int(11) NOT NULL default '0' COMMENT '�ϴ����û���',
  PRIMARY KEY  (`photoid`)
) TYPE=MyISAM;

-- --------------------------------------------------------

-- 
-- ��Ľṹ `jieqi_group_poll`
-- 

CREATE TABLE `jieqi_group_poll` (
  `topicid` mediumint(8) unsigned NOT NULL default '0',
  `multiple` tinyint(1) NOT NULL default '0',
  `visible` tinyint(1) NOT NULL default '0',
  `maxchoices` tinyint(3) unsigned NOT NULL default '0',
  `expiration` int(10) unsigned NOT NULL default '0',
  `gid` int(11) NOT NULL default '0',
  PRIMARY KEY  (`topicid`)
) TYPE=MyISAM;

-- --------------------------------------------------------

-- 
-- ��Ľṹ `jieqi_group_polloption`
-- 

CREATE TABLE `jieqi_group_polloption` (
  `polloptionid` int(10) unsigned NOT NULL auto_increment,
  `topicid` mediumint(8) unsigned NOT NULL default '0',
  `votes` mediumint(8) unsigned NOT NULL default '0',
  `displayorder` tinyint(3) NOT NULL default '0',
  `polloption` varchar(80) NOT NULL default '',
  `voterids` mediumtext NOT NULL,
  `gid` int(11) NOT NULL default '0',
  PRIMARY KEY  (`polloptionid`),
  KEY `topicid` (`topicid`,`displayorder`)
) TYPE=MyISAM;

-- 
-- ��Ľṹ `jieqi_group_posts`
-- 

CREATE TABLE `jieqi_group_posts` (
  `postid` int(10) unsigned NOT NULL auto_increment,
  `siteid` smallint(6) unsigned NOT NULL default '0',
  `topicid` int(10) unsigned NOT NULL default '0',
  `istopic` tinyint(1) NOT NULL default '0',
  `replypid` int(10) unsigned NOT NULL default '0',
  `ownerid` int(10) unsigned NOT NULL default '0',
  `posterid` int(10) NOT NULL default '0',
  `poster` varchar(30) NOT NULL default '',
  `posttime` int(10) NOT NULL default '0',
  `posterip` varchar(25) NOT NULL default '',
  `editorid` int(10) NOT NULL default '0',
  `editor` varchar(30) NOT NULL default '',
  `edittime` int(10) NOT NULL default '0',
  `editorip` varchar(25) NOT NULL default '',
  `editnote` varchar(250) NOT NULL default '',
  `iconid` tinyint(3) NOT NULL default '0',
  `attachment` text NOT NULL,
  `subject` varchar(80) NOT NULL default '',
  `posttext` mediumtext NOT NULL,
  `size` int(10) NOT NULL default '0',
  PRIMARY KEY  (`postid`),
  KEY `ownerid` (`ownerid`),
  KEY `ptopicid` (`topicid`,`posttime`)
) TYPE=MyISAM;

-- 
-- ��Ľṹ `jieqi_group_sign`
-- 

CREATE TABLE `jieqi_group_sign` (
  `signid` int(11) NOT NULL auto_increment,
  `gid` int(11) unsigned NOT NULL default '0',
  `pid` int(11) unsigned NOT NULL default '0',
  `uid` int(11) unsigned NOT NULL default '0',
  `uname` char(30) default NULL,
  `signtime` int(11) NOT NULL default '0',
  `men` int(11) unsigned NOT NULL default '0',
  `women` int(11) unsigned NOT NULL default '0',
  `nums` int(11) unsigned NOT NULL default '0',
  `linkway` char(100) default NULL,
  `signflag` tinyint(1) NOT NULL default '0',
  PRIMARY KEY  (`signid`)
) TYPE=MyISAM;

-- --------------------------------------------------------


-- 
-- ��Ľṹ `jieqi_group_topics`
-- 

CREATE TABLE `jieqi_group_topics` (
  `topicid` mediumint(8) unsigned NOT NULL auto_increment,
  `siteid` smallint(6) unsigned NOT NULL default '0',
  `ownerid` int(10) unsigned NOT NULL default '0',
  `title` varchar(80) NOT NULL default '',
  `posterid` int(10) NOT NULL default '0',
  `poster` varchar(30) NOT NULL default '',
  `posttime` int(10) NOT NULL default '0',
  `replierid` int(10) NOT NULL default '0',
  `replier` varchar(30) NOT NULL default '',
  `replytime` int(10) NOT NULL default '0',
  `views` mediumint(8) unsigned NOT NULL default '0',
  `replies` mediumint(8) unsigned NOT NULL default '0',
  `islock` tinyint(1) NOT NULL default '0',
  `istop` int(11) NOT NULL default '0',
  `isgood` tinyint(1) NOT NULL default '0',
  `rate` tinyint(1) NOT NULL default '0',
  `attachment` tinyint(1) NOT NULL default '0',
  `needperm` int(10) unsigned NOT NULL default '0',
  `needscore` int(10) unsigned NOT NULL default '0',
  `needexp` int(10) unsigned NOT NULL default '0',
  `needprice` int(10) unsigned NOT NULL default '0',
  `sortid` tinyint(3) NOT NULL default '0',
  `iconid` tinyint(3) NOT NULL default '0',
  `typeid` tinyint(3) NOT NULL default '0',
  `lastinfo` varchar(250) NOT NULL default '',
  `linkurl` varchar(100) NOT NULL default '',
  `size` int(11) NOT NULL default '0',
  PRIMARY KEY  (`topicid`),
  KEY `ownerid` (`ownerid`,`istop`,`replytime`),
  KEY `posterid` (`posterid`,`replytime`)
) TYPE=MyISAM;
