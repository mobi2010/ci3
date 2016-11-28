<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
return [
		['title'=>'首页','uri'=>'admin/index','sub'=>
			[
				['title'=>'欢迎','uri'=>'admin/index/welcome'],
			]
		],
		['title'=>'视频','uri'=>'admin/video','sub'=>
			[
				['title'=>'添加','uri'=>'admin/video/add'],
				['title'=>'列表','uri'=>'admin/video/clist'],
				['title'=>'管理','uri'=>'admin/video/clist','sub'=>
					[
						['title'=>'test','uri'=>'admin/video/clist']
					]
				],
			]
		]
	];