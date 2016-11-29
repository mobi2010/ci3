<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
require('Admin_Controller.php');
/**
 * 视频
 */
class Video extends Admin_Controller {
	function __construct($params = array())
	{
		parent::__construct();
		$this->load->model('Category_model', 'categoryModel');//服务
	}
	/**
	 * [index]
	 * @return [type] [description]
	 */
	public function index()
	{	
		$data['categoryData'] = $this->categoryModel->getList(['where'=>'type=1','skey'=>'id','sval'=>'name']);
		$this->load->view('admin/video/list',$data);
	}
	/**
	 * [add description]
	 * @return [type] [description]
	 */
	public function edit(){
		$data['categoryData'] = $this->categoryModel->getList(['where'=>'type=1','skey'=>'id','sval'=>'name']);
		$this->load->view('admin/video/edit',$data);
	}
}	