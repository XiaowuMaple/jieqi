INSERT INTO `jieqi_system_configs` (`cid`, `modname`, `cname`, `ctitle`, `cvalue`, `cdescription`, `cdefine`, `ctype`, `options`, `catorder`, `catname`) VALUES(0, 'pay', 'paylogpnum', '����֧����¼ÿҳ��ʾ��', '50', '', 0, 3, '', 10700, '��ʾ����');
INSERT INTO `jieqi_system_configs` (`cid`, `modname`, `cname`, `ctitle`, `cvalue`, `cdescription`, `cdefine`, `ctype`, `options`, `catorder`, `catname`) VALUES(0, 'pay', 'egoldtransrate', '�������ת������', '100', '�ٷֱȣ�����д0~100�����֣�0��ʾ������ת��', 0, 3, '', 11100, '��ʾ����');
INSERT INTO `jieqi_system_configs` (`cid`, `modname`, `cname`, `ctitle`, `cvalue`, `cdescription`, `cdefine`, `ctype`, `options`, `catorder`, `catname`) VALUES(0, 'pay', 'creditransrate', '���ۻ���ת������', '10', '�ٷֱȣ�����д0~100�����֣�0��ʾ������ת��', 0, 3, '', 11200, '��ʾ����');
INSERT INTO `jieqi_system_configs` (`cid`, `modname`, `cname`, `ctitle`, `cvalue`, `cdescription`, `cdefine`, `ctype`, `options`, `catorder`, `catname`) VALUES(0, 'pay', 'scoretransrate', '��վ����ת������', '0', '�ٷֱȣ�����д0~100�����֣�0��ʾ������ת��', 0, 3, '', 11300, '��ʾ����');


INSERT INTO `jieqi_system_power` (`pid`, `modname`, `pname`, `ptitle`, `pdescription`, `pgroups`) VALUES(0, 'pay', 'adminpaylog', '�����ֵ��¼', '', '');


INSERT INTO `jieqi_system_modules` (`mid`, `name`, `caption`, `description`, `version`, `lastupdate`, `weight`, `publish`, `modtype`) VALUES (0, 'pay', '���߳�ֵ', '����ҳ�ֵ', 140, 0, 0, 1, 0);
