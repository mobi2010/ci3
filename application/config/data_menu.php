<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
return array(
			'index'=>array(
				'title'=>'首页',
				'child'=>array('index'=>'欢迎','property'=>'房产','car'=>'车辆','market'=>'集市','services'=>'服务')
				),
			'publish'=>array(
				'title'=>'发布',
				'child'=>array('property'=>'房产','car'=>'车辆','market'=>'集市','services'=>'服务')
				),
			'account'=>array(
				'title'=>'账户',
				'child'=>array('info'=>'基本信息','updatePwd'=>'修改密码')
				)
		);