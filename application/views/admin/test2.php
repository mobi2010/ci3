
<!DOCTYPE html>
<html lang="en-US">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-param" content="_csrf">
    <meta name="csrf-token" content="YS5URjVaUlVQfnlrTww3DDADOTxiP2tnBHYYLHYwOgUjHGEqUyokZA==">
    <title>Login</title>
    <link href="/assets/test/css/bootstrap.css" rel="stylesheet">
<link href="/assets/test/css/site.css" rel="stylesheet"></head>
<body style="margin: 0px; padding-top: 51px;" scroll="no">
		<nav id="w0" class="navbar-inverse navbar-fixed-top navbar" role="navigation">
		<div class="container"><div class="navbar-header">
		<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#w0-collapse"><span class="sr-only">Toggle navigation</span>
<span class="icon-bar"></span>
<span class="icon-bar"></span>
<span class="icon-bar"></span></button><a class="navbar-brand" href="/backend/web/index.php">CMS</a></div><div id="w0-collapse" class="collapse navbar-collapse">
<ul id="w1" class="navbar-nav navbar-right nav">
<li class="active"><a href="/backend/web/index.php?r=admin%2Fhome">Home</a></li>
<li class="active"><a href="/backend/web/index.php?r=admin%2Fhome">Home</a></li>
<li class="active"><a href="/backend/web/index.php?r=admin%2Fhome">Home</a></li>
<li class=""><a href="/backend/web/index.php?r=admin%2Fhome">Home</a></li>
<li>
<form action="/backend/web/index.php?r=site%2Flogout" method="post">
<input type="hidden" name="_csrf" value="TkRjZG0xNE0ALDAiHBxcGCsuJTs9QAJ7FHMzETllBBorI1EjIVlWAw=="><button type="submit" class="btn btn-link">Logout (admin)</button>
</form>
</li>
</ul>
</div>
</div>
</nav>
	
	<table id="containerTable" class="table border" style="height: 95%; padding: 0px; margin: 0px;">
		<tr>
			<td class="leftMenu" style="vertical-align: top; pading: 0px; margin: 0px;width:160px;background: whiteSmoke;vertical-align: top;">
    			<div class="tbox">
	<div class="hd">
		<h3><a>Home</a></h3>
	</div>
	<div class="bd">
		<ul>
			<li><a href="/backend/web/index.php?r=home%2Flist" target="mainFrame">List</a></li>
		</ul>
	</div>
</div>
	    	</td>
			<td class="mainContent" style="vertical-align: top; padding: 0px; margin: 0px;">
				<iframe  id="mainFrame" name="mainFrame" width="100%" frameborder="0" scrolling="yes" 
					src="http://ci3.dev/admin/login/test3" onLoad="iFrameHeight()"></iframe>
<script type="text/javascript" language="javascript">
function iFrameHeight() 
{
	var contentHeight = document.body.scrollHeight-70;
	
//	console.log(contentHeight);
	
	var ifm= document.getElementById("mainFrame");
	ifm.height = contentHeight;
}
$(function(){
	$('.navbar-brand').css("marginLeft", "-80px");


	//平台、设备和操作系统  
    var system ={  
        win : false,  
        mac : false,  
        xll : false  
    };  
    //检测平台  
    var p = navigator.platform;    
      
    /**var sUserAgent = navigator.userAgent.toLowerCase(); 
    alert(sUserAgent);*/  
      
    system.win = p.indexOf("Win") == 0;  
    system.mac = p.indexOf("Mac") == 0;  
    system.x11 = (p == "X11") || (p.indexOf("Linux") == 0);  
    //跳转语句  
    if(system.win||system.mac||system.xll){//转向后台登陆页面  
         
    }else{  
        //修改手机样式
        $('nav').height(40);
        $('#w0-collapse').height(40); 
        $('#w0 .container .navbar-brand').remove();
        $('#w1 li').css({ "height":"40px;", "width":"8%", "overflow":"hidden" });
        $('#w1 li a').css({ "height":"10px;", "overflow":"hidden" });
    } 
});
</script> 
			</td>
		</tr>
	</table>
	
	<script src="/assets/test/js/jquery.js"></script>
<script src="/assets/test/js/yii.js"></script>
<script src="/assets/test/js/bootstrap.js"></script></body>
</html>
