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
		$this->load->model('Video_model', 'videoModel');//服务
	}
	/**
	 * [index]
	 * @return [type] [description]
	 */
	public function index()
	{	
		$data['categoryData'] = $this->categoryModel->getData(1);
		$data['title'] = $title = $_GET['title'] ? $_GET['title'] : null;
		$where = [];
		if($title){
			$where[] = "title like '%".addslashes($title)."%'";
		}
		$where = empty($where) ? null : implode(' and ',$where);
		$params['where'] = $where;
		$getList = $this->videoModel->getList($params);
		$data += $getList;
		$this->load->view('admin/video/list',$data);
	}
	/**
	 * [add description]
	 * @return [type] [description]
	 */
	public function edit(){
		$data['categoryData'] = $this->categoryModel->getData(1);
		$data['dataModel'] = $this->videoModel->getRow($_GET['id']);
		$this->load->view('admin/video/edit',$data);
	}

	/**
	 * [save description]
	 * @return [type] [description]
	 */
	public function save(){
		if($_FILES['Filedata']['tmp_name']){
			$uploadImg = $this->image->upload();
			$thumbImg = $this->image->thumb(array('file'=>$uploadImg['filePath'],'width'=>272,'height'=>159,'bgcolor'=>'white'));
			$image_url = $thumbImg['filePath'];
		}else{
			$image_url = $_POST['image_url'];
		}

		$data['id'] = (int)$_POST['id'];
		$data['title'] = ci3_string_filter($_POST['title']);
		$data['abstract'] = ci3_string_filter($_POST['abstract']);
		$data['image_url'] = addslashes($image_url);
		$data['video_url'] = ci3_string_filter($_POST['video_url']);
		$data['category_id'] = intval($_POST['category_id']);
		$res = $this->videoModel->save($data);
		redirect('admin/video');
	}
	/**
	 * 删除
	 * @return [type] [description]
	 */
	public function delete(){
		$id = (int)$_POST['id'];
		$res = $this->videoModel->delete(['where'=>$id]);
		if($res){
			$this->cResponse();
		}else{
			$this->cResponse(['code'=>'10000','message'=>'data error']);
		}
	}
}	