
<!DOCTYPE html>
<html lang="zh-HK">
<head>
<meta charset="UTF-8" />
<title>默认关键词列表</title>
<link href="/assets/admin/css/bootstrap.css" rel="stylesheet">
<link href="/assets/admin/css/site.css" rel="stylesheet">
<script src="/assets/admin/js/jquery.js"></script>
<script src="/assets/admin/js/yii.js"></script>
<body>
    
    <div class="container" style="padding: 8px; padding-bottom: 40px;width: 95%">
        <div class="breadcrumbContainer">
            <ul class="breadcrumb"><li class="active">默认关键词列表</li>
</ul>       </div>
        
         
<table class="table table-bordered table-hover">
    <tr>
        <th>
            <label class="control-label">关键词：</label>
        </th> 
        <td>
            <input type="text" id="keyword" class="form-control" name="keyword" value="">        </td>
        <th>
            <label class="control-label">状态：</label>
        </th>
        <td>
            <select id="is_deleted" class="form-control" name="is_deleted">
<option value="0" selected>可用</option>
<option value="1">不可用</option>
</select>        </td>
    </tr>
    <!-- 区域与语言 - BOF -->
        <tr>
        <th>
            <label class="control-label">地区</label>
        </th>
        <td>
            <select id="area_id" class="areaDropDownList form-control" name="area_id">
                                                            <option value="1"  selected  >Hong Kong</option>
                                            <option value="2"  >Singapore</option>
                                            <option value="3"  >VuClip</option>
                                            <option value="4"  >Thailand</option>
                                            <option value="5"  >Philippines</option>
                                                </select>
        </td>
        <th>
            <label class="control-label">语种</label>
        </th>
        <td>
            <select id="language_flag_id" class="languageDropDownList form-control" name="language_flag_id">
                                                                                                                        <option value="1"   selected >繁體中文</option>
                                                                                                                                                                                                                                                                                    </select>
        </td>
    </tr>
    <!-- 区域与语言 - EOF -->
<script>
    $(function(){

        $('#area_id').change(function(){
            var areaLang = [{"area_id":"1","name":"Hong Kong","country_id":"1819730","belong_area_id":"0","language_flag":[{"area_language_relation_id":"2","area_id":"1","language_flag_id":"1","is_default":"1","label":"\u7e41\u9ad4\u4e2d\u6587","mark":"zh_hk"}]},{"area_id":"2","name":"Singapore","country_id":"1880251","belong_area_id":"0","language_flag":[{"area_language_relation_id":"3","area_id":"2","language_flag_id":"2","is_default":"0","label":"\u7b80\u4f53\u4e2d\u6587","mark":"zh_cn"},{"area_language_relation_id":"4","area_id":"2","language_flag_id":"3","is_default":"1","label":"English","mark":"en"}]},{"area_id":"3","name":"VuClip","country_id":"9999999","belong_area_id":"0","language_flag":[{"area_language_relation_id":"7","area_id":"3","language_flag_id":"2","is_default":"0","label":"\u7b80\u4f53\u4e2d\u6587","mark":"zh_cn"},{"area_language_relation_id":"6","area_id":"3","language_flag_id":"3","is_default":"1","label":"English","mark":"en"}]},{"area_id":"4","name":"Thailand","country_id":"9898989","belong_area_id":"0","language_flag":[{"area_language_relation_id":"9","area_id":"4","language_flag_id":"4","is_default":"1","label":"Thai","mark":"th"}]},{"area_id":"5","name":"Philippines","country_id":"1694008","belong_area_id":"0","language_flag":[{"area_language_relation_id":"10","area_id":"5","language_flag_id":"3","is_default":"1","label":"English","mark":"en"}]}];
            var selectedid = $(this).val();
            var htm = '';
            $.cookie('area_id', selectedid, { expires: 2 });
            $.each(areaLang, function(i, val){
                if (val.area_id == selectedid) {
                    $.each(val.language_flag, function(k, value){
                        htm += '<option value='+value.language_flag_id+' >'+value.label+'</option>';
                    });
                }
            });

            $('#language_flag_id').html(htm);
        });
    });
</script>    
    <tr>
        <th colspan="4" class="text-center"><button type="button" id="search" class="btn btn-default">查询</button>            <button type="button" class="edit btn btn-success" data-url="/cms2/yii2/backend/web/index.php?r=default-keyword%2Fview">创建</button>
        </th>
    </tr>
</table>
<table class="table table-striped table-bordered">
    <tr>
        <th>ID</th>
        <th>默认关键字</th>
        <th>是否伪删除</th>
        <th>地区ID</th>
        <th>操作</th>
    </tr>
    <tr data-key="1"><td>1</td><td>朴寶劍</td><td>有效</td><td>1</td><td><a class="edit btn btn-primary btn-xs" href="javascript:" data-url="/cms2/yii2/backend/web/index.php?r=default-keyword%2Fview&amp;search_setting_default_keyword_id=1">修改</a>&nbsp&nbsp<a class="btn btn-danger btn-xs" href="/cms2/yii2/backend/web/index.php?r=default-keyword%2Fdelete&amp;search_setting_default_keyword_id=1&amp;is_del=1" data-confirm="注意!您正在进行删除操作!">删除</a></td></tr> 
</table>
<?php
    $pageData['totalCount'] = 1000;
    $pageData['pageSize'] = 20;
    $pageData['showPageSize'] = 10;
    $pageData['page'] = $_GET['page'];
    $this->load->view('admin/page',$pageData);
?>
 
    

</body>
</html>