DELETE FROM `jieqi_system_configs` WHERE modname='system' AND cname='JIEQI_USE_SUBDIR';
DELETE FROM `jieqi_system_configs` WHERE modname='system' AND cname='JIEQI_FORCE_COMPILE';
DELETE FROM `jieqi_system_configs` WHERE modname='system' AND cname='JIEQI_COMPILE_CHECK';
DELETE FROM `jieqi_system_configs` WHERE modname='system' AND cname='JIEQI_ROOT_PATH';
DELETE FROM `jieqi_system_configs` WHERE modname='system' AND cname='payclub';
DELETE FROM `jieqi_system_configs` WHERE modname='system' AND cname='ipayid';
DELETE FROM `jieqi_system_configs` WHERE modname='system' AND cname='ipaykey';
DELETE FROM `jieqi_system_configs` WHERE modname='system' AND cname='ipayurl';
DELETE FROM `jieqi_system_configs` WHERE modname='system' AND cname='xpayid';
DELETE FROM `jieqi_system_configs` WHERE modname='system' AND cname='xpaykey';
DELETE FROM `jieqi_system_configs` WHERE modname='system' AND cname='xpayurl';
DELETE FROM `jieqi_system_configs` WHERE modname='system' AND cname='paylogpnum';
DELETE FROM `jieqi_system_configs` WHERE modname='system' AND cname='egoldtransrate';
DELETE FROM `jieqi_system_configs` WHERE modname='system' AND cname='creditransrate';
DELETE FROM `jieqi_system_configs` WHERE modname='system' AND cname='scoretransrate';
DELETE FROM `jieqi_system_configs` WHERE modname='system' AND cname='JIEQI_DEFAULT_CHARSET';
DELETE FROM `jieqi_system_configs` WHERE modname='system' AND cname='JIEQI_HEAD';

DELETE FROM `jieqi_system_configs` WHERE modname='article' AND cname='toptimenum';
DELETE FROM `jieqi_system_configs` WHERE modname='article' AND cname='lastupdatenum';
DELETE FROM `jieqi_system_configs` WHERE modname='article' AND cname='authorupdatenum';
DELETE FROM `jieqi_system_configs` WHERE modname='article' AND cname='masterupdatenum';
DELETE FROM `jieqi_system_configs` WHERE modname='article' AND cname='postdatenum';
DELETE FROM `jieqi_system_configs` WHERE modname='article' AND cname='newreviewnum';

UPDATE jieqi_system_configs SET cdescription='��λΪ���֡�' WHERE modname='system' AND cname='JIEQI_SESSION_EXPRIE';
UPDATE `jieqi_system_configs` SET cvalue='1', options='a:3:{i:0;s:10:"����ʾ����";i:1;s:8:"��ʾ����";i:2;s:14:"��ʾ�������ʾ";}' WHERE  modname='system' AND cname='JIEQI_ERROR_MODE';
UPDATE jieqi_system_configs SET ctitle='session����ʱ��', cvalue='0',cdescription='��λΪ���롱,��ɡ�0����ʾ��ϵͳĬ�ϲ���' WHERE modname='system' AND cname='JIEQI_SESSION_EXPRIE';
UPDATE `jieqi_system_configs` SET options='a:3:{i:1;s:8:"��վ����";i:0;s:8:"��վ�ر�";i:2;s:18:"���ŵ���ֹ��¼����";}' WHERE modname='system' AND cname='JIEQI_IS_OPEN';
UPDATE `jieqi_system_configs` SET options='a:6:{s:3:"gbk";s:3:"gbk";s:6:"gb2312";s:6:"gb2312";s:4:"utf8";s:4:"utf8";s:4:"big5";s:4:"big5";s:6:"latin1";s:6:"latin1";s:7:"default";s:7:"default";}' WHERE modname='system' AND cname='JIEQI_DB_CHARSET';

