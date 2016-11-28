<!--左侧导航开始-->
<nav class="navbar-default navbar-static-side" role="navigation">
    <div class="nav-close"><i class="fa fa-times-circle"></i>
    </div>
    <div class="sidebar-collapse">
        <ul class="nav" id="side-menu">
            <li class="nav-header">
                <div class="dropdown profile-element">
                    <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                        <span class="clear">
                            <span class="block m-t-xs" style="font-size:20px;">
                                <i class="fa fa-area-chart"></i>
                                <strong class="font-bold">cAdmin</strong>
                            </span>
                        </span>
                    </a>
                </div>
                <div class="logo-element">cAdmin</div>
            </li>
            <li class="line dk"></li>
            <?php 
            foreach ($menuData as $key => $value) {
                echo '<li><a href="javascript:;"><i class="fa fa-table"></i><span class="nav-label">'.$value['title'].'</span><span class="fa arrow"></span></a><ul class="nav nav-second-level">';    
                if(!empty($value['sub'])){
                    foreach ($value['sub'] as $key2 => $value2) {
                        if(!empty($value2['sub'])){
                            echo '<li><a href="javascript:;">'.$value2['title'].'<span class="fa arrow"></span></a><ul class="nav nav-third-level">';
                            foreach ($value2['sub'] as $key3 => $value3) {
                                echo '<li><a class="J_menuItem" href="'.base_url($value3['uri']).'">'.$value3['title'].'</a></li>';
                            }
                            echo '</ul></li>';
                        }else{
                            echo '<li><a class="J_menuItem" href="'.base_url($value2['uri']).'">'.$value2['title'].'</a>';
                        }
                    }
                }
            echo '</ul></li>';
            }
            ?>
        </ul>
    </div>
</nav>
<!--左侧导航结束-->