<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Category_model extends MY_Model {		
	public $table = 'category';	
	public $params;
	function __construct()
	{
		parent::__construct();
		$this->params['table'] = $this->table;
	}

	function getList($params=[]){
		$this->params = $this->params + $params;
		return $this->dataFetchArray($this->params);
	}
}	