INSERT INTO `jieqi_system_configs` (`cid`, `modname`, `cname`, `ctitle`, `cvalue`, `cdescription`, `cdefine`, `ctype`, `options`, `catorder`, `catname`) VALUES (0, 'article', 'visitstatnum', '���µ��ͳ�ƻ���', '1', '���û�����һƪ�����㼸����������ó� 0 �Ļ������е��ͳ��', 0, 3, '', 15200, '��ʾ����');
INSERT INTO `jieqi_system_configs` (`modname`, `cname`, `ctitle`, `cvalue`, `cdescription`, `cdefine`, `ctype`, `options`, `catorder`, `catname`) VALUES ('system', 'JIEQI_CUSTOM_INCLUDE', '���������û��Զ������', '0', '������������ܣ��û�����Ϊÿ��ҳ������һ�θ��ӵ�PHP���������������׺�ϵͳ�����ͻ��������ʹ�ã�', 1, 7, 'a:2:{i:1;s:2:"��";i:0;s:2:"��";}', 31850, '��ʾ����');
INSERT INTO `jieqi_system_configs` (`modname`, `cname`, `ctitle`, `cvalue`, `cdescription`, `cdefine`, `ctype`, `options`, `catorder`, `catname`) VALUES ('system', 'JIEQI_PROXY_DENIED', '��վ�Ƿ�����������', '1', '', 1, 7, 'a:2:{i:1;s:2:"��";i:0;s:2:"��";}', 30230, '��ʾ����');
INSERT INTO `jieqi_system_configs` (`cid`, `modname`, `cname`, `ctitle`, `cvalue`, `cdescription`, `cdefine`, `ctype`, `options`, `catorder`, `catname`) VALUES (0, 'system', 'JIEQI_SILVER_USAGE', '�Ƿ�ϵͳ���ҹ���', '0', '��ֵʱ���ѡ��ɽ�һ����ң���̨����ɷֿ��������û���ͳһʹ�õ�', 1, 7, 'a:2:{i:1;s:2:"��";i:0;s:2:"��";}', 32440, '��ʾ����');
INSERT INTO `jieqi_system_configs` (`cid`, `modname`, `cname`, `ctitle`, `cvalue`, `cdescription`, `cdefine`, `ctype`, `options`, `catorder`, `catname`) VALUES (0, 'system', 'JIEQI_DENY_RELOGIN', '��ֹͬһ�ʺŶ��˵�½', '0', '', 1, 7, 'a:2:{i:1;s:2:"��";i:0;s:2:"��";}', 31320, '��ʾ����');
INSERT INTO `jieqi_system_configs` (`cid`, `modname`, `cname`, `ctitle`, `cvalue`, `cdescription`, `cdefine`, `ctype`, `options`, `catorder`, `catname`) VALUES (0, 'system', 'JIEQI_DB_CHARSET', '���ݿ����ӱ���', 'gbk', '', 1, 7, 'a:6:{s:3:"gbk";s:3:"gbk";s:6:"gb2312";s:6:"gb2312";s:4:"utf8";s:4:"utf8";s:4:"big5";s:4:"big5";s:6:"latin1";s:6:"latin1";s:7:"default";s:7:"default";}', 20120, '���ݿ�����');
INSERT INTO `jieqi_system_configs` (`cid`, `modname`, `cname`, `ctitle`, `cvalue`, `cdescription`, `cdefine`, `ctype`, `options`, `catorder`, `catname`) VALUES (0, 'system', 'JIEQI_LICENSE_KEY', '��վ��Ȩע����', '', '', 1, 2, '', 11100, '��վ������Ϣ');
INSERT INTO `jieqi_system_configs` (`cid`, `modname`, `cname`, `ctitle`, `cvalue`, `cdescription`, `cdefine`, `ctype`, `options`, `catorder`, `catname`) VALUES (0, 'system', 'adclickscore', 'ÿ�ε��������', '1', '��Ҫ��½�û������Ч', 0, 3, '', 20300, '��������');
INSERT INTO `jieqi_system_configs` (`cid`, `modname`, `cname`, `ctitle`, `cvalue`, `cdescription`, `cdefine`, `ctype`, `options`, `catorder`, `catname`) VALUES (0, 'system', 'maxadclick', 'ÿ�������Ч���������', '5', '�����˴��������潫���Ʒ�', 0, 3, '', 20400, '��������');
INSERT INTO `jieqi_system_configs` (`cid`, `modname`, `cname`, `ctitle`, `cvalue`, `cdescription`, `cdefine`, `ctype`, `options`, `catorder`, `catname`) VALUES (0, 'system', 'JIEQI_MAX_PAGES', '�б����ҳ��', '0', '0��ʾ������ҳ��', 1, 3, '', 32800, '��ʾ����');


