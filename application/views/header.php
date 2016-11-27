<?php
$pineryTitle = $pineryTitle ? $pineryTitle : $initData['pineryTitle'];//标题
$pineryKeywords = $pineryKeywords ? $pineryKeywords : $pineryTitle;//关键字
$pineryDescription = $pineryDescription ? $pineryDescription : $initData['pineryDescription'];//描述
$bodyClass = $bodyClass ? $bodyClass : "body";

?>
<!DOCTYPE html>
<html>
<head>
    <title><?=$pineryTitle?>-菠萝园</title>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta name="Keywords" content="<?=$pineryKeywords;?>,菠萝园" />
	<meta name="Description" content="<?=$pineryDescription;?>菠萝园最好的分类信息网。" />
	<link href="/style/img/favicon.ico" rel="shortcut icon" type="image/x-icon">
    <link href="/style/css/main.css" rel="stylesheet" type="text/css"/>
	<script src="/style/js/jquery-1.10.2.min.js"></script>
	<script src="/style/js/mobi.js"></script>	

</head>

<img src="http://ci3.dev//application/style/close.png" />

<script type="text/javascript">
	$(document).ready(function() { 
		$.mobi.init();
	})
</script>
<body class="<?=$bodyClass;?>">
