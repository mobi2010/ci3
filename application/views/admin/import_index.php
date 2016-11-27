<?php
$this->load->view('admin/header');
$dataProperty = $initData['dataProperty']; 
?>
<form id="importForm">
<?php

echo html_tags(array('checked'=>$source,'name'=>'sid','sval'=>'name','class'=>'btn-grey-s','options'=>$sourceData,'blank'=>'<br/><br/>'));

echo "<br/>";

echo html_a(array('text'=>'导入','id'=>'ido','class'=>'btn-blue'));


echo '<br/><br/><br/>';

foreach ($otherData as $key => $value) {
	echo html_a(array('text'=>$value['title'],'href'=>base_url($value['url']),'target'=>"_blank"));
	echo "&nbsp;";
}

?>

</form>
<?php
$this->load->view('admin/footer');
?>
<script type="text/javascript">
  $(document).ready(function() {
        $('#ido').click(function(){
			var sid = $('#sid').val();
			$('#sid_'+sid).loading();
			$.post('<?=base_url("admin/import/ido")?>',{'sid':sid},function(){
				$('#sid_'+sid+' img').remove();
				return false;
			})
			return false;
        })
    
  })
</script> 