INSERT INTO `jieqi_system_power` (`modname`, `pname`, `ptitle`, `pdescription`, `pgroups`) VALUES ('system', 'adminblock', '��������', '', '');
INSERT INTO `jieqi_system_power` (`modname`, `pname`, `ptitle`, `pdescription`, `pgroups`) VALUES ('system', 'sendmessage', '��������Ա���Ͷ���', '', '');

UPDATE `jieqi_system_blocks` SET `contenttype` = '1' WHERE `modname` = 'system' AND  `classname` = 'BlockSystemUserlist';


INSERT INTO `jieqi_system_honors` (`honorid`, `caption`, `minscore`, `maxscore`, `setting`, `honortype`) VALUES (1, '������·', -9999999, 50, '', 0);
INSERT INTO `jieqi_system_honors` (`honorid`, `caption`, `minscore`, `maxscore`, `setting`, `honortype`) VALUES (2, '��ͨ��Ա', 50, 200, '', 0);
INSERT INTO `jieqi_system_honors` (`honorid`, `caption`, `minscore`, `maxscore`, `setting`, `honortype`) VALUES (3, '�м���Ա', 200, 500, '', 0);
INSERT INTO `jieqi_system_honors` (`honorid`, `caption`, `minscore`, `maxscore`, `setting`, `honortype`) VALUES (4, '�߼���Ա', 500, 1000, '', 0);
INSERT INTO `jieqi_system_honors` (`honorid`, `caption`, `minscore`, `maxscore`, `setting`, `honortype`) VALUES (5, '���ƻ�Ա', 1000, 3000, '', 0);
INSERT INTO `jieqi_system_honors` (`honorid`, `caption`, `minscore`, `maxscore`, `setting`, `honortype`) VALUES (6, '��վԪ��', 3000, 9999999, '', 0);

INSERT INTO `jieqi_system_right` (`rid`, `modname`, `rname`, `rtitle`, `rdescription`, `rhonors`) VALUES (1, 'system', 'maxfriends', '��������', '', '');
INSERT INTO `jieqi_system_right` (`rid`, `modname`, `rname`, `rtitle`, `rdescription`, `rhonors`) VALUES (2, 'system', 'maxmessages', '���������Ϣ��', '', '');
INSERT INTO `jieqi_system_right` (`rid`, `modname`, `rname`, `rtitle`, `rdescription`, `rhonors`) VALUES (3, 'article', 'maxbookmarks', '�������ղ���', '', '');
INSERT INTO `jieqi_system_right` (`rid`, `modname`, `rname`, `rtitle`, `rdescription`, `rhonors`) VALUES (4, 'article', 'dayvotes', 'ÿ�������Ƽ�����', '', '');


DELETE FROM `jieqi_system_modules` WHERE name='system';
UPDATE `jieqi_system_modules` SET caption='С˵����', version=130 WHERE name='article';
UPDATE `jieqi_system_modules` SET caption='��̳', version=130 WHERE name='forum';
UPDATE `jieqi_system_modules` SET caption='���ߵ�����', version=110 WHERE name='obook';


