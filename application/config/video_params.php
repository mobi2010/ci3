<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

// 加密算法的秘钥配置
$adminParams['cryptoSecretKey'] =  [
        'normal' => [
            'key'    => 'KEYAES0123456789',
            // 初始化向量
            'iv'     => '192.168.1.102.ci'//16位
        ]
    ];

//分类
$adminParams['categoryType'] =  [1=>'视频',2=>'音频'];

//菜单
$adminParams['menuData'] = [
		['title'=>'首页','uri'=>'video/index'],
		['title'=>'用户版','uri'=>'video/user'],
		['title'=>'专家版','uri'=>'video/expert'],
		['title'=>'育儿微课','uri'=>'video/list'],
		['title'=>'育儿文章','uri'=>'video/viewlist'],
		['title'=>'关于我们','uri'=>'video/aboutus'],
	];

return $adminParams;