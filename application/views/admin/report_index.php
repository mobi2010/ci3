<?php
$this->load->view('admin/header');
?>
<form id="reportForm">
<table width="100%" border="1">
    <tr>       
        <th></th> 
        <th>id</th>
        <th>info_type</th>
        <th>info_id</th>
        <th>userid</th>
        <th>add_time</th>
        <th>content</th>
        <th>status</th>
        <th>operation</th>
    </tr>
    <?php
        if(!empty($dataList)){
            foreach ($dataList as $key => $value) {
                $status = html_text(array('size'=>6,'value'=>$value['status'],'name'=>"status[{$value['id']}]"));
                $addtime = date('Y-m-d H:i:s',$value['add_time']);
                $view = html_a(array('href'=>mobi_url($value['info_type'].'/detail',array('id'=>$value['info_id'])),'text'=>'view','target'=>'_blank'));
                echo <<<ETO
                <tr>
                    <td><input type="checkbox" id="ckbOption[]" value="{$value['id']}" name="ckbOption[]" /></td>
                    <td>{$value['id']}</td>
                    <td>{$value['info_type']}</td>
                    <td>{$value['info_id']}</td>
                    <td>{$value['userid']}</td>
                    <td>{$addtime}</td>
                    <td>{$value['content']}</td>
                    <td>{$status}</td>
                    <td>{$view}</td>
                </tr>
ETO;
            }
        }

    ?>
    <tr>        
        <td><input type="checkbox" id="ckbAll" class="ckbAll" /></td>
        <td><?=html_button(array('value'=>'删除','name'=>'deleteBtn'));?> <?=html_button(array('value'=>'修改','name'=>'updateBtn'));?></td>
        <td colspan="7" style="text-align:right "><?=$pageView;?> </td>
    </tr>
</table>
</form>
<?php
$this->load->view('admin/footer');
?>
<script type="text/javascript">
  $(document).ready(function() {
    $('.ckbAll').click(function(){
        $("input[name='ckbOption[]']").prop("checked",$(this).prop('checked'));
    })
    $("input[name='ckbOption[]']").click(function(){
        $('.ckbAll').prop("checked",false);
    }) 
     $('#deleteBtn,#updateBtn').click(function(){
            var dialog = {'code':400};
            if($("input[name='ckbOption[]']:checked").length == 0){
                dialog['msg'] = '请选择信息';
                $.mobi.alert(dialog);
                return false;
            }
            var id = $(this).attr('id');
            if(id == 'deleteBtn' && confirm("确定删除?")){
                $.post("<?=base_url('admin/report/delete');?>",$('#reportForm').serialize(),function(dt){
                    $.mobi.alert(dt);
                    $.mobi.refresh();
                })                
                return false;
            }
            if(id == 'updateBtn'){
                $.post("<?=base_url('admin/report/update');?>",$('#reportForm').serialize(),function(dt){
                    $.mobi.alert(dt);
                    $.mobi.refresh();
                })                
                return false;
            }
    })

  })
</script> 