<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
return [
		'index'=>['title'=>'首页','sub'=>
			[
				['title'=>'欢迎','sub'=>
					[
						['title'=>'欢迎','uri'=>'admin/index/welcome']
					]
				]
			]
		],
		'content'=>['title'=>'内容管理','sub'=>
			[
				['title'=>'视频','sub'=>
					[
						['title'=>'添加','uri'=>'admin/video/add'],
						['title'=>'列表','uri'=>'admin/video/clist'],
					]
				],
				['title'=>'音频','sub'=>
					[
						['title'=>'添加','uri'=>'admin/audio/add'],
						['title'=>'列表','uri'=>'admin/audio/clist'],
					]
				],
			]
		]
	];