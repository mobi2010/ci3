<?php
$this->load->view('admin/header');

$dataMarket = $initData['dataMarket'];
?>
<script type="text/javascript" charset="utf-8" src="/style/plugins/ueditor/ueditor.config.js"></script>
<script type="text/javascript" charset="utf-8" src="/style/plugins/ueditor/ueditor.all.min.js"></script>

<div class="member-body">
    <div class="member-content">
    <form id="marketForm">
        <?php
            $this->load->view('admin/publish_member');
        ?>
        <table id="propertyTable" width="810" border="0" >
            <tr id='type_tr'>
                <td class="left"><span style="color: red">*</span>类型：</td>
                <td >
                    <?=html_select(array('name'=>'type','options'=>$dataMarket["type"],'sval'=>'name'));?>
                </td>
            </tr>       
            <tr id='price_tr'>
                <td class="left"><span style="color: red">*</span>售价：</td>
                <td><?=html_text(array('name'=>'price','value'=>'','class'=>'wp50'))?>&nbsp;元,0表示面议</td>
            </tr>              
            <tr id='title_tr'>
                <td class="left"><span style="color: red">*</span>标题：</td>
                <td><?=html_text(array('name'=>'title','value'=>'','class'=>'wp400'))?></td>
            </tr>
            <tr id='content_tr'>
                <td class="left">描述：</td>
                <td><script id="editor" type="text/plain" style="width:750px;height:300px;"></script></td>
            </tr>            
            <tr>
                <td class="left"></td>
                <td ><?=html_a(array('class'=>'btn-blue','id'=>'sureBtn','text'=>'保存'))?></td>
            </tr>
        </table>
        </form>
    </div>
</div>
<?php
$this->load->view('admin/footer');
?>
<script type="text/javascript">
    $(document).ready(function() {  
        var ue = UE.getEditor('editor');
        var dialog = {'code':400};
        var dialogSet = {'z-index':1000};
        var postData = {};
        $('#sureBtn').click(function(){
            var title = $('#title').val();           
            var price = $('#price').val();
            if(!$.mobi.isint($('#price').val(),'',-1)){   
                dialog['msg'] = '价格为必填项且为整数';             
                $.mobi.alert(dialog,dialogSet);
                return false;
            }
            if(!title){
                dialog['msg'] = '标题为必填项';
                $.mobi.alert(dialog,dialogSet);
                return false;
            }
            postData['type'] = $('#type').val();
            postData['title'] = title;            
            postData['price'] = price;
            postData['content'] = UE.getEditor('editor').getContent();
            $.post("<?=base_url('admin/import/marketSave')?>",$('#marketForm').serialize(),function(dt){                
                $.mobi.alert(dt,dialogSet);
                setTimeout(function(){
                    // UE.getEditor('editor').setContent('');
                    // $('#marketForm :text,#marketForm textarea').val('');
                },1000);
            })
            return false;
        })
            
    })
</script>