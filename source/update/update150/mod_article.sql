CREATE TABLE `jieqi_article_replies` (
  `replyid` int(11) unsigned NOT NULL auto_increment,
  `siteid` smallint(6) unsigned NOT NULL default '0',
  `reviewid` int(11) unsigned NOT NULL default '0',
  `istopic` tinyint(1) NOT NULL default '0',
  `articleid` int(11) unsigned NOT NULL default '0',
  `posterid` int(11) NOT NULL default '0',
  `poster` varchar(30) NOT NULL default '',
  `posttime` int(11) NOT NULL default '0',
  `posterip` varchar(25) NOT NULL default '',
  `subject` varchar(60) NOT NULL default '',
  `posttext` mediumtext NOT NULL,
  `size` int(11) NOT NULL default '0',
  PRIMARY KEY  (`replyid`),
  KEY `articleid` (`articleid`),
  KEY `reviewid` (`reviewid`,`posttime`)
) TYPE=MyISAM;

CREATE TABLE `jieqi_article_reviews` (
  `reviewid` int(11) unsigned NOT NULL auto_increment,
  `siteid` smallint(6) unsigned NOT NULL default '0',
  `articleid` int(11) unsigned NOT NULL default '0',
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
  PRIMARY KEY  (`reviewid`),
  KEY `articleid` (`articleid`,`istop`,`replytime`)
) TYPE=MyISAM;

ALTER TABLE `jieqi_article_article` ADD `vipvotetime` INT( 11 ) NOT NULL DEFAULT '0' AFTER `allvote`; 
ALTER TABLE `jieqi_article_article` ADD `vipvotenow` INT( 11 ) NOT NULL DEFAULT '0' AFTER `vipvotetime`;
ALTER TABLE `jieqi_article_article` ADD `vipvotepreview` INT( 11 ) NOT NULL DEFAULT '0' AFTER `vipvotenow`;

ALTER TABLE `jieqi_article_bookcase` ADD `classid` SMALLINT( 3 ) NOT NULL DEFAULT '0' AFTER `articlename` ;

ALTER TABLE `jieqi_article_bookcase` DROP INDEX `userid`;
ALTER TABLE `jieqi_article_bookcase` ADD INDEX `userid` ( `userid` , `classid` ) ;

UPDATE `jieqi_system_modules` SET version=150 WHERE name='article';

UPDATE `jieqi_system_blocks` SET filename='block_reviewslist', classname='BlockArticleReviewslist', template='block_reviewslist.html' WHERE modname='article' AND classname='BlockArticleReviewlist';

UPDATE `jieqi_system_configs` SET cvalue = CONCAT(cvalue, '/modules/article') WHERE modname = 'article' AND cname = 'dynamicurl' AND cvalue != '' AND cvalue NOT LIKE '%/modules/article';

UPDATE `jieqi_system_configs` SET cvalue = CONCAT(cvalue, '/modules/article') WHERE modname = 'article' AND cname = 'staticurl' AND cvalue != '' AND cvalue NOT LIKE '%/modules/article';

INSERT INTO `jieqi_system_configs` (`cid`, `modname`, `cname`, `ctitle`, `cvalue`, `cdescription`, `cdefine`, `ctype`, `options`, `catorder`, `catname`) VALUES (0, 'article', 'maketxtfull', '�Ƿ�����TXTȫ��', '1', '', 0, 7, 'a:2:{i:1;s:2:"��";i:0;s:2:"��";}', 21100, '�ļ�����');
INSERT INTO `jieqi_system_configs` (`cid`, `modname`, `cname`, `ctitle`, `cvalue`, `cdescription`, `cdefine`, `ctype`, `options`, `catorder`, `catname`) VALUES (0, 'article', 'txtfulldir', 'TXTȫ��Ŀ¼', 'txtfull', '', 0, 1, '', 21120, '�ļ�����');
INSERT INTO `jieqi_system_configs` (`cid`, `modname`, `cname`, `ctitle`, `cvalue`, `cdescription`, `cdefine`, `ctype`, `options`, `catorder`, `catname`) VALUES (0, 'article', 'txtfullurl', '����TXTȫ�ĵ�URL', '', '�����·���Ļ��˴����գ�����������url����󲻴�б��', 0, 1, '', 21140, '�ļ�����');
INSERT INTO `jieqi_system_configs` (`cid`, `modname`, `cname`, `ctitle`, `cvalue`, `cdescription`, `cdefine`, `ctype`, `options`, `catorder`, `catname`) VALUES (0, 'article', 'txtfullfile', 'TXTȫ���ļ���׺', '.txt', '', 0, 1, '', 21180, '�ļ�����');

