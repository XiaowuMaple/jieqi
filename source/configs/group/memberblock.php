<?php
/*
$jieqiBlocks[1]=array('bid'=>2, 'blockname'=>'�û�״̬', 'module'=>'system', 'filename'=>'block_userstatus', 'classname'=>'BlockSystemUserstatus', 'side'=>0, 'title'=>'�û�״̬', 'vars'=>'', 'template'=>'', 'contenttype'=>4, 'custom'=>0, 'publish'=>2, 'hasvars'=>0);
*/

  $jieqiBlocks[0]=array(
	'bid'=>1,
	'blockname'=>'group',
        'module'=>'group',
	'filename'=>'block_groupnav',
	'classname'=>'BlockGroupNav',
	'side'=>JIEQI_SIDEBLOCK_LEFT,
	'title'=>'Ȧ�ӵ���',
	'contenttype'=>JIEQI_CONTENT_TXT, 
	'showtype'=>15,
	'custom'=>0,
	'publish'=>3
);

 $jieqiBlocks[1]=array(
	'bid'=>2,
	'blockname'=>'group',
    'module'=>'group',
	'filename'=>'block_groupinfo',
	'classname'=>'BlockGroupInfo',
	'side'=>JIEQI_SIDEBLOCK_LEFT,
	'title'=>'',
	'contenttype'=>JIEQI_CONTENT_TXT, 
	'showtype'=>15,
	'custom'=>0,
	'publish'=>3
);



$jieqiBlocks[2]=array('bid'=>3, 'blockname'=>'�û�״̬', 'module'=>'system', 'filename'=>'block_userstatus', 'classname'=>'BlockSystemUserstatus', 'side'=>0, 'title'=>'�û�״̬', 'vars'=>'', 'template'=>'', 'contenttype'=>4, 'custom'=>0, 'publish'=>2, 'hasvars'=>0);
if(JIEQI_USE_BADGE){
  $jieqiBlocks[3]=array(
	'bid'=>4,
	'blockname'=>'group',
        'module'=>'group',
	'filename'=>'block_groupbadge',
	'classname'=>'BlockGroupBadge',
	'side'=>JIEQI_SIDEBLOCK_LEFT,
	'title'=>'Ȧ�ӻ���',
	'contenttype'=>JIEQI_CONTENT_TXT, 
	'showtype'=>15,
	'custom'=>0,
	'publish'=>3
);

}
?>
