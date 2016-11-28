<?php 
    $this->load->view('admin/header');
?>
<body class="fixed-sidebar full-height-layout gray-bg" style="overflow:hidden">
    <div id="wrapper">
        <?php 
        echo $menuView;
        ?>
        <!--右侧部分开始-->
        <div id="page-wrapper" class="gray-bg dashbard-1">
            <div class="row border-bottom">
                <nav class="navbar navbar-static-top" role="navigation" style="margin-bottom: 0">
                    
                    <ul class="nav navbar-top-links navbar-right">
                        <li class="dropdown">
                            <a href="<?=base_url('admin/login/logout')?>">
                            登出
                            </a>
                        </li>
                    </ul>
                </nav>
            </div>
            <div class="row J_mainContent" id="content-main">
                <iframe id="J_iframe" width="100%" height="100%" src="<?=base_url('admin/index/welcome')?>" frameborder="0"  seamless></iframe>
            </div>
        </div>
<!--右侧部分结束-->
</div>      
</body>  
<?php 
    $this->load->view('admin/footer');
?>