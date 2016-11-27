<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * 集市
 */
class Market_model extends MY_Model {			
	function __construct()
	{
		parent::__construct();
	}
	/**
	 * [修改浏览数]
	 * @return [type] [description]
	 */
	function updateViewnum($argv=array()){
		$city_id = intval($argv['city_id']);
		$id = intval($argv['id']);
		$viewNum = mt_rand(1, 2);
		$sql = "update pinery_market_{$city_id} set view_num=view_num+{$viewNum} where id={$id} limit 1";
		return $this->query($sql);
	}
	/**
	 * [添加内容]
	 * @param array $argv [description]
	 */
	function addContent($argv=array()){
		$content = $argv['content'] ? $argv['content'] : "";
		$userId = intval($argv['userid']);
		$city_id = intval($argv['city_id']);
		$data['content'] = addslashes($content);
		$data['images'] = mobi_content_images($content);
		$params['table'] = "pinery_market_content_{$city_id}_".substr($userId, -1);
		$params['data'] = $data;
		return $this->dataInsert($params);
	}
	/**
	 * [删除集市信息]
	 * @param array $argv [description]
	 */
	function deleteMarket($argv=array()){			
		$city_id = intval($argv['city_id']);
		$ids = implode(',', $argv['ids']);
		if(empty($argv['ids'])){return false;}
		foreach ($argv['ids'] as $key => $value) {
			$data = $this->dataFetchRow(array('table'=>"pinery_market_{$city_id}",'where'=>$value));
			$userId = intval($data['userid']);
			$this->dataDelete(array('table'=>"pinery_market_content_{$city_id}_".substr($userId, -1),'where'=>$data['content_id']));	
		}
		$params['table'] = "pinery_market_{$city_id}";
		$params['where'] = "id in ({$ids})";
		return $this->dataDelete($params);		
	}
	/**
	 * [刷新集市信息]
	 * @param array $argv [description]
	 */
	function flashMarket($argv=array()){			
		$data['update_time'] = time();
		$city_id = intval($argv['city_id']);
		if(empty($argv['ids'])){return false;}
		$ids = implode(',', $argv['ids']);
		$params['table'] = "pinery_market_{$city_id}";
		$params['data'] = $data;
		$params['where'] = "id in ({$ids})";
		return $this->dataUpdate($params);		
	}
	/**
	 * [添加集市信息]
	 * @param array $argv [description]
	 */
	function addMarket($argv=array()){			
		$data['title'] = mobi_string_filter($argv['title']);
		$data['type'] = intval($argv['type']);	
		$data['content_id'] = $this->addContent($argv);
		$data['type'] = intval($argv['type']);	
		$data['userid'] = intval($argv['userid']);	
		$data['price'] = intval($argv['price']);
		$data['add_time'] = time();
		$data['update_time'] = $argv['update_time'] ? $argv['update_time'] : $data['add_time'];
		$data['source'] = intval($argv['source']);
		$city_id = intval($argv['city_id']);
		$params['table'] = "pinery_market_{$city_id}";
		$params['data'] = $data;
		return $this->dataInsert($params);		
	}	
	/**
	 * [获取内容信息]
	 * @return [type] [description]
	 */
	function getContentRow($argv=array()){
		$id = intval($argv['id']);
		$userId = intval($argv['userid']);
		$city_id = intval($argv['city_id']);
		$data = $this->dataFetchRow(array('table'=>"pinery_market_content_{$city_id}_".substr($userId, -1),'where'=>$id));
		$data['images'] = $data['images'] ? explode('|', $data['images']) : array();
		return $data;
	}
	/**
	 * [获取集市信息]
	 * @param array $argv [description]
	 */
	function getMarketRow($argv=array()){	
		$id = intval($argv['id']);		
		$city_id = intval($argv['city_id']);
		$data = $this->dataFetchRow(array('table'=>"pinery_market_{$city_id}",'where'=>$id));
		$data += $this->getContentRow(array('userid'=>$data['userid'],'id'=>$data['content_id'],'city_id'=>$city_id));
		return $data;		
	}
	/**
	 * [获取集市信息列表]
	 * @param array $argv [description]
	 */
	function getMarketArray($argv=array()){	
		$city_id = intval($argv['city_id']);
		$resData = $this->dataFetchArray(array('table'=>"pinery_market_{$city_id}",'where'=>$argv['where'],'order'=>$argv['order'],'limit'=>$argv['limit']));			
		if(empty($resData)){
			return array();
		}
		foreach ($resData as $key => $value) {
			$value += $this->getContentRow(array('userid'=>$value['userid'],'id'=>$value['content_id'],'city_id'=>$city_id));
			$data[$key] = $value;
		}
		return $data;		
	}
	/**
	 * [获取集市信息总数]
	 * @return [type] [description]
	 */
	function getMarketCount($argv){
		$city_id = intval($argv['city_id']);
		return $this->dataFetchCount(array('table'=>"pinery_market_{$city_id}",'where'=>$argv['where']));	
	}
}