<?php
$this->load->view('admin/header');
?>
<style type="text/css">
.menulist{border:#CCCCCC thin solid; padding:.5em; margin:.5em}
.menulist:hover{background: #E0E0E0}
</style>
<?php
	foreach ($menu as $key => $value) {
		$url = base_url($value['url']);
		echo '<div class="menulist"><a target="_blank" href="'.$url.'">'.$value['title'].'</a></div>';
	}

?>
<?php
$this->load->view('admin/footer');
?>