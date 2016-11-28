<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">

    <title>登录</title>
    <meta name="keywords" content="">
    <meta name="description" content="">
    <link href="/assets/admin/css/bootstrap.min.css" rel="stylesheet">
    <link href="/assets/admin/css/font-awesome.css?v=4.4.0" rel="stylesheet">
    <link href="/assets/admin/css/animate.css" rel="stylesheet">
    <link href="/assets/admin/css/style.css" rel="stylesheet">
    <link href="/assets/admin/css/login.css" rel="stylesheet">
    <script src="/assets/js/jquery-1.10.2.min.js"></script>
    <script src="/assets/js/common.js"></script>
    <!--[if lt IE 9]>
    <meta http-equiv="refresh" content="0;ie.html" />
    <![endif]-->
    <script>
        if (window.top !== window.self) {
            window.top.location = window.location;
        }
    </script>

</head>

<body class="signin">
    <div class="signinpanel">
        <div class="row">
            <div class="col-sm-12">
                <h4 class="no-margins">登录：</h4>
                <p class="m-t-md">登录到H+后台主题UI框架</p>
                <input type="text" id="uname" class="form-control uname" placeholder="用户名" />
                <input type="password" id="upwd" class="form-control pword m-b" placeholder="密码" />
                <a href="">忘记密码了？</a>
                <button class="btn btn-success btn-block loginBtn">登录</button>
            </div>
        </div>
        <div class="signup-footer">
            <div class="pull-left">
                &copy; hAdmin
            </div>
        </div>
    </div>
</body>

</html>
<body>
<script type="text/javascript">
    $(document).ready(function() {
        var verify = function(){
            var uname = $('#uname').val();
            var upwd = $('#upwd').val();
            if(!uname){alert('Account not null');return;}
            if(!upwd){alert('Password not null');return;}

            $.post('<?=base_url("admin/login/checked");?>',{'uname':uname,'upwd':upwd},function(dt){
                if(dt['code'] == 0){
                    $.common.location('<?=base_url("admin/index");?>');
                }else{
                    alert(dt.message);
                }
            })
            
        }

        $('#upwd').focus(function(){
            $(document).unbind('keyup').bind('keyup',function(e){
                if(e.keyCode == 13){
                    verify();
                }            
            })
        }) 

        $('.loginBtn').click(function(){
            verify();
            return false;
        })
    })
</script>   
