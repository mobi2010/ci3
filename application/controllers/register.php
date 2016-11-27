<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * 注册
 *
 * @author by zsc
 */
class Register extends MY_Controller {	
	function __construct($params = array())
	{
		parent::__construct(array('auth'=>false));
	}
	/**
	 * [注册]
	 * @return [type] [description]
	 */
	function index(){
		redirect('register/step1');		
	}
	/**
	 * [第一步]
	 * @return [type] [description]
	 */
	public function step1()
	{	
		//$this->auth('register');
		$data['bodyClass'] = 'body-nologin';
		$this->load->view('pinery/header',$data);
		$this->load->view('pinery/public/nologin_topbar',$data);
		$this->load->view('pinery/public/register_step1',$data);
		$this->load->view('pinery/footer',array('footerInfo'=>'no'));
	}
	/**
	 * [第一步保存]
	 * @return [type] [description]
	 */
	public function save1()
	{		
		$password = mobi_string_filter($_POST['password']);
		$accountRes = $this->member->account($_POST['account']);
		if($accountRes['code'] == 200){
			$data = $accountRes['data'];
			$where = $accountRes['where'];
			$account = $accountRes['account'];
		}else{
			$this->printer($accountRes);
		}
		$data['password'] = md5($password);
		if(empty($account)){
			$data['source'] = intval($_POST['source']);
			$data['addtime'] = $data['logintime'] = time();
			$data['step'] = 1;
			$data['city_id'] = $this->initData['cityId'];
			$data['avatar'] = 'http://pinery.b0.upaiyun.com/web/avatar.jpg';
			$data['long2ip'] = ip2long($_SERVER['REMOTE_ADDR']);
			$accountId = $this->pineryModel->dataInsert(array('table'=>'pinery_member','data'=>$data));
			mobi_setcookie('auth',$this->gycrypt->encrypt($accountId),3600*24*30);
			$this->printer(array('data'=>$accountId));
		}else{
			$this->printer(array('msg'=>'帐号已存在','code'=>400));
		}
	}
	/**
	 * [第二步]
	 * @return [type] [description]
	 */
	public function step2()
	{
		//$this->auth('register');
		$data['dataSource'] = array('个人','机构');
		$data['bodyClass'] = 'body-nologin';
		$this->load->view('pinery/header',$data);
		$this->load->view('pinery/public/nologin_topbar',$data);
		$this->load->view('pinery/public/register_step2',$data);
		$this->load->view('pinery/footer',array('footerInfo'=>'no'));
	}
}	