<?php
/**
 * type(��ȡ�����)(0,tag��ǩ��tag��ǩ����.tag��ǩ�µ�����)
 * typeid(��ȡ�ķ���)(0������,)//�������ȡtag�µ����¸�����������0,������
 * order(����ʽ)(num,��ȡ��ǩĬ��ʹ�ô�����addtime����ȡ����ʹ�����ʱ��)
 * desc(˳��)(desc.asc)
 * num(��ȡ������)(����)
 * catpage(�Ƿ��ҳ)(1.0)
 */
class BlockQuizQuizTag extends JieqiBlock
{
	var $blockvars=array();  //�������
	var $exevars=array('type'=>'0','typeid'=>'0','order'=>'num','desc'=>'desc','num'=>'10','catpage'=>'0');//Ĭ������
	var $template='block_hottag.html';
	var $cachetime=JIEQI_CACHE_LIFETIME;

	function BlockQuizQuizTag(&$vars)
	{
		$this->JieqiBlock($vars);
		if(!empty($this->blockvars['vars']))
		{
			$varary=explode(',', trim($this->blockvars['vars']));
			if(count($varary)<6){die('error in BlockQuizTag.php!');}
			$this->exevars['type'] = trim($varary['0']);
			$this->exevars['typeid'] = trim($varary['1']);
			$this->exevars['order'] = trim($varary['2']);
			$this->exevars['desc'] = trim($varary['3']);
			$this->exevars['num'] = trim($varary['4']);
			$this->exevars['catpage'] = trim($varary['5']);
			$this->exevars['typename'] = trim($varary['6']);
		}

		global $jieqiTpl;
		global $jieqiConfigs;
		global $jieqiSort;
		global $jieqiModules;
		jieqi_getconfigs('quiz','update','Blocks');
		global $Blocks;
		if(!is_object($jieqiTpl)) $jieqiTpl =& JieqiTpl::getInstance();
		$cacheid=$this->blockvars['bid'];
		if($jieqiConfigs['quiz']['usetagcase'])
		{
			if($this->exevars['type']=='0')
			{
				if(!$this->exevars['catpage'])//�Ƿ��ҳ
				{	
					$this->blockvars['cacheid']=$this->blockvars['bid'];
					if(!empty($this->blockvars['template'])){
						$this->blockvars['template']=$this->template;
					}
					
					$this->blockvars['tlpfile'] = $jieqiModules['quiz']['path'].'/templates/blocks/'.$this->template;
				}
				else
				{
					$page=(int)$_REQUEST['page'];//��ҳ����
					$page=$page=='' | $page==0?1:$page;

					$this->blockvars['cacheid']=$this->blockvars['bid'].$page;
					if(!empty($this->blockvars['template'])){
						$this->blockvars['template']=$this->template;
					}
					$this->blockvars['tlpfile'] = $jieqiModules['quiz']['path'].'/templates/blocks/block_taglist.html';
				}
			}
		}
		else
		{
			$page=(int)$_REQUEST['page'];
			$page=$page=='' | $page==0?1:$page;

			$this->blockvars['cacheid']=$this->blockvars['bid'].urlencode($_REQUEST['tagname']).$page;
			if(!empty($this->blockvars['template'])){
				$this->blockvars['template']=$this->template;
			}
			$this->blockvars['tlpfile'] = $jieqiModules['quiz']['path'].'/templates/blocks/'.$this->template;
		}
	}



	function setContent($isreturn=false)
	{
		global $jieqiTpl;
		global $jieqiConfigs;
		global $jieqiSort;

		jieqi_includedb();
		$query=JieqiQueryHandler::getInstance('JieqiQueryHandler');
		if($this->exevars['type']=='0')//��ȡ���ű�ǩ
		{
			$sql="select * from ".jieqi_dbprefix('quiz_tag')." where 1";
			if($this->exevars['typeid']!=0)
			{
				$sql.=" and tagtype ='".$this->exevars['typeid']."'";
			}
			if($this->exevars['catpage']==0)
			{
				$sql.=" order by ".$this->exevars['order']." ".$this->exevars['desc']." limit 0,".$this->exevars['num'];
			}
			else
			{
				$this->template='block_taglist.html';
				$page=(int)$_REQUEST['page'];//��ҳ����
				$page=$page=='' | $page==0?1:$page;
				$newsql=str_replace('*','count(*)',$sql);
				$newrow=$query->getRow($query->execute($newsql));
				$newrow=$newrow['count(*)'];
				include_once(JIEQI_ROOT_PATH.'/lib/html/page.php');
				$jumppage = new JieqiPage($newrow,$this->exevars['num'],$page,10);
				$pages=$jumppage->whole_bar();
				$jieqiTpl->assign('pages',$pages);
				$sql.=" order by ".$this->exevars['order']." ".$this->exevars['desc']." limit ".($page-1)*$this->exevars['num'].",".$this->exevars['num'];
			}
			$row=$query->execute($sql);
			$tagarry=array();
			while ($v = $query->getRow())
			{
				$tagarry[]=$v;
			}
			$jieqiTpl->assign_by_ref('tagarry',$tagarry);
		}
		else//��ȡ��Ӧ����
		{
			$this->template='block_quizlist_more.html';
			$newsql="select tagcontent from ".jieqi_dbprefix('quiz_tag')." where tagname='".jieqi_dbslashes($_REQUEST['tagname'])."'";
			$row=$query->getRow($query->execute($newsql));
			$row=$row['tagcontent'];
			$sql="select * from  ".jieqi_dbprefix('quiz_problems')." where quizid in (".$row.")";
			if($this->exevars['catpage']==0)//����ҳ
			{
				$sql.=" order by ".$this->exevars['order']." ".$this->exevars['desc']." limit 0,".$this->exevars['num'];
			}
			else
			{
				$page=(int)$_REQUEST['page'];//��ҳ����
				$page=$page=='' | $page==0?1:$page;
				$newsql=str_replace('*','count(*)',$sql);
				$newrow=$query->getRow($query->execute($newsql));
				$newrow=$newrow['count(*)'];
				include_once(JIEQI_ROOT_PATH.'/lib/html/page.php');
				$jumppage = new JieqiPage($newrow,$this->exevars['num'],$page,10);
				$pages=$jumppage->whole_bar();
				$jieqiTpl->assign('pages',$pages);
				$sql.=" order by ".$this->exevars['order']." ".$this->exevars['desc']." limit ".($page-1)*$this->exevars['num'].",".$this->exevars['num'];
			}
			$row=$query->execute($sql);
			$quizarry=array();
			while ($v = $query->getRow())
			{
				$quizarry[]=$v;
			}
			$jieqiTpl->assign_by_ref('quizarry',$quizarry);
	
		}
	}
}
?>