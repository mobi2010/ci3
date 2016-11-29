<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
require('Admin_Controller.php');
/**
 * 分类
 */
class Category extends Admin_Controller {
	public $table = 'category';
	/**
	 * [index]
	 * @return [type] [description]
	 */
	public function index()
	{	
		$data['categoryType'] = $categoryType = (int)$_GET['type'];
		$data['name'] = $name = $_GET['name'] ? $_GET['name'] : null;
		$params['table'] = $this->table;

		$where[] = 'type='.$categoryType;
		if($name){
			$where[] = "name like '%".addslashes($name)."%'";
		}

		$params['where'] = implode(' and ',$where);
		$data['totalCount'] = $this->ci3Model->dataFetchCount($params);
		$data['dataModel'] = $this->ci3Model->dataFetchArray($params);
		$this->load->view('admin/category/list',$data);
	}

	/**
	 * 编辑
	 * @return [type] [description]
	 */
	public function edit(){
		$data['categoryType'] = $categoryType = (int)$_GET['type'];
		$id = (int)$_GET['id'];
		if($id){
			$params['table'] = $this->table;
			$params['where'] = $id;
			$data['dataModel'] = $this->ci3Model->dataFetchRow($params);
		}

		$this->load->view('admin/category/edit',$data);
	}

	/**
	 * 保存
	 * @return [type] [description]
	 */
	public function save(){
		$name = $_POST['name'] ? addslashes($_POST['name']) : "";
		if($name){
			$data['name'] = $name;
			$data['type'] = (int)$_POST['type'];
			$params['data'] = $data;
			$params['table'] = $this->table;
			$res = $this->ci3Model->dataInsert($params);
			$this->cResponse();
		}
		$this->cResponse(['code'=>'10000','message'=>'data error']);
	}

	/**
	 * 删除
	 * @return [type] [description]
	 */
	public function delete(){
		$id = (int)$_GET['id'];
		$params['table'] = $this->table;
		$params['id'] = $id;
		$res = $this->ci3Model->dataDelete($params);
		if($res){
			$this->cResponse();
		}else{
			$this->cResponse(['code'=>'10000','message'=>'data error']);
		}
	}
}	