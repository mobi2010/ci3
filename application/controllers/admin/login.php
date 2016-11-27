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
	 * [验证]
	 * @return [type] [description]
	 */
	public function checked(){
		$uname = mobi_string_filter($_POST['uname']);
		$upwd = mobi_string_filter($_POST['upwd']);		
		if($uname == 'admin' && $upwd == 'admin@mobi2010'){			
			$_SESSION['logined'] = true;
			$res['code'] = 200;
			$this->printer($res);
		}
		$res['code'] = 400;
		$res['msg'] = 'Account or Password is error';
		$this->printer($res);
	}
}