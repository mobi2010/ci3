<?php
$this->load->view('admin/header');
?>
<form id="memberForm">
<?php
echo html_tags(array('checked'=>$tid,'name'=>'tid','class'=>'btn-grey-s','options'=>array('普通','系统'),'blank'=>'&nbsp;','href'=>mobi_query_url('admin/member/index',array('tid'))));

echo "<br/><br/>";

?>


<table width="100%" border="1">
    <tr>       
        <th></th> 
        <th>email</th>
        <th>mobile</th>
        <th>source</th>
        <th>names</th>
        <th>city_id</th>
        <th>addtime</th>
        <th>logintime</th>
        <th>step</th>
        <th>org_name</th>
        <th>long2ip</th>
        <th>tel</th>
        <th>qq</th>
        <th>weixin</th>
        <th>weibo</th>
        <th>status</th>
    </tr>
    <?php
        if(!empty($dataList)){
            foreach ($dataList as $key => $value) {
                $ip = long2ip($value['long2ip']);
                $status = html_text(array('size'=>6,'value'=>$value['status'],'name'=>"status[{$value['id']}]"));
                echo <<<ETO
                <tr>
                    <td><input type="checkbox" id="ckbOption[]" value="{$value['id']}" name="ckbOption[]" /></td>
                    <td>{$value['email']}</td>
                    <td>{$value['mobile']}</td>
                    <td>{$value['source']}</td>
                    <td>{$value['names']}</td>
                    <td>{$value['city_id']}</td>
                    <td>{$value['addtime']}</td>
                    <td>{$value['logintime']}</td>
                    <td>{$value['step']}</td>
                    <td>{$value['org_name']}</td>
                    <td>{$ip}</td>
                    <td>{$value['tel']}</td>
                    <td>{$value['qq']}</td>
                    <td>{$value['weixin']}</td>
                    <td>{$value['weibo']}</td>
                    <td>{$status}</td>
                </tr>
ETO;
            }
        }

    ?>
    <tr>        
        <td><input type="checkbox" id="ckbAll" class="ckbAll" /></td>
        <td><?=html_button(array('value'=>'删除','name'=>'deleteBtn'));?> <?=html_button(array('value'=>'修改','name'=>'updateBtn'));?></td>
        <td colspan="14" style="text-align:right "><?=$pageView;?> </td>
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
                $.post("<?=base_url('admin/member/delete');?>",$('#memberForm').serialize(),function(dt){
                    $.mobi.alert(dt);
                    $.mobi.refresh();
                })                
                return false;
            }
            if(id == 'updateBtn'){
                $.post("<?=base_url('admin/member/update');?>",$('#memberForm').serialize(),function(dt){
                    $.mobi.alert(dt);
                    $.mobi.refresh();
                })                
                return false;
            }
    })

  })
</script> 