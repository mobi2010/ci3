<div>
	<?php
		$dataCity = $initData['dataCity']; 

		echo html_tags(array('checked'=>1,'name'=>'cid','sval'=>'name','class'=>'btn-grey-s','options'=>$dataCity,'blank'=>'&nbsp;'))."<br/><br/>";
	?>	
	手机：<?=html_text(array('name'=>'mobile'))?>  
	姓名：<?=html_text(array('name'=>'names'))?>  
	机构：<?=html_text(array('name'=>'org_name'))?>  
	头像：<?=html_text(array('name'=>'avatar'))?>  
	<br/><br/>
</div>