<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
require('Admin_Controller.php');
/**
 * 会员.
 */
class Member extends Admin_Controller {
	/**
	 * [index]
	 * @return [type] [description]
	 */
	public function index()
	{	

		$data['tid'] = $tid = $_GET['tid'] == 1 ? 1 : 0;
		$table = $tid == 1 ?  'pinery_member_system' : 'pinery_member';
		$page = intval($_GET['p']) > 0 ? intval($_GET['p']) : 1;
		$size = 30;
		$start = ($page-1)*$size;
		$data['names'] = $names = mobi_string_filter($_GET['names']);
		$params['table'] = $table;
		if($names){
			$params['where'] = "names like BINARY '%{$names}%'";
		}
		$total = $this->member->dataFetchCount($params);
		if($total){
			$params['limit'] = "{$start},{$size}";
			$params['order'] = "id desc";
			$data['dataList'] = $this->member->dataFetchArray($params);
			$data['pageView'] = $this->load->view('pinery/public/member_page',array('total'=>$total,'pageSize'=>$size),true);
		}
		$this->load->view('admin/member_index',$data);
	}
	/**
	 * [delete description]
	 * @return [type] [description]
	 */
	function delete(){
		if(!empty($_POST['ckbOption'])){
			$params['table'] = "pinery_member";
			$params['where'] = "id in (".implode(",", $_POST['ckbOption']).")";
			$this->member->dataDelete($params);
			$this->printer();
		}
	}
	/**
	 * [update description]
	 * @return [type] [description]
	 */
	function update(){
		if(!empty($_POST['ckbOption'])){
			$params['table'] = "pinery_member";
			foreach ($_POST['ckbOption'] as $key => $value) {
				$params['data'] = array("status"=>$_POST['status'][$value]);
				$params['where'] = $value;
				$this->member->dataUpdate($params);
			}
			$this->printer();
		}
	}
}		