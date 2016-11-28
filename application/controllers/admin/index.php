<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
require('Admin_Controller.php');
/**
 * 主页
 */
class Index extends Admin_Controller {	
	function __construct()
	{
		parent::__construct();
	}	
	/**
	 * [index description]
	 * @return [type] [description]
	 */
	public function index()
	{	
		$data['menuData'] = require(APPPATH.'/config/admin_menu.php');
		$data['menuView'] = $this->load->view('/admin/menu',$data,true);

		$this->load->view('/admin/index',$data);
	}

	public function welcome(){
		$data['menuData'] = require(APPPATH.'/config/admin_menu.php');
		$data['menuView'] = $this->load->view('/admin/menu',$data,true);

		$this->load->view('/admin/welcome',$data);
	}
}