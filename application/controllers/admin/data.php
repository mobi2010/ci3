<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
require('Admin_Controller.php');

/**
 * 数据
 *
 * @author by zsc
 */
class Data extends Admin_Controller {	
	function __construct($params = array())
	{
		parent::__construct(array('auth'=>false));
	}
	/**
	 * [服务类型]
	 * @return [type] [description]
	 */
	function servicesType(){
		$data = $this->pineryModel->dataFetchArray(array('table'=>'pinery_services_type','skey'=>'id','field'=>'id,name','order'=>'sort desc'));
		echo json_encode($data);
	}
	/**
	 * [集市类型]
	 * @return [type] [description]
	 */
	function marketType(){
		$data = $this->pineryModel->dataFetchArray(array('table'=>'pinery_market_type','skey'=>'id','field'=>'id,name','order'=>'sort desc'));
		echo json_encode($data);
	}
	/**
	 * [车辆类型]
	 * @return [type] [description]
	 */
	function carType(){
		$data = $this->pineryModel->dataFetchArray(array('table'=>'pinery_car_type','skey'=>'id','field'=>'id,name','order'=>'sort desc'));
		echo json_encode($data);
	}
	/**
	 * 城市数据
	 */
	function dataCity(){
		$data = $this->pineryModel->dataFetchArray(array('table'=>'pinery_city','skey'=>'id','field'=>'id,name,parent_name,lng,lat'));
		echo json_encode($data);
	}	
	/**
	 * 房产方式
	 */
	function propertyMode(){
		$data = $this->pineryModel->dataFetchArray(array('table'=>'pinery_property_mode','skey'=>'id','field'=>'id,name','order'=>'sort desc'));
		echo json_encode($data);
	}
	/**
	 * 房产类型
	 */
	function propertyType(){
		$data = $this->pineryModel->dataFetchArray(array('table'=>'pinery_property_type','skey'=>'id','field'=>'id,name','order'=>'sort desc'));
		echo json_encode($data);
	}
	/**
	 * 房产朝向
	 */
	function propertyToward(){
		$data = $this->pineryModel->dataFetchArray(array('table'=>'pinery_property_toward','skey'=>'id','field'=>'id,name','order'=>'sort asc'));
		echo json_encode($data);
	}
	/**
	 * 房产装修
	 */
	function propertyDecoration(){
		$data = $this->pineryModel->dataFetchArray(array('table'=>'pinery_property_decoration','skey'=>'id','field'=>'id,name','order'=>'sort desc'));
		echo json_encode($data);
	}
	function createTable(){
		$citys = $this->pineryModel->dataFetchArray(array('table'=>'pinery_city','skey'=>'id'));
		$tableTypes = array('property','car','market','services');

		// //位置表
		// foreach ($citys as $cityId => $value) {
		// 	$params = array();
		// 	$params['table'] = "pinery_location_{$cityId}";
		// 	$params['key'] = "location"; 
		// 	$sql = $this->tableSqls($params);
		// 	$this->pineryModel->query($sql);
		// }		
		
		// //索引表
		// foreach ($citys as $cityId => $value) {
		// 	foreach ($tableTypes as $key => $value) {	
		// 		$params = array();			
		// 		if($value == "property"){
		// 			for($i=1;$i<5;$i++){
		// 				$params['table'] = "pinery_{$value}_{$cityId}_".$i;
		// 				$params['key'] = "{$value}_{$i}"; 
		// 				$sql = $this->tableSqls($params);
		// 				$this->pineryModel->query($sql);
		// 			}					
		// 		}else{
		// 			$params['table'] = "pinery_{$value}_{$cityId}";
		// 			$params['key'] = $value; 
		// 			$sql = $this->tableSqls($params);
		// 			$this->pineryModel->query($sql);
		// 		}
		// 	}
		// }
		// //内容表
		// foreach ($citys as $cityId => $value) {
		// 	foreach ($tableTypes as $key => $value) {
		// 		$mtables = array();
		// 		$params = array();
		// 		if($value == "property"){
		// 			foreach (array(1,2,3,4) as $key => $mode) {
		// 				$mtables = array();
		// 				for($i=0;$i<10;$i++){
		// 					$params = array();
		// 					$mtables[] = $params['table'] = "pinery_{$value}_content_{$cityId}_{$mode}_".$i;
		// 					$params['key'] = "content"; 
		// 					$sql = $this->tableSqls($params);
		// 					$this->pineryModel->query($sql);
		// 				}				
		// 				// $params['table'] = "pinery_{$value}_content_{$cityId}_{$mode}";
		// 				// $params['key'] = "content_merge"; 
		// 				// $params['mtables'] = $mtables; 
		// 				// $sql = $this->tableSqls($params);
		// 				// $this->pineryModel->query($sql);
		// 			}
		// 		}else{	
		// 			for($i=0;$i<10;$i++){
		// 				$params = array();
		// 				$mtables[] = $params['table'] = "pinery_{$value}_content_{$cityId}_".$i;
		// 				$params['key'] = "content"; 
		// 				$sql = $this->tableSqls($params);
		// 				$this->pineryModel->query($sql);
		// 			}				
		// 			// $params['table'] = "pinery_{$value}_content_{$cityId}";
		// 			// $params['key'] = "content_merge"; 
		// 			// $params['mtables'] = $mtables; 
		// 			// $sql = $this->tableSqls($params);
		// 			// $this->pineryModel->query($sql);
		// 		}
		// 	}
		// }	
	}
	function dropTable(){
		// $tables = $this->pineryModel->query("show tables;")->result_array();
		// $noTables = array('pinery_member','pinery_member_system','pinery_car_type','pinery_city','pinery_market_type','pinery_property_decoration','pinery_property_mode','pinery_property_toward','pinery_property_type','pinery_services_type','pinery_report');
		// foreach ($tables as $key => $value) {
		// 	$table = $value['Tables_in_2010mobi'];
		// 	if(!in_array($table, $noTables)){
		// 		$this->pineryModel->query("drop table ".$table);
		// 	}			
		// }
	}	
	function alterTable(){
	}
	function truncateTable(){
		$tables = $this->pineryModel->query("show tables;")->result_array();
		$noTables = array('pinery_member','pinery_car_type','pinery_city','pinery_market_type','pinery_property_decoration','pinery_property_mode','pinery_property_toward','pinery_property_type','pinery_services_type','pinery_report');
		foreach ($tables as $key => $value) {
			$table = $value['Tables_in_2010mobi'];
			if(!in_array($table, $noTables)){
				$this->pineryModel->query("truncate table ".$table);
			}			
		}
	}
	function tableSqls($params){
		$key = $params['key'];
		$table = $params['table'];
		$sqls['location'] = "CREATE TABLE IF NOT EXISTS `{$table}` (
			  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
			  `name` varchar(50) NOT NULL COMMENT '地名',
			  `address` varchar(200) NOT NULL COMMENT '地址',
			  `map` text NOT NULL COMMENT '地图信息',
			  PRIMARY KEY (`id`),
			  KEY `name` (`name`)
			) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='位置表_城市id' AUTO_INCREMENT=1";