UPDATE `jieqi_system_configs` SET catname='��ʾ����' WHERE modname='article' AND cname='writergroup';
INSERT INTO `jieqi_system_configs` (`modname`, `cname`, `ctitle`, `cvalue`, `cdescription`, `cdefine`, `ctype`, `options`, `catorder`, `catname`) VALUES ('article', 'attachdir', '��������Ŀ¼', 'attachment', '', 0, 1, '', 40100, '��������');
INSERT INTO `jieqi_system_configs` (`modname`, `cname`, `ctitle`, `cvalue`, `cdescription`, `cdefine`, `ctype`, `options`, `catorder`, `catname`) VALUES ('article', 'attachtype', '�����ϴ��ĸ�������', 'gif jpg jpeg png bmp', '��������ÿո��', 0, 1, '', 40200, '��������');
INSERT INTO `jieqi_system_configs` (`modname`, `cname`, `ctitle`, `cvalue`, `cdescription`, `cdefine`, `ctype`, `options`, `catorder`, `catname`) VALUES ('article', 'maxattachnum', 'һ�η�����฽����', '5', '��� 0 �ͱ�ʾ��ֹ�����ϴ�', 0, 3, '', 40300, '��������');
INSERT INTO `jieqi_system_configs` (`modname`, `cname`, `ctitle`, `cvalue`, `cdescription`, `cdefine`, `ctype`, `options`, `catorder`, `catname`) VALUES ('article', 'maximagesize', 'ͼƬ�����������K', '1000', '', 0, 3, '', 40400, '��������');
INSERT INTO `jieqi_system_configs` (`modname`, `cname`, `ctitle`, `cvalue`, `cdescription`, `cdefine`, `ctype`, `options`, `catorder`, `catname`) VALUES ('article', 'maxfilesize', '�ļ������������K', '1000', '', 0, 3, '', 40500, '��������');
INSERT INTO `jieqi_system_configs` (`modname`, `cname`, `ctitle`, `cvalue`, `cdescription`, `cdefine`, `ctype`, `options`, `catorder`, `catname`) VALUES ('article', 'attachurl', '���ʸ�����URL', '', '���������·���Ļ��˴����գ�����������url����󲻴�б��', 0, 1, '', 40120, '��������');
INSERT INTO `jieqi_system_configs` (`modname`, `cname`, `ctitle`, `cvalue`, `cdescription`, `cdefine`, `ctype`, `options`, `catorder`, `catname`) VALUES ('article', 'samearticlename', '���±����Ƿ������ظ�', '0', '', 0, 7, 'a:2:{i:1;s:2:"��";i:0;s:2:"��";}', 15100, '��ʾ����');
INSERT INTO `jieqi_system_configs` (`modname`, `cname`, `ctitle`, `cvalue`, `cdescription`, `cdefine`, `ctype`, `options`, `catorder`, `catname`) VALUES ('article', 'fakeprefix', 'α��̬ҳ��Ŀ¼ǰ׺', '', '�û����������Ŀ¼ǰ׺��α��̬ҳ�潫�ڸ�Ŀ¼��ʹ�ø�ǰ׺����Ŀ¼���������Լ���α��̬ҳ���Ŀ¼��ȣ����ǻ����Ӹ�Ŀ¼�µ�Ŀ¼����', 0, 1, '', 21980, '�ļ�����');
INSERT INTO `jieqi_system_configs` (`cid`, `modname`, `cname`, `ctitle`, `cvalue`, `cdescription`, `cdefine`, `ctype`, `options`, `catorder`, `catname`) VALUES (0, 'article', 'attachwater', 'ͼƬ�������ˮӡ��λ��', '0', '��������Ҫ GD ��֧�ֲ���ʹ�ã��� JPG/PNG/GIF ��ʽ���ϴ�ͼƬ��Ч', 0, 7, 'a:11:{i:0;s:8:"����ˮӡ";i:1;s:8:"��������";i:2;s:8:"��������";i:3;s:8:"��������";i:4;s:8:"�в�����";i:5;s:8:"�в�����";i:6;s:8:"�в�����";i:7;s:8:"�ײ�����";i:8;s:8:"�ײ�����";i:9;s:8:"�ײ�����";i:10;s:8:"���λ��";}', 32810, '��������');
INSERT INTO `jieqi_system_configs` (`cid`, `modname`, `cname`, `ctitle`, `cvalue`, `cdescription`, `cdefine`, `ctype`, `options`, `catorder`, `catname`) VALUES (0, 'article', 'attachwimage', '����ˮӡͼƬ�ļ�', 'watermark.gif', '���� JPG/PNG/GIF ��ʽ��Ĭ��ֻ�����ļ��������� modules/article/images Ŀ¼��', 0, 1, '', 32820, '��������');
INSERT INTO `jieqi_system_configs` (`cid`, `modname`, `cname`, `ctitle`, `cvalue`, `cdescription`, `cdefine`, `ctype`, `options`, `catorder`, `catname`) VALUES (0, 'article', 'attachwtrans', 'ˮӡͼƬ��ԭͼƬ���ں϶�', '30', '��ΧΪ 1��100 ����������ֵԽ��ˮӡͼƬ͸����Խ�͡�', 0, 3, '', 32830, '��������');
INSERT INTO `jieqi_system_configs` (`cid`, `modname`, `cname`, `ctitle`, `cvalue`, `cdescription`, `cdefine`, `ctype`, `options`, `catorder`, `catname`) VALUES (0, 'article', 'attachwquality', 'jpegͼƬ����', '90', '��ΧΪ 0��100 ����������ֵԽ����ͼƬЧ��Խ�ã����ߴ�ҲԽ��', 0, 3, '', 32840, '��������');
INSERT INTO `jieqi_system_configs` (`cid`, `modname`, `cname`, `ctitle`, `cvalue`, `cdescription`, `cdefine`, `ctype`, `options`, `catorder`, `catname`) VALUES (0, 'article', 'searchtype', '����ƥ�䷽ʽ', '0', '', 0, 7, 'a:3:{i:0;s:8:"ģ��ƥ��";i:1;s:10:"��ģ��ƥ��";i:2;s:8:"����ƥ��";}', 14150, '��ʾ����');
INSERT INTO `jieqi_system_configs` (`cid`, `modname`, `cname`, `ctitle`, `cvalue`, `cdescription`, `cdefine`, `ctype`, `options`, `catorder`, `catname`) VALUES (0, 'article', 'toppagenum', '���а�һҳ��ʾ����', '30', '', 0, 3, '', 12320, '��ʾ����');
INSERT INTO `jieqi_system_configs` (`cid`, `modname`, `cname`, `ctitle`, `cvalue`, `cdescription`, `cdefine`, `ctype`, `options`, `catorder`, `catname`) VALUES (0, 'article', 'topcachenum', '���а񻺴漸��ҳ��', '10', '', 0, 3, '', 12350, '��ʾ����');



