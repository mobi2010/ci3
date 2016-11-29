<?php 
$this->load->view('admin/header');
?>

<div class="breadcrumbContainer">
    <ul class="breadcrumb"><li class="active">添加分类</li></ul>       
</div>

<table class="table table-striped table-bordered" style="width: 100%;" id="tag_table">
    <tr >
        <td><label>标题:</label></td>
        <td>
        <?=html_text(['name'=>'title','value'=>$dataModel['title']]);?>
        </td>
    </tr>
    <tr >
        <td><label>描述:</label></td>
        <td>
        <?=html_text(['name'=>'content','value'=>$dataModel['content']]);?>
        </td>
    </tr>
    <tr >
        <td><label>分类:</label></td>
        <td>
        <?=html_select(['name'=>'category_id','selected'=>$dataModel['category_id'],'options'=>$categoryData]);?>
        </td>
    </tr>
    <tr >
        <td><label>视频地址:</label></td>
        <td>
        <?=html_text(['name'=>'url','value'=>$dataModel['url']]);?>
        </td>
    </tr>
    <tr>
        <td align="center" colspan="2">
            <?php 
                echo html_button(['class'=>'btn btn-default backBtn','value'=>'返回']);
                echo str_repeat("&nbsp",4);
                echo html_button(['id'=>'saveBtn','class'=>'btn btn-primary','value'=>'保存']);
            ?>
        </td>
    </tr> 
</table>

<?php    
$this->load->view('admin/footer');
?>    
<script type="text/javascript">
$(document).ready(function(){
    $('#saveBtn').click(function(){
        var name = $('#name').val();
        if(!name){
            $.common.alert({'message':'名称不能为空'});
            return false;
        }
        var type = "<?=$categoryType?>";
        $.post("<?=base_url('admin/category/save');?>",{'name':name,'type':type},function(dt){
            $.common.alert(dt);
            $.common.location("<?=ci3_url('admin/category/index',['type'=>$categoryType])?>");
        })
        return false;       
    })
}) 
</script>    