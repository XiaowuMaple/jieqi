-- 
-- �������е����� `jieqi_system_blocks`
-- 

INSERT INTO `jieqi_system_blocks` (`bid`, `blockname`, `modname`, `filename`, `classname`, `side`, `title`, `description`, `content`, `vars`, `template`, `cachetime`, `contenttype`, `weight`, `showstatus`, `custom`, `canedit`, `publish`, `hasvars`) VALUES (0, 'ͶƱ����', 'vote', 'block_votebox', 'BlockVoteBox', 1, 'ͶƱ��', '&nbsp;&nbsp;&nbsp;&nbsp;�����������û��Զ�����������Ҳ�ͬ�����ÿ��Ա���ɲ�ͬ�����顣<br>&nbsp;&nbsp;&nbsp;&nbsp;������������һ��������<br>&nbsp;&nbsp;&nbsp;&nbsp;�ò�����ͶƱ��������ID��ʹ��������Ĭ��Ϊ0��<br>&nbsp;&nbsp;&nbsp;&nbsp;�������������ձ�ʾ��������ͶƱ�����ӣ� ��20�� ��ʾ����ͶƱ����IDΪ20��ͶƱ��', '', '0', 'block_votebox.html', 0, 1, 40100, 0, 0, 0, 3, 1);
INSERT INTO `jieqi_system_blocks` (`bid`, `blockname`, `modname`, `filename`, `classname`, `side`, `title`, `description`, `content`, `vars`, `template`, `cachetime`, `contenttype`, `weight`, `showstatus`, `custom`, `canedit`, `publish`, `hasvars`) VALUES (0, '��ʷͶƱ', 'vote', 'block_topiclist', 'BlockTopicList', 1, '��ʷͶƱ', '&nbsp;&nbsp;&nbsp;&nbsp;�����������û��Զ�����������Ҳ�ͬ�����ÿ��Ա���ɲ�ͬ�����顣<br>&nbsp;&nbsp;&nbsp;&nbsp;������������������������ͬ����֮����Ӣ�Ķ��ŷָ���,����<br>&nbsp;&nbsp;&nbsp;&nbsp;����һ����ʾͶƱ������ʹ��������Ĭ�� 5��<br>&nbsp;&nbsp;&nbsp;&nbsp;��������ͶƱ������ʾ������ʹ��������Ĭ�� 16��<br>&nbsp;&nbsp;&nbsp;&nbsp;����������һ����߶������վ���ʾʹ��Ĭ��ֵ�����ӣ� ��10,16�� ��ʾ��ʾ10����ʷͶƱ�б�', '', '5,16', 'block_topiclist.html', 0, 1, 40200, 0, 0, 0, 0, 1);

-- 
-- �������е����� `jieqi_system_configs`
-- 

INSERT INTO `jieqi_system_configs` (`cid`, `modname`, `cname`, `ctitle`, `cvalue`, `cdescription`, `cdefine`, `ctype`, `options`, `catorder`, `catname`) VALUES (0, 'vote', 'votemanageword', 'ͶƱ�������ҳ��������', '40', '', 0, 3, '', 10100, '��ʾ����');
INSERT INTO `jieqi_system_configs` (`cid`, `modname`, `cname`, `ctitle`, `cvalue`, `cdescription`, `cdefine`, `ctype`, `options`, `catorder`, `catname`) VALUES (0, 'vote', 'voteonshowword', 'ǰ̨ͶƱ������������', '20', '', 0, 3, '', 10200, '��ʾ����');
INSERT INTO `jieqi_system_configs` (`cid`, `modname`, `cname`, `ctitle`, `cvalue`, `cdescription`, `cdefine`, `ctype`, `options`, `catorder`, `catname`) VALUES (0, 'vote', 'votepercentdigit', 'ͶƱ����ٷֱ�С��λ��', '2', '', 0, 3, '', 10300, '��ʾ����');
INSERT INTO `jieqi_system_configs` (`cid`, `modname`, `cname`, `ctitle`, `cvalue`, `cdescription`, `cdefine`, `ctype`, `options`, `catorder`, `catname`) VALUES (0, 'vote', 'votetimelimit', '�ظ�ͶƱ���ʱ����', '3600', '��λ����', 0, 3, '', 20100, 'ʱ�����');

-- 
-- �������е����� `jieqi_system_modules`
-- 

INSERT INTO `jieqi_system_modules` (`mid`, `name`, `caption`, `description`, `version`, `vtype`, `lastupdate`, `weight`, `publish`, `modtype`) VALUES (0, 'vote', 'ͶƱ����', '�뱾վ��ϵ�ͶƱϵͳ', 110, '', 0, 0, 1, 0);

-- 
-- �������е����� `jieqi_system_power`
-- 

INSERT INTO `jieqi_system_power` (`pid`, `modname`, `pname`, `ptitle`, `pdescription`, `pgroups`) VALUES (0, 'vote', 'adminconfig', '�����������', '', '');
INSERT INTO `jieqi_system_power` (`pid`, `modname`, `pname`, `ptitle`, `pdescription`, `pgroups`) VALUES (0, 'vote', 'adminpower', '����Ȩ������', '', '');
INSERT INTO `jieqi_system_power` (`pid`, `modname`, `pname`, `ptitle`, `pdescription`, `pgroups`) VALUES (0, 'vote', 'votemanage', '����ͶƱ����', '', '');
INSERT INTO `jieqi_system_power` (`pid`, `modname`, `pname`, `ptitle`, `pdescription`, `pgroups`) VALUES (0, 'vote', 'votepermit', '����ͶƱ', '', '');

