<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Member_model extends MY_Model {			
	function __construct()
	{
		parent::__construct();
	}
	/**
	 * [用户信息]
	 * @param  [type] $userId [description]
	 * @return [type]         [description]
	 */
	function info($userId,$source=0){
		$userId = intval($userId);
		$table = $source == 1 ? 'pinery_member_system' : 'pinery_member';
		return $this->dataFetchRow(array('table'=>$table,'where'=>$userId));
	}
	/**
	 * [帐号处理]
	 * @param  [type] $account [description]
	 * @return [type]          [description]
	 */
	function account($account){
		$res['code'] = 200;
		$account = mobi_string_filter($account);
		if(!$account){
			$res['msg'] = '帐号不能为空!';
			$res['code'] = 400;
			return $res;
		}		
		if(is_numeric($account)){
			if(mobi_ismobile($account)){
				$res['data']['mobile'] = $account;
				$res['where'] = "mobile='{$account}'";
			}else{
				$res['msg'] = '手机号不合法';
				$res['code'] = 400;
				return $res;
			}
		}else{
			if(mobi_isemail($account)){
				$res['data']['email'] = $account;
				$res['where'] = "email='{$account}'";
			}else{
				$res['msg'] = '邮箱不合法';
				$res['code'] = 400;
				return $res;
			}
		}
		$res['account'] = $this->dataFetchRow(array('table'=>'pinery_member','where'=>$res['where']));
		return $res;
	}
	/**
	 * [addSystemAccount description]
	 */
	function addSystemAccount($argv=array()){
		$data['mobile'] = mobi_string_filter($argv['mobile']);
		if(!$data['mobile']){
			return 0;
		}
		$table = 'pinery_member_system';		
		$data['names'] = mobi_string_filter($argv['names']);
		$data['org_name'] = mobi_string_filter($argv['org_name']);
		$data['source'] = $data['org_name'] ? 2 : 1;
		$data['city_id'] = intval($argv['city_id']);
		$data['avatar'] = $argv['avatar'] ? mobi_string_filter($argv['avatar']) : 'http://pinery.b0.upaiyun.com/web/avatar.jpg';
		return $this->dataInsert(array('table'=>$table,'data'=>$data));
	}
}	