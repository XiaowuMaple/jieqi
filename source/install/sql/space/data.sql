-- phpMyAdmin SQL Dump
-- version 2.10.2-rc1
-- http://www.phpmyadmin.net
-- 
-- ����: localhost
-- ��������: 2009 �� 03 �� 05 �� 17:25
-- �������汾: 5.0.45
-- PHP �汾: 5.1.4

-- 
-- ���ݿ�: `jieqi16`
-- 

-- 
-- �������е����� `jieqi_system_configs`
-- 

INSERT INTO `jieqi_system_configs` (`cid`, `modname`, `cname`, `ctitle`, `cvalue`, `cdescription`, `cdefine`, `ctype`, `options`, `catorder`, `catname`) VALUES (0, 'space', 'attachdir', '��������Ŀ¼', 'attachment', '', 0, 1, '', 40000, '��������');
INSERT INTO `jieqi_system_configs` (`cid`, `modname`, `cname`, `ctitle`, `cvalue`, `cdescription`, `cdefine`, `ctype`, `options`, `catorder`, `catname`) VALUES (0, 'space', 'attachtype', '�����ϴ��ĸ�������', '*.jpg;*.jpeg;*.gif;*.png;*.bmp', '��������÷ֺŸ�', 0, 1, '', 40000, '��������');
INSERT INTO `jieqi_system_configs` (`cid`, `modname`, `cname`, `ctitle`, `cvalue`, `cdescription`, `cdefine`, `ctype`, `options`, `catorder`, `catname`) VALUES (0, 'space', 'attachwater', 'ͼƬ�������ˮӡ��λ��', '0', '��������Ҫ GD ��֧�ֲ���ʹ�ã��� JPG/PNG/GIF ��ʽ���ϴ�ͼƬ��Ч', 0, 7, 'a:11:{i:0;s:8:"����ˮӡ";i:1;s:8:"��������";i:2;s:8:"��������";i:3;s:8:"��������";i:4;s:8:"�в�����";i:5;s:8:"�в�����";i:6;s:8:"�в�����";i:7;s:8:"�ײ�����";i:8;s:8:"�ײ�����";i:9;s:8:"�ײ�����";i:10;s:8:"���λ��";}', 40000, '��������');
INSERT INTO `jieqi_system_configs` (`cid`, `modname`, `cname`, `ctitle`, `cvalue`, `cdescription`, `cdefine`, `ctype`, `options`, `catorder`, `catname`) VALUES (0, 'space', 'attachwimage', '����ˮӡͼƬ�ļ�', 'watermark.jpg', '���� JPG/PNG/GIF ��ʽ��Ĭ��ֻ�����ļ��������� \r\n\r\nmodules/space/templates/images Ŀ¼��', 0, 1, '', 40000, '��������');
INSERT INTO `jieqi_system_configs` (`cid`, `modname`, `cname`, `ctitle`, `cvalue`, `cdescription`, `cdefine`, `ctype`, `options`, `catorder`, `catname`) VALUES (0, 'space', 'attachwquality', 'jpegͼƬ����', '95', '��ΧΪ 0��100 ����������ֵԽ����ͼƬЧ��Խ�ã����ߴ�ҲԽ��', 0, 3, '', 40000, '��������');
INSERT INTO `jieqi_system_configs` (`cid`, `modname`, `cname`, `ctitle`, `cvalue`, `cdescription`, `cdefine`, `ctype`, `options`, `catorder`, `catname`) VALUES (0, 'space', 'attachwtrans', 'ˮӡͼƬ��ԭͼƬ���ں϶�', '30', '��ΧΪ 1��100 ����������ֵԽ��ˮӡͼƬ͸����Խ�͡�', 0, 3, '', 40000, '��������');
INSERT INTO `jieqi_system_configs` (`cid`, `modname`, `cname`, `ctitle`, `cvalue`, `cdescription`, `cdefine`, `ctype`, `options`, `catorder`, `catname`) VALUES (0, 'space', 'default_brief', '�ռ�Ĭ�ϼ��', '%s �Ŀռ件ӭ��', 'Ĭ�ϵ�������ʾ��ʽ', 0, 0, '', 0, '');
INSERT INTO `jieqi_system_configs` (`cid`, `modname`, `cname`, `ctitle`, `cvalue`, `cdescription`, `cdefine`, `ctype`, `options`, `catorder`, `catname`) VALUES (0, 'space', 'default_theme', 'Ĭ��ģ��', 'first', '�û�Ĭ��ģ��', 0, 0, '', 0, '');
INSERT INTO `jieqi_system_configs` (`cid`, `modname`, `cname`, `ctitle`, `cvalue`, `cdescription`, `cdefine`, `ctype`, `options`, `catorder`, `catname`) VALUES (0, 'space', 'default_title', 'Ĭ�Ͽռ���⡡', '%s �Ŀռ�', 'Ĭ�ϵı�����ʾ��ʽ', 0, 0, '', 0, '');
INSERT INTO `jieqi_system_configs` (`cid`, `modname`, `cname`, `ctitle`, `cvalue`, `cdescription`, `cdefine`, `ctype`, `options`, `catorder`, `catname`) VALUES (0, 'space', 'maximagesize', 'ͼƬ�����������MB', '2', '', 0, 1, '', 40000, '��������');
INSERT INTO `jieqi_system_configs` (`cid`, `modname`, `cname`, `ctitle`, `cvalue`, `cdescription`, `cdefine`, `ctype`, `options`, `catorder`, `catname`) VALUES (0, 'space', 'review_num', 'ÿҳ��ʾ������', '10', '', 0, 1, '', 0, '');

-- 
-- �������е����� `jieqi_system_modules`
-- 

INSERT INTO `jieqi_system_modules` (`mid`, `name`, `caption`, `description`, `version`, `vtype`, `lastupdate`, `weight`, `publish`, `modtype`) VALUES (0, 'space', '���˿ռ�', '', 100, '', 0, 0, 1, 0);

