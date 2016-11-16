UPDATE `jieqi_system_modules` SET version=130 WHERE name='obook';

UPDATE `jieqi_system_configs` SET cvalue = CONCAT(cvalue, '/modules/obook') WHERE modname = 'obook' AND cname = 'dynamicurl' AND cvalue != '' AND cvalue NOT LIKE '%/modules/obook';

UPDATE `jieqi_system_configs` SET cvalue = CONCAT(cvalue, '/modules/obook') WHERE modname = 'obook' AND cname = 'staticurl' AND cvalue != '' AND cvalue NOT LIKE '%/modules/obook';

INSERT INTO `jieqi_system_configs` (`cid`, `modname`, `cname`, `ctitle`, `cvalue`, `cdescription`, `cdefine`, `ctype`, `options`, `catorder`, `catname`) VALUES (0, 'obook', 'obookreadhead', '�Ķ�����ͷ����������', '', '�Ķ�һ���������½�ʱ������ͷ����β�����Ը���һЩԤ�����õ����ݣ�������վ���ơ���Ȩ�����ȡ�', 0, 2, '', 32100, '�Ķ�����');

INSERT INTO `jieqi_system_configs` (`cid`, `modname`, `cname`, `ctitle`, `cvalue`, `cdescription`, `cdefine`, `ctype`, `options`, `catorder`, `catname`) VALUES (0, 'obook', 'obookreadfoot', '�Ķ�����β����������', '', '�Ķ�һ���������½�ʱ������ͷ����β�����Ը���һЩԤ�����õ����ݣ�������վ���ơ���Ȩ�����ȡ�', 0, 2, '', 32200, '�Ķ�����');


INSERT INTO `jieqi_system_configs` (`cid`, `modname`, `cname`, `ctitle`, `cvalue`, `cdescription`, `cdefine`, `ctype`, `options`, `catorder`, `catname`) VALUES (0, 'obook', 'jpegquality', 'jpegͼƬ����', '90', '��ΧΪ 0��100 ����������ֵԽ����ͼƬЧ��Խ�ã����ߴ�ҲԽ�󣬱�����������jpeg��ʽͼƬʱ��Ч��', 0, 3, '', 30550, '�Ķ�����');

INSERT INTO `jieqi_system_configs` (`cid`, `modname`, `cname`, `ctitle`, `cvalue`, `cdescription`, `cdefine`, `ctype`, `options`, `catorder`, `catname`) VALUES (0, 'obook', 'obookwater', '�Ƿ��ͼƬˮӡ��ˮӡλ��', '0', '��������Ҫ GD ��֧�ֲ���ʹ�ã��� JPG/PNG/GIF ��ʽ��ͼƬ��Ч', 0, 7, 'a:11:{i:0;s:8:"����ˮӡ";i:1;s:8:"��������";i:2;s:8:"��������";i:3;s:8:"��������";i:4;s:8:"�в�����";i:5;s:8:"�в�����";i:6;s:8:"�в�����";i:7;s:8:"�ײ�����";i:8;s:8:"�ײ�����";i:9;s:8:"�ײ�����";i:10;s:8:"���λ��";}', 31500, '�Ķ�����');
INSERT INTO `jieqi_system_configs` (`cid`, `modname`, `cname`, `ctitle`, `cvalue`, `cdescription`, `cdefine`, `ctype`, `options`, `catorder`, `catname`) VALUES (0, 'obook', 'obookwimage', 'ˮӡͼƬ�ļ�', 'watermark.gif', '���� JPG/PNG/GIF ��ʽ��Ĭ��ֻ�����ļ��������� modules/obook/images Ŀ¼��', 0, 1, '', 31600, '�Ķ�����');
INSERT INTO `jieqi_system_configs` (`cid`, `modname`, `cname`, `ctitle`, `cvalue`, `cdescription`, `cdefine`, `ctype`, `options`, `catorder`, `catname`) VALUES (0, 'obook', 'obookwtrans', 'ˮӡͼƬ��ԭͼƬ���ں϶�', '30', '��ΧΪ 1��100 ����������ֵԽ��ˮӡͼƬ͸����Խ�͡�', 0, 3, '', 31700, '�Ķ�����');


INSERT INTO `jieqi_system_configs` (`cid`, `modname`, `cname`, `ctitle`, `cvalue`, `cdescription`, `cdefine`, `ctype`, `options`, `catorder`, `catname`) VALUES (0, 'obook', 'obkwatertext', '�Ƿ������ˮӡ��ˮӡλ��', '0', '��������Ҫ GD ��֧�ֲ���ʹ�ã��� JPG/PNG/GIF ��ʽ��ͼƬ��Ч', 0, 7, 'a:3:{i:0;s:8:"����ˮӡ";i:1;s:8:"ͼƬ�Ľ�";i:2;s:8:"����ƽ��";}', 31050, '�Ķ�����');