UPDATE jieqi_system_power SET pname='manageallarticle' WHERE modname='article' AND pname='manageallartiale';
INSERT INTO `jieqi_system_power` (`modname`, `pname`, `ptitle`, `pdescription`, `pgroups`) VALUES ('article', 'articleupattach', '���������ϴ�����', '', '');
INSERT INTO `jieqi_system_power` (`modname`, `pname`, `ptitle`, `pdescription`, `pgroups`) VALUES ('article', 'reviewupattach', '���������ϴ�����', '', '');
INSERT INTO `jieqi_system_power` (`pid`, `modname`, `pname`, `ptitle`, `pdescription`, `pgroups`) VALUES (0, 'article', 'viewuplog', '�鿴���¼�¼', '', '');
INSERT INTO `jieqi_system_power` (`pid`, `modname`, `pname`, `ptitle`, `pdescription`, `pgroups`) VALUES (0, 'article', 'newreview', '��������', '', '');
INSERT INTO `jieqi_system_power` (`pid`, `modname`, `pname`, `ptitle`, `pdescription`, `pgroups`) VALUES (0, 'article', 'articlemodify', '�޸�����ͳ��', '', '');

DELETE FROM `jieqi_system_blocks` WHERE modname='article' AND classname='BlockArticleCommend';
INSERT INTO `jieqi_system_blocks` (`bid`, `blockname`, `modname`, `filename`, `classname`, `side`, `title`, `description`, `content`, `vars`, `template`, `cachetime`, `contenttype`, `weight`, `showstatus`, `custom`, `canedit`, `publish`, `hasvars`) VALUES (0, '���·����Ƽ�', 'article', 'block_commend', 'BlockArticleCommend', 0, '�����Ƽ�', '&nbsp;&nbsp;&nbsp;&nbsp;�����������û��Զ���ģ��Ͳ��������Ҳ�ͬ�����ÿ��Ա���ɲ�ͬ�����顣<br>&nbsp;&nbsp;&nbsp;&nbsp;����Ĭ��ģ���ļ�Ϊ��block_commend.html������/modules/article/templates/blocksĿ¼�£����������������ģ���ļ���Ҳ�����ڴ�Ŀ¼��ģ���ļ��������ձ�ʾʹ��Ĭ��ģ�塣<br>&nbsp;&nbsp;&nbsp;&nbsp;�������������Ƽ������������Ϊ��������ͬ����֮����Ӣ�ġ�|���ָ������磺 ��123|234|456|678�� ��ʾ������������ĸ����������Ϣ��ʾ', '', '', 'block_commend.html', 0, 1, 23100, 0, 0, 0, 0, 2);




