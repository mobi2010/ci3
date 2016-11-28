
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
<body>

<div class="admin-login"  style="width:340px; height:auto;margin: 120px auto 0;">
    <h1>Viu OTT CMS</h1>
    <form id="w0" action="index.php?r=login/index" method="post">
        <div class="form-group field-adminloginform-username required">
            <label class="control-label" for="adminloginform-username">Username:</label>
            <input type="text" id="adminloginform-username" value="" class="form-control" name="Login[username]">

            <div class="help-block"></div>
        </div>        
        <div class="form-group field-adminloginform-password required">
            <label class="control-label" for="adminloginform-password">Password:</label>
            <input type="password" id="adminloginform-password" class="form-control" name="Login[password]">

            <div class="help-block"></div>
        </div> 
        <form id="w0" action="/cms2/yii2/backend/web/index.php?r=login%2Findex" method="post">
<input type="hidden" name="_csrf" value="Z0FYM0Vlb0MeLW5GdFVeKBUvEWYTAAEqBCptaQFSPRk1CBl1aFQDBw==">       
        <div class="form-group field-login-verifycode required">
<label class="control-label" for="login-verifycode">Verify Code</label>
<div class="row"><div class="col-lg-4"><img id="login-verifycode-image" src="/cms2/yii2/backend/web/index.php?r=site%2Fcaptcha&amp;v=583c663f699aa" alt=""></div><div class="col-lg-6"><input type="text" id="login-verifycode" class="form-control" name="Login[verifyCode]"></div></div>

<div class="help-block"></div>
</div> 
        </form>   
        <div class="form-group">
            <button type="submit" class="btn btn-primary">Login</button>        
        </div>
    </form>
</div><!-- admin-login -->


<script src="/assets/test/js/jquery.js"></script>
<script src="/assets/test/js/yii.js"></script>
<script src="/assets/test/js/yii.validation.js"></script>
<script src="/assets/test/js/yii.activeForm.js"></script>
<script src="/assets/test/js/bootstrap.js"></script>
<script type="text/javascript">jQuery(document).ready(function () {
jQuery('#login-form').yiiActiveForm([{"id":"loginform-username","name":"username","container":".field-loginform-username","input":"#loginform-username","error":".help-block.help-block-error","validate":function (attribute, value, messages, deferred, $form) {yii.validation.required(value, messages, {"message":"Username cannot be blank."});}},{"id":"loginform-password","name":"password","container":".field-loginform-password","input":"#loginform-password","error":".help-block.help-block-error","validate":function (attribute, value, messages, deferred, $form) {yii.validation.required(value, messages, {"message":"Password cannot be blank."});}},{"id":"loginform-rememberme","name":"rememberMe","container":".field-loginform-rememberme","input":"#loginform-rememberme","error":".help-block.help-block-error","validate":function (attribute, value, messages, deferred, $form) {yii.validation.boolean(value, messages, {"trueValue":"1","falseValue":"0","message":"Remember Me must be either \"1\" or \"0\".","skipOnEmpty":1});}}], []);
});</script></body>
</html>
