-- 
-- �������е����� `jieqi_system_blocks`
-- 

INSERT INTO `jieqi_system_blocks` (`bid`, `blockname`, `modname`, `filename`, `classname`, `side`, `title`, `description`, `content`, `vars`, `template`, `cachetime`, `contenttype`, `weight`, `showstatus`, `custom`, `canedit`, `publish`, `hasvars`) VALUES (0, '���������б�', 'note', 'block_noteupdatelist', 'BlockNoteUpdateList', 1, '��������', '&nbsp;&nbsp;&nbsp;&nbsp;�����������û��Զ�����������Ҳ�ͬ�����ÿ��Ա���ɲ�ͬ�����顣<br>&nbsp;&nbsp;&nbsp;&nbsp;������������������������ͬ����֮����Ӣ�Ķ��ŷָ���,����<br>&nbsp;&nbsp;&nbsp;&nbsp;����һ����ʾ����������ʹ��������Ĭ�� 10��<br>&nbsp;&nbsp;&nbsp;&nbsp;�����������Ա�����ʾ������ʹ��������Ĭ�� 16��<br>&nbsp;&nbsp;&nbsp;&nbsp;����������һ����߶������վ���ʾʹ��Ĭ��ֵ�����ӣ� ��20,16�� ��ʾ��ʾ��������ǰ20λ���б�', '', '10,16', 'block_noteupdatelist.html', 0, 1, 30100, 0, 0, 0, 0, 1);

-- 
-- �������е����� `jieqi_system_configs`
-- 

INSERT INTO `jieqi_system_configs` (`cid`, `modname`, `cname`, `ctitle`, `cvalue`, `cdescription`, `cdefine`, `ctype`, `options`, `catorder`, `catname`) VALUES (0, 'note', 'notemanagepnum', '���Թ���ҳ�����б�����', '10', '', 0, 3, '', 10100, '��ʾ����');
INSERT INTO `jieqi_system_configs` (`cid`, `modname`, `cname`, `ctitle`, `cvalue`, `cdescription`, `cdefine`, `ctype`, `options`, `catorder`, `catname`) VALUES (0, 'note', 'notemanageword', '���Թ���ҳ���Ա�������', '40', '', 0, 3, '', 10200, '��ʾ����');
INSERT INTO `jieqi_system_configs` (`cid`, `modname`, `cname`, `ctitle`, `cvalue`, `cdescription`, `cdefine`, `ctype`, `options`, `catorder`, `catname`) VALUES (0, 'note', 'maxnoteword', '���������������', '255', '', 0, 3, '', 10300, '��ʾ����');
INSERT INTO `jieqi_system_configs` (`cid`, `modname`, `cname`, `ctitle`, `cvalue`, `cdescription`, `cdefine`, `ctype`, `options`, `catorder`, `catname`) VALUES (0, 'note', 'minnotetime', '������������ʱ����', '30', '��λ����', 0, 3, '', 20100, 'ʱ�����');

-- 
-- �������е����� `jieqi_system_modules`
-- 

INSERT INTO `jieqi_system_modules` (`mid`, `name`, `caption`, `description`, `version`, `vtype`, `lastupdate`, `weight`, `publish`, `modtype`) VALUES (0, 'note', '�ÿ�����', '�뱾վ��ϵ����Է���', 110, '', 0, 0, 1, 0);

-- 
-- �������е����� `jieqi_system_power`
-- 

INSERT INTO `jieqi_system_power` (`pid`, `modname`, `pname`, `ptitle`, `pdescription`, `pgroups`) VALUES (0, 'note', 'adminconfig', '�����������', '', '');
INSERT INTO `jieqi_system_power` (`pid`, `modname`, `pname`, `ptitle`, `pdescription`, `pgroups`) VALUES (0, 'note', 'adminpower', '����Ȩ������', '', '');
INSERT INTO `jieqi_system_power` (`pid`, `modname`, `pname`, `ptitle`, `pdescription`, `pgroups`) VALUES (0, 'note', 'notelist', '�鿴�����б�', '', '');
INSERT INTO `jieqi_system_power` (`pid`, `modname`, `pname`, `ptitle`, `pdescription`, `pgroups`) VALUES (0, 'note', 'noteshow', '�鿴��������', '', '');
INSERT INTO `jieqi_system_power` (`pid`, `modname`, `pname`, `ptitle`, `pdescription`, `pgroups`) VALUES (0, 'note', 'noteadd', '���Է���', '', '');
INSERT INTO `jieqi_system_power` (`pid`, `modname`, `pname`, `ptitle`, `pdescription`, `pgroups`) VALUES (0, 'note', 'notedel', '����ɾ��', '', '');

