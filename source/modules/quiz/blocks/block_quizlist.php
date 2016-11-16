<?php
/**
 * type(��ȡ�����)(0,������,1.�����2.�ѽ��3.�ر�4.����)
 * typeid(��ȡ�ķ���)(����,����,0������)
 * order(����ʽ)(addtime ��ʼʱ�� overtime����ʱ�� score ����)
 * desc(˳��)(desc.asc)
 * num(��ȡ������)(����)
 * catpage(�Ƿ��ҳ)(1.0)
 * user(�Ƿ�ֻ�ǵ�ǰ�û�����Ϣ)(1.0.3ֱ�ӵ�ǰ�û����������)
 * typename �÷����Ψһ��ʾ����(����Ϊ�գ����ǲ����Ը���Ĭ������)
 * iscache 0 ������ 1����
 */
class BlockQuizQuizList extends JieqiBlock
{
	var $blockvars=array();  //�������
	var $exevars=array('type'=>'0','typeid'=>'0','order'=>'addtime','desc'=>'desc','num'=>'10','catpage'=>'0','user'=>'0');//Ĭ������
	var $template='block_quizlist.html';
	var $cachetime=JIEQI_CACHE_LIFETIME;

	function BlockQuizQuizList($vars)
	{
		$this->JieqiBlock($vars);
		if($this->blockvars['template']!=''){$this->template=$this->blockvars['template'];}
		if(!empty($this->blockvars['vars']))
		{
			$varary=explode(',', trim($this->blockvars['vars']));
			$this->exevars['type'] = trim($varary['0']);
			$this->exevars['typeid'] = trim($varary['1']);
			$this->exevars['order'] = trim($varary['2']);
			$this->exevars['desc'] = trim($varary['3']);
			$this->exevars['num'] = trim($varary['4']);
			$this->exevars['catpage'] = trim($varary['5']);
			$this->exevars['user'] = trim($varary['6']);
			$this->exevars['typename'] = trim($varary['7']);
			$this->exevars['iscache'] = trim($varary['8']);
			$this->exevars['iscache']==''?1:$this->exevars['iscache'];

			global $jieqiTpl;
			global $jieqiConfigs;
			global $jieqiSort;
			global $Blocks;
			global $jieqiModules;
			jieqi_getconfigs('quiz','update','Blocks');
			if(!is_object($jieqiTpl)) $jieqiTpl =& JieqiTpl::getInstance();
			$cacheid=$this->blockvars['bid'];
			//$Blocks[$this->exevars['typename']];����ʱ��
			if($this->exevars['catpage']=='0')
			{
				$this->blockvars['overtime'] = $Blocks[$this->exevars['typename']];
				$this->blockvars['cacheid']=$this->blockvars['bid'];
				if(!empty($this->blockvars['template'])){
					$this->blockvars['template']=$this->template;
				}
				$this->blockvars['tlpfile'] = $jieqiModules['quiz']['path'].'/templates/blocks/'.$this->template;
			}
			else
			{
				$this->blockvars['overtime'] = $Blocks[$this->exevars['typename']];
				$page=(int)$_REQUEST['page'];
				$page=$page=='' | $page==0?1:$page;
				$this->blockvars['overtime'] = $Blocks[$this->exevars['typename']];
				$this->blockvars['cacheid']=$this->blockvars['bid'].$page;
				if(!empty($this->blockvars['template'])){
					$this->blockvars['template']=$this->template;
				}
				$this->blockvars['tlpfile'] = $jieqiModules['quiz']['path'].'/templates/blocks/'.$this->template;

			}
		}
	}

	function setContent()
	{
		global $jieqiTpl;
		global $jieqiConfigs;
		global $jieqiSort;

		jieqi_includedb();
		$query=JieqiQueryHandler::getInstance('JieqiQueryHandler');
		$sql='select * from '.jieqi_dbprefix('quiz_problems').' where 1 ';
		if($this->exevars['type']!=0)//���SQL���
		{
			if($this->exevars['type']==4)
			{
				$sql.=' and typez = 1 and overtime < '.time();
			}
			else
			{
				if($this->exevars['type']==3)
				{
					$sql.=' and typez = 0 ';
				}
				else
				{
					$sql.=' and typez = '.$this->exevars['type'];
				}
				if($this->exevars['type']==1)
				{
					$sql.=' and overtime >'.time();
				}
			}
		}
		if($this->exevars['typeid']!='0')
		{
			$sql.=' and typeid = \''.$this->exevars['typeid'].'\' ';
		}

		//echo $this->exevars['user'];exit;
		if($this->exevars['user']!=0)
		{
			@include_once(JIEQI_ROOT_PATH.'/module/quiz/include/usertype.php');
			$usertype = usertype::getInstance('usertype');
			if($this->exevars['user']==1)
			{
				if(!$usertype -> isuser()){jieqi_jumppage(JIEQI_URL.'/login.php',$jieqiLang['quiz']['notusertitle'],$jieqiLang['quiz']['notuser']);}
				$sql.=' and username = \''.$usertype->get('username').'\'';
			}
			elseif($this->exevars['user']==3)
			{
				if(!$usertype -> isuser()){jieqi_jumppage(JIEQI_URL.'/login.php',$jieqiLang['quiz']['notusertitle'],$jieqiLang['quiz']['notuser']);}
				$sql='select p.* from '.jieqi_dbprefix('quiz_answer').' a,'.jieqi_dbprefix('quiz_problems').' p where a.username= \''.$usertype->get('username').'\' and a.problemid=p.quizid';
			}
		}
		if($this->exevars['order'])
		{
			$sql.=' order by '.$this->exevars['order'].' '.$this->exevars['desc'];
		}
		if($this->exevars['catpage'])
		{
			$page=(int)$_REQUEST['page'];
			$page=$page=='' | $page==0?1:$page;
			//��ҳ������ȡ
			$newsql=str_replace('*','count(*)',$sql);
			$newrow=$query->getRow($query->execute($newsql));
			$newrow=$newrow['count(*)'];
			include_once(JIEQI_ROOT_PATH.'/lib/html/page.php');
			$jumppage = new JieqiPage($newrow,$this->exevars['num'],$page,10);
			$pages=$jumppage->whole_bar();
			$jieqiTpl->assign('pages',$pages);
			$sql.=' limit '.($page-1)*$this->exevars['num'].','.$this->exevars['num'];
		}
		else
		{
			$sql.=' limit 0 , '.$this->exevars['num'];
		}
		$row=$query->execute($sql);
		$quizarry=array();
		while ($v = $query->getRow())
		{
			$quizarry[]=$v;
		}

		$jieqiTpl->assign_by_ref('quizarry',$quizarry);
		global $linkurl;
		if($this->exevars['type']==1)//�ж�����ָ���ַ
		{
			$jieqiTpl->assign('url_more',$linkurl.'/problems_more.php');
		}
		elseif($this->exevars['type']==2)
		{
			$jieqiTpl->assign('url_more',$linkurl.'/problems_end_more.php');
		}
	}
}
?>