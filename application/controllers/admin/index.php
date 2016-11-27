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
		$data['menu'] = $this->menu();
		$this->load->view('/admin/index',$data);
	}
	/**
	 * [menu description]
	 * @return [type] [description]
	 */
	function menu(){
		$data[] = array('title'=>'member','url'=>'admin/member');
		$data[] = array('title'=>'report','url'=>'admin/report');
		$data[] = array('title'=>'property','url'=>'admin/property');
		$data[] = array('title'=>'car','url'=>'admin/car');
		$data[] = array('title'=>'market','url'=>'admin/market');
		$data[] = array('title'=>'services','url'=>'admin/services');
		$data[] = array('title'=>'import','url'=>'admin/import');
		//$data[] = array('title'=>'propertyAdd1','url'=>'admin/import/propertyAdd1');
		
		return $data; 
	}
}