		$sqls['car'] = "CREATE TABLE IF NOT EXISTS `{$table}` (
		  `id` bigint(20) NOT NULL AUTO_INCREMENT,
		  `title` varchar(50) NOT NULL COMMENT '标题',
		  `update_time` int(11) NOT NULL COMMENT '修改时间',
		  `add_time` int(11) NOT NULL COMMENT '添加时间',
		  `type` tinyint(4) NOT NULL COMMENT '类型',
		  `userid` bigint(20) NOT NULL COMMENT '用户id',
		  `view_num` int(11) NOT NULL COMMENT '浏览量',
		  `content_id` bigint(20) NOT NULL COMMENT '内容id',
		  `price` int(11) NOT NULL COMMENT '价格',
		  `source` tinyint(4) NOT NULL COMMENT '来源:0会员,1系统',
		  PRIMARY KEY (`id`),
		  KEY `type` (`type`),
		  KEY `source` (`source`,`userid`)
		) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='车辆表_城市id' AUTO_INCREMENT=1 ";

		$sqls['market'] = "CREATE TABLE IF NOT EXISTS `{$table}` (
		  `id` bigint(20) NOT NULL AUTO_INCREMENT,
		  `title` varchar(50) NOT NULL COMMENT '标题',
		  `update_time` int(11) NOT NULL COMMENT '修改时间',
		  `add_time` int(11) NOT NULL COMMENT '添加时间',
		  `type` tinyint(4) NOT NULL COMMENT '类型',
		  `userid` bigint(20) NOT NULL COMMENT '用户id',
		  `view_num` int(11) NOT NULL COMMENT '浏览量',
		  `content_id` bigint(20) NOT NULL COMMENT '内容id',
		  `price` int(11) NOT NULL COMMENT '价格',
		  `source` tinyint(4) NOT NULL COMMENT '来源:0会员,1系统',
		  PRIMARY KEY (`id`),
		  KEY `type` (`type`),
		  KEY `source` (`source`,`userid`)
		) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='集市表_城市id' AUTO_INCREMENT=1";
		
		$sqls['property_1'] = "CREATE TABLE IF NOT EXISTS `{$table}` (
		  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
		  `title` varchar(50) NOT NULL COMMENT '标题',
		  `type` tinyint(1) NOT NULL COMMENT '类型',
		  `location_id` bigint(20) NOT NULL COMMENT '位置',
		  `floors` tinyint(1) NOT NULL COMMENT '楼层',
		  `floors_total` tinyint(1) NOT NULL COMMENT '总楼层',
		  `room` tinyint(1) NOT NULL COMMENT '室',
		  `hall` tinyint(1) NOT NULL COMMENT '厅',
		  `bathroom` tinyint(1) NOT NULL COMMENT '卫',
		  `area` smallint(6) NOT NULL COMMENT '面积',
		  `rent` mediumint(9) NOT NULL COMMENT '租金',
		  `toward` tinyint(4) NOT NULL COMMENT '朝向',
		  `decoration` tinyint(4) NOT NULL COMMENT '装修',
		  `userid` bigint(20) NOT NULL COMMENT '用户id',
		  `content_id` bigint(20) NOT NULL COMMENT '内容id',
		  `add_time` int(11) NOT NULL COMMENT '添加时间',
		  `update_time` int(11) NOT NULL COMMENT '更新时间',
		  `view_num` int(11) NOT NULL COMMENT '浏览数',
		  `source` tinyint(4) NOT NULL COMMENT '来源:0会员,1系统',
		  PRIMARY KEY (`id`),
		  KEY `type` (`type`),
		  KEY `source` (`source`,`userid`)
		) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='房产出租表_城市id_方式id' AUTO_INCREMENT=1";

		$sqls['property_2'] = "CREATE TABLE IF NOT EXISTS `{$table}` (
		  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
		  `title` varchar(50) NOT NULL COMMENT '标题',
		  `type` tinyint(4) NOT NULL COMMENT '类型',
		  `add_time` int(11) NOT NULL COMMENT '添加时间',
		  `update_time` int(11) NOT NULL COMMENT '修改时间',
		  `content_id` bigint(20) NOT NULL COMMENT '内容id',
		  `view_num` int(11) NOT NULL COMMENT '浏览数',
		  `userid` bigint(20) NOT NULL COMMENT '用户id',
		  `source` tinyint(4) NOT NULL COMMENT '来源:0会员,1系统',
		  PRIMARY KEY (`id`),
		  KEY `type` (`type`),
		  KEY `source` (`source`,`userid`)
		) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='房产求租表_城市id_方式id' AUTO_INCREMENT=1";

		$sqls['property_3'] = "CREATE TABLE IF NOT EXISTS `{$table}` (
		  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
		  `title` varchar(50) NOT NULL COMMENT '标题',
		  `type` tinyint(1) NOT NULL COMMENT '类型',
		  `location_id` bigint(20) NOT NULL COMMENT '位置',
		  `floors` tinyint(1) NOT NULL COMMENT '楼层',
		  `floors_total` tinyint(1) NOT NULL COMMENT '总楼层',
		  `room` tinyint(1) NOT NULL COMMENT '室',
		  `hall` tinyint(1) NOT NULL COMMENT '厅',
		  `bathroom` tinyint(1) NOT NULL COMMENT '卫',
		  `area` smallint(6) NOT NULL COMMENT '面积',
		  `price` smallint(9) unsigned NOT NULL COMMENT '售价',
		  `toward` tinyint(4) NOT NULL COMMENT '朝向',
		  `decoration` tinyint(4) NOT NULL COMMENT '装修',
		  `userid` bigint(20) NOT NULL COMMENT '用户id',
		  `content_id` bigint(20) NOT NULL COMMENT '内容id',
		  `add_time` int(11) NOT NULL COMMENT '添加时间',
		  `update_time` int(11) NOT NULL COMMENT '更新时间',
		  `property` tinyint(4) NOT NULL COMMENT '产权',
		  `building` smallint(6) NOT NULL COMMENT '建筑年代',
		  `view_num` int(11) NOT NULL COMMENT '浏览数',
		  `source` tinyint(4) NOT NULL COMMENT '来源:0会员,1系统',
		  PRIMARY KEY (`id`),
		  KEY `type` (`type`),
		  KEY `source` (`source`,`userid`)
		) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='房产出售表_城市id_方式id' AUTO_INCREMENT=1";
		
		$sqls['property_4'] = "CREATE TABLE IF NOT EXISTS `{$table}` (
		  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
		  `title` varchar(50) NOT NULL COMMENT '标题',
		  `type` tinyint(4) NOT NULL COMMENT '类型',
		  `add_time` int(11) NOT NULL COMMENT '添加时间',
		  `content_id` bigint(20) NOT NULL COMMENT '内容id',
		  `update_time` int(11) NOT NULL COMMENT '修改时间',
		  `view_num` int(11) NOT NULL COMMENT '浏览数',
		  `userid` bigint(20) NOT NULL COMMENT '用户id',
		  `source` tinyint(4) NOT NULL COMMENT '来源:0会员,1系统',
		  PRIMARY KEY (`id`),
		  KEY `type` (`type`),
		  KEY `source` (`source`,`userid`)
		) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='房产求购表_城市id_方式id' AUTO_INCREMENT=1";

		$sqls['services'] = "CREATE TABLE IF NOT EXISTS `{$table}` (
		  `id` bigint(20) NOT NULL AUTO_INCREMENT,
		  `title` varchar(50) NOT NULL COMMENT '标题',
		  `update_time` int(11) NOT NULL COMMENT '修改时间',
		  `add_time` int(11) NOT NULL COMMENT '添加时间',
		  `type` tinyint(4) NOT NULL COMMENT '类型',
		  `userid` bigint(20) NOT NULL COMMENT '用户id',
		  `view_num` int(11) NOT NULL COMMENT '浏览量',
		  `content_id` bigint(20) NOT NULL COMMENT '内容id',
		  `price` int(11) NOT NULL COMMENT '价格',
		  `source` tinyint(4) NOT NULL COMMENT '来源:0会员,1系统',
		  PRIMARY KEY (`id`),
		  KEY `type` (`type`),
		  KEY `source` (`source`,`userid`)
		) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='服务表_城市id' AUTO_INCREMENT=1";

		
		$sqls['content'] = "CREATE TABLE IF NOT EXISTS `{$table}`  (
		  `id` bigint(20) NOT NULL AUTO_INCREMENT,
		  `content` text NOT NULL COMMENT '描述',
		  `images` text NOT NULL COMMENT '图片',
		  PRIMARY KEY (`id`)
		) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='内容表_城市id_用户id最后一位' AUTO_INCREMENT=1";



		
		$mtables =  empty($params['mtables']) ? "" : implode(',', $params['mtables']);
		$sqls['content_merge'] = "CREATE TABLE IF NOT EXISTS `{$table}` (
			`id` bigint(20) NOT NULL AUTO_INCREMENT,			
			`content` text NOT NULL COMMENT '描述',
			`images` text NOT NULL COMMENT '图片',
			PRIMARY KEY (`id`)
		) ENGINE=MERGE UNION=(".$mtables.") INSERT_METHOD=LAST";
		return $sqls[$key];
	}
	
}