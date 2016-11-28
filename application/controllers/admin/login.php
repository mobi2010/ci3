<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
require('Admin_Controller.php');
/**
 * 登录.
 */
class Login extends Admin_Controller {
	/**
	 * [index description]
	 * @return [type] [description]
	 */
	public function index()
	{	
		$this->load->view('admin/login');
	}
	/**
	 * 验证
	 * @return [type] [description]
	 */
	public function checked(){
		$uname = mobi_string_filter($_POST['uname']);
		$upwd = mobi_string_filter($_POST['upwd']);		
		if($uname == 'admin' && $upwd == 'admin@ci3'){			
			$_SESSION['logined'] = true;
			$this->cResponse($res);
		}
		$res['code'] = 400;
		$res['msg'] = 'Account or Password is error';
		$this->cResponse($res);
	}

	function test2(){
		$this->load->view('admin/test2');
	}

	function test(){
		$this->load->view('admin/test');
	}

	function test3(){
		$this->load->view('admin/test3');
	}
	/**
	 * 登出
	 * @return [type] [description]
	 */
	public function logout(){
		unset($_SESSION['logined']);
		redirect('admin/login');
	}
}