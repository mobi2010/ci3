<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
require('Article_Controller.php');


class Index extends Article_Controller {		
	function __construct($params = array())
	{
		parent::__construct(array('auth'=>false));		
		$this->load->model('Category_model', 'categoryModel');//服务
	}
	public function index()
	{	
		$data['categoryData'] = ["所有类别"]+$this->categoryModel->getData(3);
		$data['cid'] = $cid = (int)$_GET['cid']; 
		$data['sort'] = $sort = (int)$_GET['sort']; 

		$where = [];
		if($cid){
			$where[] = "category_id={$cid}";
		}
		$where = empty($where) ? null : implode(' and ',$where);
		$params['where'] = $where;
		$params['order'] = $sort == 1 ? "views desc" : "update_time desc";

		$getList = $this->articleModel->getList($params);
		$data += $getList;

		$this->load->view('/article/index',$data);
	}	
	
}