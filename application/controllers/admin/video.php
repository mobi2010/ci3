<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
require('Admin_Controller.php');
/**
 * 视频
 */
class Video extends Admin_Controller {
	/**
	 * [index]
	 * @return [type] [description]
	 */
	public function index()
	{	
		$this->load->view('admin/video/list',$data);
	}
	/**
	 * [add description]
	 * @return [type] [description]
	 */
	public function add(){
		$this->load->view('admin/video/add',$data);
	}
	/**
	 * [list description]
	 * @return [type] [description]
	 */
	public function clist(){
		$this->load->view('admin/video/list',$data);
	}
	
}	