-- phpMyAdmin SQL Dump
-- version 2.10.2-rc1
-- http://www.phpmyadmin.net
-- 
-- ����: localhost
-- ��������: 2009 �� 01 �� 23 �� 10:48
-- �������汾: 5.0.45
-- PHP �汾: 5.1.4

-- 
-- ���ݿ�: `jieqi16`
-- 

-- --------------------------------------------------------

-- 
-- ��Ľṹ `jieqi_space_attachs`
-- 

CREATE TABLE `jieqi_space_attachs` (
  `attachid` int(11) unsigned NOT NULL auto_increment,
  `catid` int(11) unsigned default '0',
  `uid` int(11) default NULL,
  `name` varchar(80) default '',
  `class` varchar(30) default '',
  `postfix` varchar(30) default '',
  `size` int(11) unsigned default '0',
  `filebak` varchar(50) default NULL,
  `url` varchar(100) default NULL,
  `isdefault` smallint(3) default '0',
  `uptime` int(11) default '0',
  PRIMARY KEY  (`attachid`),
  KEY `chapterid` (`catid`)
) TYPE=MyISAM;

-- --------------------------------------------------------

-- 
-- ��Ľṹ `jieqi_space_blog`
-- 

CREATE TABLE `jieqi_space_blog` (
  `id` int(11) unsigned NOT NULL auto_increment COMMENT '����id',
  `cat_id` smallint(6) NOT NULL default '0' COMMENT '���·���id',
  `title` varchar(80) NOT NULL COMMENT '���±���',
  `content` text NOT NULL COMMENT '��������',
  `hit_num` int(11) unsigned NOT NULL default '0' COMMENT '�����',
  `up_time` int(11) NOT NULL default '0' COMMENT 'д����ʱ��',
  `review_num` int(11) NOT NULL COMMENT '������',
  `ar_open` smallint(1) NOT NULL default '1' COMMENT '�Ƿ񹫿�',
  `allow_com` smallint(1) NOT NULL default '1' COMMENT '�Ƿ���������',
  `uid` int(11) NOT NULL default '0' COMMENT '����id',
  `name` varchar(30) NOT NULL COMMENT '�����ǳ�',
  `default_cat` tinyint(4) NOT NULL default '1' COMMENT '�Ƿ�Ĭ�Ϸ���',
  `ar_commend` tinyint(4) NOT NULL default '0' COMMENT '�Ƽ����±��(��ϵͳadmin�ں�̨����)',
  PRIMARY KEY  (`id`)
) TYPE=MyISAM;

-- --------------------------------------------------------

-- 
-- ��Ľṹ `jieqi_space_blogcat`
-- 

CREATE TABLE `jieqi_space_blogcat` (
  `id` int(11) unsigned NOT NULL auto_increment COMMENT '���·����id',
  `name` varchar(80) NOT NULL COMMENT '���·������',
  `cat_order` tinyint(4) NOT NULL default '0' COMMENT '��ʾ˳��',
  `num` int(11) unsigned NOT NULL default '0' COMMENT '��������',
  `intro` text NOT NULL COMMENT '�������',
  `uid` int(11) NOT NULL default '0' COMMENT '�û�id',
  `default_cat` smallint(1) NOT NULL default '0' COMMENT '�Ƿ�Ĭ�Ϸ���',
  `image` varchar(100) NOT NULL default '/modules/space/templates/images/default.gif' COMMENT '����ͼƬ',
  `attachment` text COMMENT '����',
  `type` varchar(15) NOT NULL default 'blog' COMMENT '����blog/image',
  PRIMARY KEY  (`id`)
) TYPE=MyISAM;

-- --------------------------------------------------------

-- 
-- ��Ľṹ `jieqi_space_blogreview`
-- 

CREATE TABLE `jieqi_space_blogreview` (
  `id` int(11) unsigned NOT NULL auto_increment COMMENT '�Զ����,����',
  `blog_id` int(11) NOT NULL COMMENT '����id',
  `uid` int(11) NOT NULL COMMENT '���·������û�id',
  `poster_id` int(11) NOT NULL COMMENT '������id',
  `poster_name` varchar(50) NOT NULL COMMENT '����������',
  `up_time` int(11) NOT NULL COMMENT '����ʱ��',
  `title` varchar(100) NOT NULL COMMENT '���۱���',
  `content` text NOT NULL COMMENT '����',
  PRIMARY KEY  (`id`)
) TYPE=MyISAM;

-- --------------------------------------------------------

-- 
-- ��Ľṹ `jieqi_space_space`
-- 

CREATE TABLE `jieqi_space_space` (
  `uid` int(10) unsigned NOT NULL COMMENT '�û�id',
  `name` varchar(100) NOT NULL COMMENT '�û���',
  `title` varchar(20) NOT NULL COMMENT '�ռ������',
  `cat_id` int(10) unsigned NOT NULL COMMENT '�ռ����(����)',
  `domain` varchar(20) NOT NULL COMMENT '����(����)',
  `brief` text NOT NULL COMMENT '�ռ���',
  `theme` varchar(40) NOT NULL default 'newsportal' COMMENT '���ģ��',
  `blog_num` int(11) NOT NULL default '0' COMMENT '�ռ�������',
  `pic_num` int(11) NOT NULL default '0' COMMENT '�ռ�ͼƬ��',
  `visit_num` int(11) NOT NULL COMMENT '���ô���',
  `up_time` int(11) NOT NULL COMMENT '������ʱ��',
  `sp_commend` tinyint(1) NOT NULL default '0' COMMENT '�Ƿ��Ƽ�',
  `sp_open` tinyint(1) NOT NULL default '1' COMMENT '�Ƿ�ر�'
) TYPE=MyISAM;
