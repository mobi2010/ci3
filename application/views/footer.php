<?php
	if($footerInfo != "no"):
?>
<div class="home-bottombar">
	<div class="box">
		<dl>
			<dt>友情链接</dt>			
			<dd><a href="http://www.zhihu.com/" target="_blank">知乎</a></dd>
			<dd><a href="http://www.doyouhike.net/" target="_blank">磨房</a></dd>
			<dd><a href="http://www.qyer.com/" target="_blank">穷游</a></dd>
			<dd><a href="http://www.huxiu.com/" target="_blank">虎嗅网</a></dd>
			<dd><a href="http://www.36kr.com/" target="_blank">36氪</a></dd>
		</dl>
		<dl>
			<dt>网站导航</dt>
			<?php
				$fnavs = array('房产','车辆','二手物品','服务');				
				foreach ($initData['dataCity'] as $key => $value) {
					$mrk = mt_rand(0,3);
					echo '<dd>'.html_a(array('href'=>mobi_url('/',array('cityid'=>$key)),'target'=>'_blank','text'=>$value['name'].$fnavs[$mrk])).'</dd>';
				}
			?>
		</dl>
		<dl>
			<dt>关于我们</dt>
			<dd><?=html_a(array('text'=>'公司简介'));?></dd>
			<dd><?=html_a(array('text'=>'联系我们'));?></dd>
			<dd><?=html_a(array('text'=>'加入我们'));?></dd>
			<dd><?=html_a(array('text'=>'服务条款'));?></dd>
		</dl>
		<dl>
			<dt>关注我们</dt>
			<dd><img src="/style/img/qrcode.png" /></dd>
		</dl>

	</div>

	<!-- 邮箱：<a href="mailto:zsc@2010.mobi" target="_blank" rel="nofollow">zsc@2010.mobi</a> -->
</div>			
<?php
	endif;
?>


<?php

$onlineData = array(
	array(
		'title'=>'管理员',
		'children'=>array(
				array('qq'=>'420012223','tel'=>13141083366)
			)
	)
);
?>

<div class="online">
	<?php
	foreach ($onlineData as $key => $value) {
		$dt = html_dt(array('body'=>$value['title']));
		$dd = "";
		foreach ($value['children'] as $ck => $cv) {
			$dd .= html_dd(array('body'=>html_qq($cv['qq'])));
		}
		echo html_dl(array('body'=>$dt.$dd));
	}

	?>
</div>




</body>
</html>
<?php
//分享
if($uriEntity['class'] == 'detail'):
?>
<!-- Baidu share Start -->
<script>window._bd_share_config={"common":{"bdSnsKey":{},"bdText":"","bdMini":"2","bdMiniList":["qzone","weixin","tsina","tqq","renren","kaixin001","douban","mshare","tsohu","t163","tieba","hi"],"bdPic":"","bdStyle":"0","bdSize":"16"},"slide":{"type":"slide","bdImg":"0","bdPos":"right","bdTop":"120"},"image":{"viewList":["qzone","tsina","renren","kaixin001","weixin"],"viewText":"分享到：","viewSize":"16"},"selectShare":{"bdContainerClass":null,"bdSelectMiniList":["qzone","tsina","renren","kaixin001","weixin"]}};with(document)0[(getElementsByTagName('head')[0]||body).appendChild(createElement('script')).src='http://bdimg.share.baidu.com/static/api/js/share.js?v=89860593.js?cdnversion='+~(-new Date()/36e5)];</script>
<!-- Baidu share END -->
<?php
endif;
?>
<!-- 百度统计 Start-->
<script type="text/javascript">
var _bdhmProtocol = (("https:" == document.location.protocol) ? " https://" : " http://");
document.write(unescape("%3Cscript src='" + _bdhmProtocol + "hm.baidu.com/h.js%3F5972a5f9c4b41154fb59652a42a3ca25' type='text/javascript'%3E%3C/script%3E"));
</script>
<!-- 百度统计 END -->

<script type="text/javascript">
	$(document).ready(function() {
        setTimeout(function(){ 
        	var bdimg = $('img[src="http://eiv.baidu.com/hmt/icon/21.gif"]');           
        	bdimg.remove();   
        }, 50); 
	})
</script> 