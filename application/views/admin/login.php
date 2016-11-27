<?php
$this->load->view('admin/header');
?>
Account:<input type="text" name="uname" id="uname" />
Password:<input type="password" name="upwd" id="upwd" />
<input type="button" name="button" id="login" value="提交" />
<?php
$this->load->view('admin/footer');
?>
<script type="text/javascript">
	$(document).ready(function() {
		var verify = function(){
			var uname = $('#uname').val();
			var upwd = $('#upwd').val();
			if(!uname){alert('Account not null');return;}
			if(!upwd){alert('Password not null');return;}

			$.post('<?=base_url("admin/login/checked");?>',{'uname':uname,'upwd':upwd},function(dt){
				if(dt['code'] == 200){
					$.mobi.location('<?=base_url("admin/index");?>');
				}else{
					alert(dt.msg);
				}
			})
			
		}

		$('#upwd').focus(function(){
	        $(document).bind('keyup',function(e){
	            if(e.keyCode == 13){
	                verify();
	            }            
	        })
	    }) 

		$('#login').click(function(){
			verify();
			return false;
		})
	})
</script>	