INSERT INTO `jieqi_system_configs` (`cid`, `modname`, `cname`, `ctitle`, `cvalue`, `cdescription`, `cdefine`, `ctype`, `options`, `catorder`, `catname`) VALUES (0, 'article', 'makeumd', '�Ƿ�����UMD������', '0', '', 0, 7, 'a:2:{i:1;s:2:"��";i:0;s:2:"��";}', 21200, '�ļ�����');
INSERT INTO `jieqi_system_configs` (`cid`, `modname`, `cname`, `ctitle`, `cvalue`, `cdescription`, `cdefine`, `ctype`, `options`, `catorder`, `catname`) VALUES (0, 'article', 'umddir', 'UMD�ļ�Ŀ¼', 'umd', '', 0, 1, '', 21220, '�ļ�����');
INSERT INTO `jieqi_system_configs` (`cid`, `modname`, `cname`, `ctitle`, `cvalue`, `cdescription`, `cdefine`, `ctype`, `options`, `catorder`, `catname`) VALUES (0, 'article', 'umdurl', '����UMD�ļ���URL', '', '�����·���Ļ��˴����գ�����������url����󲻴�б��', 0, 1, '', 21240, '�ļ�����');
INSERT INTO `jieqi_system_configs` (`cid`, `modname`, `cname`, `ctitle`, `cvalue`, `cdescription`, `cdefine`, `ctype`, `options`, `catorder`, `catname`) VALUES (0, 'article', 'umdfile', 'UMD�ļ���׺', '.umd', '', 0, 1, '', 21280, '�ļ�����');

INSERT INTO `jieqi_system_configs` (`cid`, `modname`, `cname`, `ctitle`, `cvalue`, `cdescription`, `cdefine`, `ctype`, `options`, `catorder`, `catname`) VALUES (0, 'article', 'makejar', '�Ƿ�����JAR������', '0', '', 0, 7, 'a:2:{i:1;s:2:"��";i:0;s:2:"��";}', 21300, '�ļ�����');
INSERT INTO `jieqi_system_configs` (`cid`, `modname`, `cname`, `ctitle`, `cvalue`, `cdescription`, `cdefine`, `ctype`, `options`, `catorder`, `catname`) VALUES (0, 'article', 'jardir', 'JAR�ļ�Ŀ¼', 'jar', '', 0, 1, '', 21320, '�ļ�����');
INSERT INTO `jieqi_system_configs` (`cid`, `modname`, `cname`, `ctitle`, `cvalue`, `cdescription`, `cdefine`, `ctype`, `options`, `catorder`, `catname`) VALUES (0, 'article', 'jarurl', '����JAR�ļ���URL', '', '�����·���Ļ��˴����գ�����������url����󲻴�б��', 0, 1, '', 21340, '�ļ�����');
INSERT INTO `jieqi_system_configs` (`cid`, `modname`, `cname`, `ctitle`, `cvalue`, `cdescription`, `cdefine`, `ctype`, `options`, `catorder`, `catname`) VALUES (0, 'article', 'jarfile', 'JAR�ļ���׺', '.jar', '', 0, 1, '', 21380, '�ļ�����');


INSERT INTO `jieqi_system_configs` (`cid`, `modname`, `cname`, `ctitle`, `cvalue`, `cdescription`, `cdefine`, `ctype`, `options`, `catorder`, `catname`) VALUES (0, 'article', 'scorezipdown', '����ZIP�ļ��ۻ���', '0', '', 0, 3, '', 30650, '��������');

INSERT INTO `jieqi_system_configs` (`cid`, `modname`, `cname`, `ctitle`, `cvalue`, `cdescription`, `cdefine`, `ctype`, `options`, `catorder`, `catname`) VALUES (0, 'article', 'scoreumddown', '����UMD�ļ��ۻ���', '0', '', 0, 3, '', 30670, '��������');

INSERT INTO `jieqi_system_configs` (`cid`, `modname`, `cname`, `ctitle`, `cvalue`, `cdescription`, `cdefine`, `ctype`, `options`, `catorder`, `catname`) VALUES (0, 'article', 'scorejardown', '����JAR�ļ��ۻ���', '0', '', 0, 3, '', 30680, '��������');

UPDATE `jieqi_system_configs` SET cname='scoretxtfulldown' WHERE modname='article' AND cname='scoretxtdown';

INSERT INTO `jieqi_system_configs` (`cid`, `modname`, `cname`, `ctitle`, `cvalue`, `cdescription`, `cdefine`, `ctype`, `options`, `catorder`, `catname`) VALUES (0, 'article', 'scoretxtfulldown', '����TXTȫ�Ŀۻ���', '0', '', 0, 3, '', 30660, '��������');

INSERT INTO `jieqi_system_configs` (`cid`, `modname`, `cname`, `ctitle`, `cvalue`, `cdescription`, `cdefine`, `ctype`, `options`, `catorder`, `catname`) VALUES (0, 'article', 'vipvotes', 'vip�û�Ĭ����Ʊ��', '1', '', 0, 3, '', 31100, '��������');

INSERT INTO `jieqi_system_configs` (`cid`, `modname`, `cname`, `ctitle`, `cvalue`, `cdescription`, `cdefine`, `ctype`, `options`, `catorder`, `catname`) VALUES (0, 'article', 'vipvegold', '������������ѳ�����������һ����Ʊ', '1000', '', 0, 3, '', 31200, '��������');

INSERT INTO `jieqi_system_configs` (`cid`, `modname`, `cname`, `ctitle`, `cvalue`, `cdescription`, `cdefine`, `ctype`, `options`, `catorder`, `catname`) VALUES (0, 'article', 'scorevipvote', '�û�Ͷ��Ʊ���ӻ���', '5', '', 0, 3, '', 31300, '��������');

INSERT INTO `jieqi_system_configs` (`cid`, `modname`, `cname`, `ctitle`, `cvalue`, `cdescription`, `cdefine`, `ctype`, `options`, `catorder`, `catname`) VALUES (0, 'article', 'maxmarkclass', '�����������', '5', '�û�����������ּ���������ó�0��ʾ��������ࡣ', 0, 3, '', 13660, '��ʾ����');