<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
date_default_timezone_set('PRC'); 
header("Pragma:no-cache");//不缓存页面
header('Content-type: text/html;charset=utf-8');//设置页面编码
// header("Last-Modified:".date('r'));
// header("Expires:".date('r'));
// header("ETag:".time());
// header("Cache-Control: no-cache, must-revalidate"); 
/**
 * 控制器
 */
class MY_Controller extends CI_Controller
{	
	public $uriEntity;//uri 实体
	public $initData;//初始数据
	public $userId;
	public $userEntity;//user 实体
	function __construct($params = array())
	{
		parent::__construct();

		$this->load->model('Ci3_model', 'ci3Model');//服务


		$this->uriEntity();//uri实体数据		

		$this->init();//初始数据

		$params['auth'] !== false && $this->auth();//验证
	}
	/**
	* [初始数据]
	* @return [type] [description]
	*/
	protected function init(){
		//配置参数
		$this->initData['commonParams'] = require(APPPATH.'/config/common_params.php');
		$this->load->vars('initData',$this->initData);//映射到模板
		return $this->initData;
	}
	/**
	 * [验证]
	 * @return [type] [description]
	 */
	protected function auth($type = null){
		switch ($type) {
			case 'register':			
				
				break;			
			default:
				if((!$this->userId || $this->userEntity['status'] != 0) && 
					$this->uriEntity['class'] != "login"){
					redirect('login');		
				}
				if($this->userEntity['step'] < 9 && 
					!($this->uriEntity['class'] == "account" && 
						in_array($this->uriEntity['method'], array("info","infoSave")))){
					redirect('member/account/info');
				}
				break;
		}
		return true;
	}
	/**
	 * [uri实体数据整理]
	 * @return boolean [description]
	 */
	private function uriEntity(){
		$RTR = $GLOBALS['RTR'];//路由对象		
		$segments = $RTR->uri->segments;//路由参数
		$this->uriEntity['class'] = $RTR->class;//控制器
		$this->uriEntity['method'] = $RTR->method;//action
		$this->uriEntity['base_url'] = $RTR->config->config['base_url'];//域名
		$this->uriEntity['uri_string'] = $RTR->uri->uri_string;//路由参数string
		$this->uriEntity['segments'] = $segments;//路由参数array
		$this->load->vars('uriEntity',$this->uriEntity);//映射到模板
		return $this->uriEntity;
	}
	/**
	 * [输出]
	 * @return [type] [description]
	 */
    protected function cResponse($params=array(), $exit = true, $contentType='json'){
    	$params['data'] = empty($params['data']) ? "" : $params['data'];
    	$params['code'] = $params['code'] ? $params['code'] : 0;
    	$params['message'] = $params['message'] ? $params['message'] : 'success';
    	switch ($contentType) {
    		case 'json':
    			header('Content-type: application/json;charset=utf-8');
    			echo json_encode($params);
    			break;
    		case 'dump':
    			echo "<pre>";
    			var_dump($params);
    			echo "</pre>";
    			break;
    		case 'return':
    			return $params;
    			break;	
    	}
    	$exit && exit; 
    }
    /**
     * [会员信息]
     * @return [type] [description]
     */
    protected function memberInfo($userid,$source=0){
    	if($source == 0 && $userid == $this->userId){
    		return $this->userEntity;
    	}
    	return $this->member->info($userid,$source);
    }
}