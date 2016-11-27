<style type="text/css">

.home-body-box dt{padding:10px;font-size: 24px;font-weight: bold;border-bottom:#ccc 1px solid;}
.home-body-box dd{padding:10px;color: #666666}
.home-body-box dd a{color: #666666}
.home-body-box dd a:hover{color: #FE7203;text-decoration:underline;}
</style>
<div class="home-nav">
	<dl>
		<?php
		$menuData = array('property'=>'房产','car'=>'车辆','market'=>'集市','services'=>'服务');
		foreach ($menuData as $key => $value) {
			echo html_dd(array('body'=>$value,'data-url'=>base_url($key.'/channel')));
		}
		?>
	</dl>	
</div>
<div class="home-body">	
	<?php
		$propertyMode = $initData['dataProperty']['mode'];
		$menuData = array('property'=>'房产','car'=>'车辆','market'=>'集市','services'=>'服务');
		foreach ($menuData as $key => $value) {
			$title = html_a(array('text'=>$value,'href'=>base_url($key.'/channel')));
			$listData  = $key.'Data';
			$listDd = "";
			foreach ($$listData as $key => $value) {
				$listDd .= html_dd(array('body'=>'['.html_a(array('style'=>'font-weight:bold','text'=>$value['typeName'],'href'=>$value['typeUrl'])).']'.html_a(array('target'=>'_blank','text'=>$value['title'],'href'=>$value['url']))));
			}
			
			echo <<<ETO
			<div class="home-body-box">
				<dl>
					<dt>{$title}</dt>
					{$listDd}
				</dl>
			</div>	
ETO;
		}
	?>	
</div>


<script type="text/javascript">
    $(document).ready(function() {  
        $('.home-nav dd').click(function(){
        	$.mobi.location($(this).attr('data-url'));
            return false;
        })
    })
</script>