INSERT INTO `jieqi_system_configs` (`cid`, `modname`, `cname`, `ctitle`, `cvalue`, `cdescription`, `cdefine`, `ctype`, `options`, `catorder`, `catname`) VALUES (0, 'forum', 'attachwater', 'ͼƬ�������ˮӡ��λ��', '0', '��������Ҫ GD ��֧�ֲ���ʹ�ã��� JPG/PNG/GIF ��ʽ���ϴ�ͼƬ��Ч', 0, 7, 'a:11:{i:0;s:8:"����ˮӡ";i:1;s:8:"��������";i:2;s:8:"��������";i:3;s:8:"��������";i:4;s:8:"�в�����";i:5;s:8:"�в�����";i:6;s:8:"�в�����";i:7;s:8:"�ײ�����";i:8;s:8:"�ײ�����";i:9;s:8:"�ײ�����";i:10;s:8:"���λ��";}', 36010, '��������');
INSERT INTO `jieqi_system_configs` (`cid`, `modname`, `cname`, `ctitle`, `cvalue`, `cdescription`, `cdefine`, `ctype`, `options`, `catorder`, `catname`) VALUES (0, 'forum', 'attachwimage', '����ˮӡͼƬ�ļ�', 'watermark.gif', '���� JPG/PNG/GIF ��ʽ��Ĭ��ֻ�����ļ��������� modules/article/images Ŀ¼��', 0, 1, '', 36020, '��������');
INSERT INTO `jieqi_system_configs` (`cid`, `modname`, `cname`, `ctitle`, `cvalue`, `cdescription`, `cdefine`, `ctype`, `options`, `catorder`, `catname`) VALUES (0, 'forum', 'attachwtrans', 'ˮӡͼƬ��ԭͼƬ���ں϶�', '30', '��ΧΪ 1��100 ����������ֵԽ��ˮӡͼƬ͸����Խ�͡�', 0, 3, '', 36030, '��������');
INSERT INTO `jieqi_system_configs` (`cid`, `modname`, `cname`, `ctitle`, `cvalue`, `cdescription`, `cdefine`, `ctype`, `options`, `catorder`, `catname`) VALUES (0, 'forum', 'attachwquality', 'jpegͼƬ����', '90', '��ΧΪ 0��100 ����������ֵԽ����ͼƬЧ��Խ�ã����ߴ�ҲԽ��', 0, 3, '', 36040, '��������');
INSERT INTO `jieqi_system_configs` (`cid`, `modname`, `cname`, `ctitle`, `cvalue`, `cdescription`, `cdefine`, `ctype`, `options`, `catorder`, `catname`) VALUES (0, 'forum', 'searchtype', '����ƥ�䷽ʽ', '0', '', 0, 7, 'a:3:{i:0;s:8:"ģ��ƥ��";i:1;s:10:"��ģ��ƥ��";i:2;s:8:"����ƥ��";}', 10950, '��ʾ����');

UPDATE `jieqi_system_blocks` SET contenttype=4 WHERE modname='article' AND classname='BlockArticleArticlelist';
UPDATE `jieqi_system_configs` SET ctitle='�û��б�ÿҳ��ʾ��' WHERE modname='system' AND cname='userpnum';