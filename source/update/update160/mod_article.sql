UPDATE `jieqi_system_configs` SET ctype=10, cdescription='ȫ����ѡ��ʾ������jar', options='a:4:{i:1;s:7:"ȫ��jar";i:2;s:7:"64K�־�";i:4;s:8:"128K�־�";i:16;s:8:"512K�־�";}' WHERE modname='article' AND cname='makejar';

UPDATE `jieqi_system_configs` SET ctype=10, cdescription='ȫ����ѡ��ʾ������umd', options='a:4:{i:1;s:7:"ȫ��umd";i:2;s:7:"64K�־�";i:4;s:8:"128K�־�";i:16;s:8:"512K�־�";}' WHERE modname='article' AND cname='makeumd';

DELETE FROM `jieqi_system_configs` WHERE modname='article' AND cname='hidereviewwords';
DELETE FROM `jieqi_system_configs` WHERE modname='article' AND cname='minreviewtime';
DELETE FROM `jieqi_system_configs` WHERE modname='article' AND cname='checkreviewrubbish';

DELETE FROM `jieqi_system_configs` WHERE modname='article' AND cname='txtfile';
DELETE FROM `jieqi_system_configs` WHERE modname='article' AND cname='opffile';
DELETE FROM `jieqi_system_configs` WHERE modname='article' AND cname='rssfile';
DELETE FROM `jieqi_system_configs` WHERE modname='article' AND cname='makerss';
DELETE FROM `jieqi_system_configs` WHERE modname='article' AND cname='rssdir';
DELETE FROM `jieqi_system_configs` WHERE modname='article' AND cname='rssurl';

DELETE FROM `jieqi_system_configs` WHERE modname='article' AND cname='zipfile';
DELETE FROM `jieqi_system_configs` WHERE modname='article' AND cname='txtfullfile';
DELETE FROM `jieqi_system_configs` WHERE modname='article' AND cname='umdfile';
DELETE FROM `jieqi_system_configs` WHERE modname='article' AND cname='jarfile';

UPDATE `jieqi_system_configs` SET ctype=7, options='a:2:{s:5:".html";s:5:".html";s:6:".shtml";s:6:".shtml";}' WHERE modname='article' AND cname='htmlfile';

UPDATE `jieqi_system_configs` SET ctype=7, options='a:3:{s:4:".htm";s:4:".htm";s:5:".html";s:5:".html";s:4:".php";s:4:".php";}' WHERE modname='article' AND cname='fakefile';

UPDATE `jieqi_system_configs` SET ctitle='����ͼƬ����Ŀ¼' WHERE modname='article' AND cname='imagedir';

UPDATE `jieqi_system_configs` SET ctype=7, options='a:4:{s:4:".jpg";s:4:".jpg";s:5:".jpeg";s:5:".jpeg";s:4:".gif";s:4:".gif";s:4:".png";s:4:".png";}', ctitle='����ͼƬ�ļ���׺' WHERE modname='article' AND cname='imagetype';

UPDATE `jieqi_system_configs` SET ctitle='���ʷ���ͼƬ��URL' WHERE modname='article' AND cname='imageurl';


INSERT INTO `jieqi_system_blocks` (`bid`, `blockname`, `modname`, `filename`, `classname`, `side`, `title`, `description`, `content`, `vars`, `template`, `cachetime`, `contenttype`, `weight`, `showstatus`, `custom`, `canedit`, `publish`, `hasvars`) VALUES(0, '�û�����', 'article', 'block_uarticles', 'BlockArticleUarticles', 6, '�ҵ�����', '&nbsp;&nbsp;&nbsp;&nbsp;��������ʾĳһ�û���ԭ������<br>&nbsp;&nbsp;&nbsp;&nbsp;�������������������ͬ����֮����Ӣ�Ķ��ŷָ���,����<br>&nbsp;&nbsp;&nbsp;&nbsp;����һ�������ֶΣ��������óɡ�lastupdate��-����ʱ�䣬��postdate��-����ʱ�䣬��articleid��-����ID����allvisit��-�ܵ������monthvisit��-�µ������weekvisit��-�ܵ������allvote��-���Ƽ�����monthvote��-���Ƽ�����weekvote��-���Ƽ�����size��-��������goodnum��-�ղ���<br>&nbsp;&nbsp;&nbsp;&nbsp;����������ʾ������¼��Ĭ��10<br>&nbsp;&nbsp;&nbsp;&nbsp;������������ʽ��0-�Ӵ�С��1-��С����<br>&nbsp;&nbsp;&nbsp;&nbsp;����������ʾ�ĸ��û����������ӣ��������óɡ�self��-��ǰ�û�����uid��-url��������uidֵ��Ӧ���û�����0��-�����û������óɴ���0��һ����������ʾָ�����uid���û�<br>&nbsp;&nbsp;&nbsp;&nbsp;������ȫ����־��0-����ʾ��1-��ʾȫ����2-��ʾ��ȫ��', '', 'lastupdate,10,0,uid,0', 'block_uarticles.html', 0, 4, 25100, 0, 0, 0, 0, 1);

