<?php
/**
 * type(�Ƿ��޶����)(1,���޶�,caption����.����ȡ�����)
 */
class BlockQuizTypelist extends JieqiBlock
{
	var $blockvars=array();  //�������
	var $exevars=array('type'=>'0');//Ĭ������
	var $template='block_typelist.html';
	var $cachetime=JIEQI_CACHE_LIFETIME;

	function BlockQuizTypelist(&$vars)
	{
		global $jieqiModules;
		$this->JieqiBlock($vars);
		if(empty($this->blockvars['vars'])){die('error in block_typelist.php!');}
		$this->exevars['type'] = trim($this->blockvars['vars']);

		$this->blockvars['cacheid']=$this->exevars['type'];
		if(!empty($this->blockvars['template'])){
			$this->blockvars['template']=$this->template;
		}

		$this->blockvars['tlpfile'] = $jieqiModules['quiz']['path'].'/templates/blocks/'.$this->template;
	}

	function setContent($isreturn=false)
	{
		global $jieqiConfigs;
		if(!is_object($jieqiTpl)) $jieqiTpl =& JieqiTpl::getInstance();
		jieqi_getconfigs('quiz', 'sort');
		global $jieqiSort;
		$typelist = array();
		if($this->exevars['type']!=1)
		{
			foreach($jieqiSort['quiz'] as $value)
			{
				if($value['caption']==$this->exevars['type'])
				{
					$jieqiSort[]=$value;
					break;
				}
			}
		}
		$typelist=$jieqiSort['quiz'];
		$jieqiTpl->assign('typelist',$typelist);
	}
}