INSERT INTO `jieqi_system_blocks` (`bid`, `blockname`, `modname`, `filename`, `classname`, `side`, `title`, `description`, `content`, `vars`, `template`, `cachetime`, `contenttype`, `weight`, `showstatus`, `custom`, `canedit`, `publish`, `hasvars`) VALUES(0, '�û����', 'article', 'block_ubookcase', 'BlockArticleUbookcase', 6, '�ҵ����', '&nbsp;&nbsp;&nbsp;&nbsp;��������ʾĳһ�û����������<br>&nbsp;&nbsp;&nbsp;&nbsp;���������ĸ���������ͬ����֮����Ӣ�Ķ��ŷָ���,����<br>&nbsp;&nbsp;&nbsp;&nbsp;����һ�������ֶΣ��������óɡ�lastupdate��-����ʱ�䣬��joindate��-����ʱ�䣬��articleid��-����ID����caseid��-���ID����lastvisit��-������ʱ��<br>&nbsp;&nbsp;&nbsp;&nbsp;����������ʾ������¼��Ĭ��10<br>&nbsp;&nbsp;&nbsp;&nbsp;������������ʽ��0-�Ӵ�С��1-��С����<br>&nbsp;&nbsp;&nbsp;&nbsp;����������ʾ�ĸ��û����������ӣ��������óɡ�self��-��ǰ�û�����uid��-url��������uidֵ��Ӧ���û�����0��-�����û������óɴ���0��һ����������ʾָ�����uid���û�', '', 'lastupdate,10,0,uid', 'block_ubookcase.html', 0, 4, 25200, 0, 0, 0, 0, 1);


ALTER TABLE `jieqi_article_reviews` CHANGE `reviewid` `topicid` mediumint(8) unsigned NOT NULL auto_increment;
ALTER TABLE `jieqi_article_reviews` CHANGE `articleid` `ownerid` int(10) unsigned NOT NULL default '0';
ALTER TABLE `jieqi_article_reviews` CHANGE `title` `title` varchar(80) NOT NULL default '';
ALTER TABLE `jieqi_article_reviews` ADD `replierid` int(10) NOT NULL default '0' AFTER `posttime`;
ALTER TABLE `jieqi_article_reviews` ADD `replier` varchar(30) NOT NULL default '' AFTER `replierid`;
ALTER TABLE `jieqi_article_reviews` ADD `rate` tinyint(1) NOT NULL default '0' AFTER `isgood`;
ALTER TABLE `jieqi_article_reviews` ADD `attachment` tinyint(1) NOT NULL default '0' AFTER `rate`;
ALTER TABLE `jieqi_article_reviews` ADD `needperm` int(10) unsigned NOT NULL default '0' AFTER `attachment`;
ALTER TABLE `jieqi_article_reviews` ADD `needscore` int(10) unsigned NOT NULL default '0' AFTER `needperm`;
ALTER TABLE `jieqi_article_reviews` ADD `needexp` int(10) unsigned NOT NULL default '0' AFTER `needscore`;
ALTER TABLE `jieqi_article_reviews` ADD `needprice` int(10) unsigned NOT NULL default '0' AFTER `needexp`;
ALTER TABLE `jieqi_article_reviews` CHANGE `topictype` `sortid` tinyint(3) NOT NULL default '0' AFTER `needprice`;
ALTER TABLE `jieqi_article_reviews` ADD `iconid` tinyint(3) NOT NULL default '0' AFTER `sortid`;
ALTER TABLE `jieqi_article_reviews` ADD `typeid` tinyint(3) NOT NULL default '0' AFTER `iconid`;
ALTER TABLE `jieqi_article_reviews` ADD `linkurl` varchar(100) NOT NULL default '' AFTER `lastinfo`;

ALTER TABLE `jieqi_article_reviews` DROP INDEX `articleid`;
ALTER TABLE `jieqi_article_reviews` ADD INDEX `posterid` (`posterid`,`replytime`);
ALTER TABLE `jieqi_article_reviews` ADD INDEX `ownerid` ( `ownerid` , `istop` , `replytime` );

ALTER TABLE `jieqi_article_replies` CHANGE `replyid` `postid` int(10) unsigned NOT NULL auto_increment;
ALTER TABLE `jieqi_article_replies` CHANGE `reviewid` `topicid` int(10) unsigned NOT NULL default '0';
ALTER TABLE `jieqi_article_replies` ADD `replypid` int(10) unsigned NOT NULL default '0' AFTER `istopic`;
ALTER TABLE `jieqi_article_replies` CHANGE `articleid` `ownerid` int(10) unsigned NOT NULL default '0';

ALTER TABLE `jieqi_article_replies` ADD `editorid` int(10) NOT NULL default '0' AFTER `posterip`;
ALTER TABLE `jieqi_article_replies` ADD `editor` varchar(30) NOT NULL default '' AFTER `editorid`;
ALTER TABLE `jieqi_article_replies` ADD `edittime` int(10) NOT NULL default '0' AFTER `editor`;
ALTER TABLE `jieqi_article_replies` ADD `editorip` varchar(25) NOT NULL default '' AFTER `edittime`;
ALTER TABLE `jieqi_article_replies` ADD `editnote` varchar(250) NOT NULL default '' AFTER `editorip`;
ALTER TABLE `jieqi_article_replies` ADD `iconid` tinyint(3) NOT NULL default '0' AFTER `editnote`;
ALTER TABLE `jieqi_article_replies` ADD `attachment` text NOT NULL AFTER `iconid`;
ALTER TABLE `jieqi_article_replies` CHANGE `subject` `subject` varchar(80) NOT NULL default '';

ALTER TABLE `jieqi_article_replies` DROP INDEX `articleid`;
ALTER TABLE `jieqi_article_replies` DROP INDEX `reviewid`;
ALTER TABLE `jieqi_article_replies` ADD INDEX `ownerid` (`ownerid`);
ALTER TABLE `jieqi_article_replies` ADD INDEX `ptopicid` (`topicid`,`posttime`);

