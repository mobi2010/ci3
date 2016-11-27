<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
require('Admin_Controller.php');
set_time_limit(0);
/**
 * 导入
 */
class Import extends Admin_Controller {


	/**
	 * [房产]
	 * @return [type] [description]
	 */
	function property(){
		$this->load->view('admin/publish_property',$data);
	}
	/**
	 * [房产保存]
	 * @return [type] [description]
	 */
	function propertySave(){

		$member['names'] = $_POST['names'];
		$member['mobile'] = $_POST['mobile'];
		$member['org_name'] = $_POST['org_name'];
		$member['avatar'] = $_POST['avatar'];
		$argv['city_id'] = $member['city_id'] = $_POST['cid'];

		$minfo = $this->memberInfo($member);


		$res['code'] = 400;
		$mode = intval($_POST['mode']);
		$type = intval($_POST['type']);
		$argv = $_POST;


		if(!$minfo['id']){
			$res['msg'] = "用户数据错误";
			$this->printer($res);
		}
		$argv['userid'] = $minfo['id'];
		if(in_array($mode, array(1,3))){
			if(in_array($type,array(1,2,3))){
				if(!$_POST['community']){
					$res['msg'] = "小区不能为空";
					$this->printer($res);
				}
				$argv['map'] = $argv['communityHide'];
			}else{
				if(!$_POST['address']){
					$res['msg'] = "地址不能为空";
					$this->printer($res);
				}
				$argv['map'] = $argv['addressHide'];
			}
		}
		if(!$_POST['title']){
			$res['msg'] = "标题不能为空";
			$this->printer($res);
		}
		$res['code'] = 200;
		
		$argv['source'] = 1;
		$argv['content'] = $_POST['editorValue'];
		$res['data'] = $this->property->addProperty($argv);
		$this->printer($res);
	}
	/**
	 * [车辆]
	 * @return [type] [description]
	 */
	function car(){
		$this->load->view('admin/publish_car',$data);
	}
	/**
	 * [车辆保存]
	 * @return [type] [description]
	 */
	function carSave(){
		$res['code'] = 400;
		$type = intval($_POST['type']);
		$argv = $_POST;

		$member['names'] = $_POST['names'];
		$member['mobile'] = $_POST['mobile'];
		$member['org_name'] = $_POST['org_name'];
		$member['avatar'] = $_POST['avatar'];
		$argv['city_id'] = $member['city_id'] = $_POST['cid'];
		$minfo = $this->memberInfo($member);
		if(!$minfo['id']){
			$res['msg'] = "用户数据错误";
			$this->printer($res);
		}

		if(!$_POST['title']){
			$res['msg'] = "标题不能为空";
			$this->printer($res);
		}
		$res['code'] = 200;
		
		$argv['userid'] = $minfo['id'];
		$argv['source'] = 1;
		$argv['content'] = $_POST['editorValue'];
		$res['data'] = $this->car->addCar($argv);
		$this->printer($res);
	}
	/**
	 * [集市]
	 * @return [type] [description]
	 */
	function market(){
		$this->load->view('admin/publish_market',$data);
	}
	/**
	 * [集市保存]
	 * @return [type] [description]
	 */
	function marketSave(){
		$res['code'] = 400;
		$type = intval($_POST['type']);
		$argv = $_POST;


		$member['names'] = $_POST['names'];
		$member['mobile'] = $_POST['mobile'];
		$member['org_name'] = $_POST['org_name'];
		$member['avatar'] = $_POST['avatar'];
		$argv['city_id'] = $member['city_id'] = $_POST['cid'];
		$minfo = $this->memberInfo($member);
		if(!$minfo['id']){
			$res['msg'] = "用户数据错误";
			$this->printer($res);
		}
		if(!$_POST['title']){
			$res['msg'] = "标题不能为空";
			$this->printer($res);
		}
		$res['code'] = 200;
		
		$argv['userid'] = $minfo['id'];
		$argv['source'] = 1;
		$argv['content'] = $_POST['editorValue'];
		$res['data'] = $this->market->addMarket($argv);
		$this->printer($res);
	}
	/**
	 * [服务]
	 * @return [type] [description]
	 */
	function services(){		
		$this->load->view('admin/publish_services',$data);
	}
	/**
	 * [服务保存]
	 * @return [type] [description]
	 */
	function servicesSave(){
		$res['code'] = 400;
		$type = intval($_POST['type']);
		$argv = $_POST;
		$member['names'] = $_POST['names'];
		$member['mobile'] = $_POST['mobile'];
		$member['org_name'] = $_POST['org_name'];
		$member['avatar'] = $_POST['avatar'];
		$argv['city_id'] = $member['city_id'] = $_POST['cid'];
		$minfo = $this->memberInfo($member);
		if(!$minfo['id']){
			$res['msg'] = "用户数据错误";
			$this->printer($res);
		}
		if(!$_POST['title']){
			$res['msg'] = "标题不能为空";
			$this->printer($res);
		}
		$res['code'] = 200;
		
		$argv['userid'] = $minfo['id'];		
		$argv['source'] = 1;
		$argv['content'] = $_POST['editorValue'];
		$res['data'] = $this->services->addServices($argv);
		$this->printer($res);
	}



	/**
	 * [index]
	 * @return [type] [description]
	 */
	public function index()
	{	
		$data['source'] = $_GET['sid'] ? $_GET['sid'] : 1;		
		$data['sourceData'] = $this->source();

		$otherData[] = array('title'=>'房产','url'=>'admin/import/property');
		$otherData[] = array('title'=>'车辆','url'=>'admin/import/car');
		$otherData[] = array('title'=>'集市','url'=>'admin/import/market');
		$otherData[] = array('title'=>'服务','url'=>'admin/import/services');
		$data['otherData'] = $otherData;
		$this->load->view('admin/import_index',$data);
	}	


	function memberInfo($params){

		$member['mobile'] = $mobile = trim($params['mobile']);

		$row = $this->pineryModel->dataFetchRow(array('table'=>'pinery_member_system','where'=>'mobile='.$mobile));

		if($row['id']){
			return $row;
		}

		if($params['avatar']){
		$dimage = $this->image->wget(array('file'=>$params['avatar']));
			if($dimage['status'] == 200){
				$thumbImg = $this->image->thumb(array('file'=>$dimage['data'],'width'=>120,'height'=>120,'bgcolor'=>'black'));
				$ypyImg = $this->image->ypyUpload(array('file'=>$thumbImg['filePath']));
				$member['avatar'] = mobi_string_filter($ypyImg['filePath']);
			}
		}			

		$member['names'] = mobi_string_filter($params['names']);
		$member['org_name'] = mobi_string_filter($params['org_name']);
		$member['city_id'] = $params['city_id'];

		$member['id'] = $this->member->addSystemAccount($member);
		return $member;
				
	}

	/**
	 * [涿州房产]
	 * @return [type] [description]
	 */
	function zzfc_sale(){

		$city_id = 2;
		$mode = 3;

		$dataProperty = $this->initData['dataProperty'];
		foreach ($dataProperty['toward'] as $key => $value) {
			$towardData[$value['name']] = $value['id'];
		}
		foreach ($dataProperty['decoration'] as $key => $value) {
			$decorationData[$value['name']] = $value['id'];
		}

		for($p=1;$p<3;$p++){
			$uriInfo = $this->source(1);
			$url = $uriInfo['url']."sale/index.php?&pageno=".$p;
			$html = $this->util->curlGet($url);

			preg_match_all('/<tr class="mouseOver">(.*?)<span class="thumbnail"><a href="(.*?)"(.*?)<td class="tdAlignLeft" width="18%">(.*?)<\/p>(.*?)<\/tr>/is',$html, $list, PREG_SET_ORDER);

			foreach ($list as $key => $value) {
				$url = $value[2];
				$html = mobi_gb2u($this->util->curlGet($url));			
				$property['update_time'] = strtotime(trim(strip_tags($value[4])));
				preg_match('/<div class="detailMainRight">(.*?)<\/div>/is', $html, $matches);

				$infoHtml = $matches[1];

				
				preg_match('/<p class="phoneNumber">看房咨询：<span class="familyAlpha size18px">(.*?)<\/span><\/p>/is', $infoHtml, $matches);
				$member['mobile'] = mobi_string_filter($matches[1]);
				$userid = 0;
				if($member['mobile']){
					$row = $this->pineryModel->dataFetchRow(array('table'=>'pinery_member_system','where'=>'mobile='.$member['mobile']));
					if($row['id']){
						$userid = $row['id'];
					}else{
						preg_match('/<div class="detailMainLeft">(.*?)<\/div>/is', $html, $matches);
						$memberHtml = $matches[1];


						preg_match('/<span class="brokerPhoto">(.*?)<img src="(.*?)"(.*?)<\/span>/is', $memberHtml, $matches);	

						$image = $matches[2];
						$dimage = $this->image->wget(array('file'=>$image));
						if($dimage['status'] == 200){
							$thumbImg = $this->image->thumb(array('file'=>$dimage['data'],'width'=>120,'height'=>120,'bgcolor'=>'black'));
							$ypyImg = $this->image->ypyUpload(array('file'=>$thumbImg['filePath']));
							$member['avatar'] = mobi_string_filter($ypyImg['filePath']);
						}

						preg_match('/<li>姓名：(.*?)<\/li>/is', $memberHtml, $matches);	
						$member['names'] = mobi_string_filter($matches[1]);

						preg_match('/<li>公司：(.*?)<\/li>/is', $memberHtml, $matches);	
						$member['org_name'] = mobi_string_filter($matches[1]);
						$userid = $this->member->addSystemAccount($member);
					}
				}
				
				if($userid){
					preg_match('/<p class="title color690 size14px weightBold">(.*?)<\/p>/is', $infoHtml, $matches);
					$property['title'] = mobi_string_filter($matches[1]);
				    $row = $this->pineryModel->dataFetchRow(array('table'=>"pinery_property_{$city_id}_{$mode}",'where'=>'title like binary "'.$property['title'].'"'));
					if(!$row['id']){
						preg_match('/<p class="subTitle size14px weightBold">【(.*?)】&nbsp;(.*?)室(.*?)厅(.*?)卫(.*?)阳&nbsp;\|&nbsp;(.*?)平米<\/p>/is', $infoHtml, $matches);
				
						$property['community'] = mobi_string_filter($matches[1]);//location


						$property['room'] = $matches[2];
						$property['hall'] = $matches[3];
						$property['bathroom'] = $matches[4];
						$property['area'] = $matches[6];


						preg_match('/<td colspan="2">地址：(.*?)<\/td>/is', $infoHtml, $matches);
						$property['address'] = mobi_string_filter($matches[1]);

						preg_match('/<td width="52%">售价：<span class="familyAlpha colorF60 size24px">(.*?)<\/span>/is', $infoHtml, $matches);

						$property['price'] = $matches[1];

						preg_match('/<td>楼层：(.*?)F\/(.*?)F<\/td>/is', $infoHtml, $matches);
						$property['floors'] = $matches[1];
						$property['floors_total'] = $matches[2];
						preg_match('/<td>朝向：(.*?)<\/td>/is', $infoHtml, $matches);	
						$property['toward'] = $towardData[$matches[1]];			
						preg_match('/<td>装修：(.*?)<\/td>/is', $infoHtml, $matches);
						$decoration = $matches[1];
						if($decoration == '普通装修'){
							$decoration = '中等装修';
						}
						$property['decoration'] = $decorationData[$decoration];

						preg_match('/<div class="houseDescription">(.*?)<\/div>/is', $html, $matches);
						$contentHtml = $matches[1];
						preg_match_all('/<img(.*?)\/>/is', $contentHtml, $matches);
						$property['content'] = str_replace($matches[0],'',$contentHtml);

						$property['userid'] = $userid;

						$property['city_id'] = $city_id;
						$property['mode'] = $mode;
						$property['type'] = 1;
						$property['source'] = 1;
						$this->property->addProperty($property);
				 	}
				}	
				sleep(1);			
			}
			sleep(1);
		}		
	}
	//租房
	function zzfc_rent(){
		$city_id = 2;
		$mode = 1;

		$dataProperty = $this->initData['dataProperty'];
		foreach ($dataProperty['toward'] as $key => $value) {
			$towardData[$value['name']] = $value['id'];
		}
		foreach ($dataProperty['decoration'] as $key => $value) {
			$decorationData[$value['name']] = $value['id'];
		}

		for($p=1;$p<3;$p++){
			$uriInfo = $this->source(1);
			$url = $uriInfo['url']."rent/index.php?&pageno=".$p;
			$html = $this->util->curlGet($url);

			preg_match_all('/<tr class="mouseOver">(.*?)<span class="thumbnail"><a href="(.*?)"(.*?)<td class="tdAlignLeft" width="18%">(.*?)<\/p>(.*?)<\/tr>/is',$html, $list, PREG_SET_ORDER);
			foreach ($list as $key => $value) {
				$url = $value[2];
				$property['update_time'] = strtotime(trim(strip_tags($value[4])));
				$html = mobi_gb2u($this->util->curlGet($url));			

				preg_match('/<div class="detailMainRight">(.*?)<\/div>/is', $html, $matches);

				$infoHtml = $matches[1];

				
				preg_match('/<p class="phoneNumber">看房咨询：<span class="familyAlpha size18px">(.*?)<\/span><\/p>/is', $infoHtml, $matches);
				$member['mobile'] = mobi_string_filter($matches[1]);
				$userid = 0;
				if($member['mobile']){
					$row = $this->pineryModel->dataFetchRow(array('table'=>'pinery_member_system','where'=>'mobile='.$member['mobile']));
					if($row['id']){
						$userid = $row['id'];
					}else{
						preg_match('/<div class="detailMainLeft">(.*?)<\/div>/is', $html, $matches);
						$memberHtml = $matches[1];


						preg_match('/<span class="brokerPhoto">(.*?)<img src="(.*?)"(.*?)<\/span>/is', $memberHtml, $matches);	

						$image = $matches[2];
						$dimage = $this->image->wget(array('file'=>$image));
						if($dimage['status'] == 200){
							$member['avatar'] = $dimage['data'];
							$thumbImg = $this->image->thumb(array('file'=>$dimage['data'],'width'=>120,'height'=>120,'bgcolor'=>'black'));
							$ypyImg = $this->image->ypyUpload(array('file'=>$thumbImg['filePath']));
							$member['avatar'] = mobi_string_filter($ypyImg['filePath']);
						}

						preg_match('/<li>姓名：(.*?)<\/li>/is', $memberHtml, $matches);	
						$member['names'] = mobi_string_filter($matches[1]);

						preg_match('/<li>公司：(.*?)<\/li>/is', $memberHtml, $matches);	
						$member['org_name'] = mobi_string_filter($matches[1]);
						$userid = $this->member->addSystemAccount($member);
					}
				}
				
				if($userid){
					preg_match('/<p class="title color690 size14px weightBold">(.*?)<\/p>/is', $infoHtml, $matches);
					$property['title'] = mobi_string_filter($matches[1]);
				    $row = $this->pineryModel->dataFetchRow(array('table'=>"pinery_property_{$city_id}_{$mode}",'where'=>'title like binary "'.$property['title'].'"'));
					if(!$row['id']){
					
						preg_match('/<p class="subTitle size14px weightBold">【(.*?)】&nbsp;(.*?)室(.*?)厅(.*?)卫(.*?)阳&nbsp;\|&nbsp;(.*?)<\/p>/is', $infoHtml, $matches);
				
						$property['community'] = mobi_string_filter($matches[1]);//location


						$property['room'] = $matches[2];
						$property['hall'] = $matches[3];
						$property['bathroom'] = $matches[4];
						$decoration = $matches[6];


						preg_match('/<td colspan="2">地址：(.*?)<\/td>/is', $infoHtml, $matches);
						$property['address'] = mobi_string_filter($matches[1]);

						preg_match('/<span class="familyAlpha colorF60 size24px">(.*?)<\/span>/is', $infoHtml, $matches);

						$property['rent'] = $matches[1];

						preg_match('/面积：(.*?)㎡/is', $infoHtml, $matches);

						$property['area'] = $matches[1];

						preg_match('/<td>楼层：(.*?)F\/(.*?)F<\/td>/is', $infoHtml, $matches);
						$property['floors'] = $matches[1];
						$property['floors_total'] = $matches[2];
						preg_match('/<td>朝向：(.*?)<\/td>/is', $infoHtml, $matches);	
						$property['toward'] = $towardData[$matches[1]];			
					
						if($decoration == '普通装修'){
							$decoration = '中等装修';
						}
						$property['decoration'] = $decorationData[$decoration];

						preg_match('/<div class="houseDescription">(.*?)<\/div>/is', $html, $matches);
						$contentHtml = $matches[1];
						preg_match_all('/<img(.*?)\/>/is', $contentHtml, $matches);
						$property['content'] = str_replace($matches[0],'',$contentHtml);

						$property['userid'] = $userid;

						$property['city_id'] = $city_id;
						$property['mode'] = $mode;
						$property['type'] = 1;
						$property['source'] = 1;
						$this->property->addProperty($property);
				 	}
				}	
				sleep(1);			
			}
			sleep(1);
		}
	}
	/**
	 * [赶集网-求租]
	 * @return [type] [description]
	 */
	function gjw_qiuzu(){
		$uriInfo = $this->source(3);			
		$cityInfo = array(
				array('url'=>'/fang2/yanjiao/','id'=>1),
				array('url'=>'/fang2/guan/','id'=>4),
				array('url'=>'/fang2/sanhe/','id'=>3),
				array('url'=>'/fang2/xianghe/','id'=>5),
				array('url'=>'/fang2/zhuozhou/','id'=>2)
			);
		$mode = 2;
		foreach ($cityInfo as $key => $city) {
			$url = $uriInfo['url'].$city['url'];
			$html = $this->util->curlGet($url);			

			preg_match_all('/<dl class="list-noimg clearfix">(.*?)<\/dl>/is',$html, $list, PREG_SET_ORDER);
			foreach ($list as $key => $value) {

				preg_match("/<a id='(.*?)' class='list-title'(.*?)href='(.*?)'(.*?)>/is", $value[1], $matches);
				$url = $uriInfo['url'].$matches[3];
				$html = $this->util->curlGet($url);		


				preg_match('/<div class="leftBox">(.*?)<div class="rightBar">/is', $html, $matches);
				$infoHmlt = $matches[1];
				$member = array();

				preg_match('/<em class="contact-mobile">(.*?)<\/em>/is', $infoHmlt, $matches);
				$member['mobile'] = preg_replace('/\s*/', '', $matches[1]);				

				$userid = 0;
				if($member['mobile']){
					$row = $this->pineryModel->dataFetchRow(array('table'=>'pinery_member_system','where'=>'mobile='.$member['mobile']));
					if($row['id']){
						$userid = $row['id'];
					}else{
						preg_match('/<i class="fc-4b">(.*?)<\/i>/is', $infoHmlt, $matches);
						$member['names'] = mobi_string_filter($matches[1]);
						$userid = $this->member->addSystemAccount($member);
					}		

					if($userid){
						$property = array();
						preg_match('/<h1 class="title-name">(.*?)<\/h1>/is', $infoHmlt, $matches);
						$property['title'] = mobi_string_filter($matches[1]);


						preg_match('/<ul class="basic-info-ul" style="width:auto">(.*?)<\/ul>/is', $infoHmlt, $matches);
						$content = str_replace(array('###','(查看周边高薪工作)'),array('<br/>',''),strip_tags(trim(str_replace('</li>', '###', $matches[1]))));

						
						preg_match('/<i class="f10 pr-5">(.*?)<\/i>/is', $infoHmlt, $matches);
						$property['update_time'] = strtotime(date('Y').'-'.$matches[1]);
						preg_match('/<div class="summary-cont">(.*?)<p class="clear">/is', $infoHmlt, $matches);
						$content .= '描述：'.mobi_string_filter($matches[1]);
						$property['content'] = $content;

						$property['userid'] = $userid;



						$property['city_id'] = $city['id'];
						$property['mode'] = $mode;
						$property['type'] = 1;
						$property['source'] = 1;
						$this->property->addProperty($property);
					}				
				}
				sleep(2);
			}exit;
		}

	}
	/**
	 * [赶集网-求购]
	 * @return [type] [description]
	 */
	function gjw_qiugou(){
		$uriInfo = $this->source(4);			
		$cityInfo = array(
				array('url'=>'/fang4/yanjiao/','id'=>1),
				array('url'=>'/fang4/guan/','id'=>4),
				array('url'=>'/fang4/sanhe/','id'=>3),
				array('url'=>'/fang4/xianghe/','id'=>5),
				array('url'=>'/fang4/zhuozhou/','id'=>2)
			);
		$mode = 4;
		foreach ($cityInfo as $key => $city) {
			$url = $uriInfo['url'].$city['url'];
			$html = $this->util->curlGet($url);			

			preg_match_all('/<dl class="list-noimg clearfix">(.*?)<\/dl>/is',$html, $list, PREG_SET_ORDER);
			foreach ($list as $key => $value) {

				preg_match("/<a id='(.*?)' class='list-title'(.*?)href='(.*?)'(.*?)>/is", $value[1], $matches);
				$url = $uriInfo['url'].$matches[3];
				$html = $this->util->curlGet($url);		


				preg_match('/<div class="leftBox">(.*?)<div class="rightBar">/is', $html, $matches);
				$infoHmlt = $matches[1];
				$member = array();

				preg_match('/<em class="contact-mobile">(.*?)<\/em>/is', $infoHmlt, $matches);
				$member['mobile'] = preg_replace('/\s*/', '', $matches[1]);				

				$userid = 0;
				if($member['mobile']){
					$row = $this->pineryModel->dataFetchRow(array('table'=>'pinery_member_system','where'=>'mobile='.$member['mobile']));
					if($row['id']){
						$userid = $row['id'];
					}else{
						preg_match('/<i class="fc-4b">(.*?)<\/i>/is', $infoHmlt, $matches);
						$member['names'] = mobi_string_filter($matches[1]);
						$userid = $this->member->addSystemAccount($member);
					}		

					if($userid){
						$property = array();
						preg_match('/<h1 class="title-name">(.*?)<\/h1>/is', $infoHmlt, $matches);
						$property['title'] = mobi_string_filter($matches[1]);


						preg_match('/<ul class="basic-info-ul" style="width:auto">(.*?)<\/ul>/is', $infoHmlt, $matches);
						$content = str_replace(array('###','(查看周边高薪工作)'),array('<br/>',''),strip_tags(trim(str_replace('</li>', '###', $matches[1]))));

						
						preg_match('/<i class="f10 pr-5">(.*?)<\/i>/is', $infoHmlt, $matches);
						$property['update_time'] = strtotime(date('Y').'-'.$matches[1]);
						preg_match('/<div class="summary-cont">(.*?)<p class="clear">/is', $infoHmlt, $matches);
						$content .= '描述：'.mobi_string_filter($matches[1]);
						$property['content'] = $content;

						$property['userid'] = $userid;



						$property['city_id'] = $city['id'];
						$property['mode'] = $mode;
						$property['type'] = 1;
						$property['source'] = 1;
						$this->property->addProperty($property);
					}				
				}
				sleep(2);
			}exit;
		}
	}
	/**
	 * [赶集网汽车]
	 * @return [type] [description]
	 */
	function gjw_car(){
		$uriInfo = $this->source(5);		
		//汽车	
		$cityInfo = array(
				array('url'=>'/ershouche/yanjiao/','id'=>1),			
			);
		foreach ($cityInfo as $key => $city) {
			$url = $uriInfo['url'].$city['url'];
			$html = $this->util->curlGet($url);			
			preg_match_all('/<a class="infor-title pt_tit js-title" target="_blank"  href="(.*?)"(.*?)<\/a>/is',$html, $list, PREG_SET_ORDER);
			sleep(1);
			foreach ($list as $key => $value) {

				$url = $value[1];
				$infoHmlt = $this->util->curlGet($url);		

				
				$member = array();

				preg_match('/<span class="contact-col phoneNum-style" name="img-phone">(.*?)<\/span>/is', $infoHmlt, $matches);
				$member['mobile'] = preg_replace('/\s*/', '', $matches[1]);				

				$userid = 0;
				if($member['mobile']){
					$row = $this->pineryModel->dataFetchRow(array('table'=>'pinery_member_system','where'=>'mobile='.intval($member['mobile'])));
					if($row['id']){
						$userid = $row['id'];
					}else{
						preg_match('/<i class="fc-4b">(.*?)<\/i>/is', $infoHmlt, $matches);
						$member['names'] = mobi_string_filter($matches[1]);
						$userid = $this->member->addSystemAccount($member);
					}		
					if($userid){
						$property = array();
						preg_match('/<h1 class="title-name">(.*?)<\/h1>/is', $infoHmlt, $matches);
						$property['title'] = mobi_string_filter($matches[1]);

						preg_match('/<b class="fc-orange f-type ft-22">(.*?)<\/b>/is', $infoHmlt, $matches);

						if($matches[1]){
							$price = strstr($matches[1],'万') ? floatval($matches[1])*10000 : floatval($matches[1]);
						}

						$property['price'] = $price; 

						preg_match('/品牌\/车系：(.*?)<\/li>/is', $infoHmlt, $matches);
						$content = '品牌/车系：'.mobi_string_filter($matches[1]).'<br/>';

						preg_match('/行驶里程：(.*?)<\/li>/is', $infoHmlt, $matches);						
						$content .= '行驶里程：'.mobi_string_filter($matches[1]).'<br/>';

						preg_match('/上牌日期：(.*?)<\/li>/is', $infoHmlt, $matches);						
						$content .= '上牌日期：'.mobi_string_filter($matches[1]).'<br/>';



					

						
						preg_match('/<i class="f10 pr-5">(.*?)<\/i>/is', $infoHmlt, $matches);
						$property['update_time'] = strtotime(date('Y').'-'.$matches[1]);
						preg_match('/<table width="100%" cellspacing="0" cellpadding="0" border="0" class="v-p-table mt-20">(.*?)<\/table>/is', $infoHmlt, $matches);
						$content .= $matches[0];

						preg_match('/车辆说明：(.*?)联系我时/is', $infoHmlt, $matches);
						$content .= '描述：'.mobi_string_filter($matches[1]);



						$property['content'] = $content;

						$property['userid'] = $userid;



						$property['city_id'] = $city['id'];
						$property['type'] = 1;
						$property['source'] = 1;
						
						$this->car->addCar($property);
					}				
				}
				sleep(2);
			}exit;
		}


		//工程车	
		// $cityInfo = array(
		// 		array('url'=>'/gongchengche/yanjiao/','id'=>1),
		// 	);
		// foreach ($cityInfo as $key => $city) {
		// 	$url = $uriInfo['url'].$city['url'];
		// 	$html = $this->util->curlGet($url);			
		// 	preg_match_all('/<a class="infor-title pt_tit" onclick="event.cancelBubble=true;"  class="infor-title01 pt_tit" href="(.*?)"/is',$html, $list, PREG_SET_ORDER);
		// 	sleep(1);
		// 	foreach ($list as $key => $value) {

		// 		$url =  $uriInfo['url'].$value[1];
		// 		$infoHmlt = $this->util->curlGet($url);		

				
		// 		$member = array();

		// 		preg_match('/<span class="contact-col phoneNum-style">(.*?)<\/span>/is', $infoHmlt, $matches);
		// 		$member['mobile'] = preg_replace('/\s*/', '', $matches[1]);				
		// 		$userid = 0;
		// 		if($member['mobile']){
		// 			$row = $this->pineryModel->dataFetchRow(array('table'=>'pinery_member_system','where'=>'mobile='.intval($member['mobile'])));
		// 			if($row['id']){
		// 				$userid = $row['id'];
		// 			}else{
		// 				preg_match('/<i class="fc-4b">(.*?)<\/i>/is', $infoHmlt, $matches);
		// 				$member['names'] = mobi_string_filter($matches[1]);
		// 				$userid = $this->member->addSystemAccount($member);
		// 			}		
		// 			if($userid){
		// 				$property = array();
		// 				preg_match('/<h1 class="title-name">(.*?)<\/h1>/is', $infoHmlt, $matches);
		// 				$property['title'] = mobi_string_filter($matches[1]);

		// 				preg_match('/<b class="fc-orange f-type ft-22">(.*?)<\/b>/is', $infoHmlt, $matches);

		// 				if($matches[1]){
		// 					$price = strstr($matches[1],'万') ? floatval($matches[1])*10000 : floatval($matches[1]);
		// 				}

		// 				$property['price'] = $price; 

		// 				preg_match('/<i class="f10 pr-5">(.*?)<\/i>/is', $infoHmlt, $matches);
		// 				$property['update_time'] = strtotime(date('Y').'-'.$matches[1]);


		// 				preg_match('/所在地：(.*?)<\/li>/is', $infoHmlt, $matches);
		// 				$content = '所在地：'.mobi_string_filter($matches[1]).'<br/>';

		// 				preg_match('/品牌\/车系：(.*?)<\/li>/is', $infoHmlt, $matches);
		// 				$content .= '品牌/车系：'.mobi_string_filter($matches[1]).'<br/>';

		// 				preg_match('/类型：(.*?)<\/div>/is', $infoHmlt, $matches);
		// 				$content .= '类型：'.mobi_string_filter($matches[1]).'<br/>';

		// 				preg_match('/排气量：(.*?)<\/li>/is', $infoHmlt, $matches);
		// 				$content .= '排气量：'.mobi_string_filter($matches[1]).'<br/>';
						

		// 				preg_match('/行驶里程：(.*?)<\/div>/is', $infoHmlt, $matches);						
		// 				$content .= '行驶里程：'.mobi_string_filter($matches[1]).'<br/>';

		// 				preg_match('/上牌日期：(.*?)<\/div>/is', $infoHmlt, $matches);						
		// 				$content .= '上牌日期：'.mobi_string_filter($matches[1]).'<br/>';						
						
		// 				preg_match('/车辆说明 ：(.*?)联系我时/is', $infoHmlt, $matches);
		// 				$content .= '描述：'.mobi_string_filter($matches[1]);



		// 				$property['content'] = $content;

		// 				$property['userid'] = $userid;



		// 				$property['city_id'] = $city['id'];
		// 				$property['type'] = 2;
		// 				$property['source'] = 1;
		// 				$this->car->addCar($property);
		// 			}				
		// 		}
		// 		sleep(2);
		// 	}exit;
		// }
		// 
		// 
		//摩托车
		// $cityInfo = array(
		// 		array('url'=>'/motuoche/yanjiao/','id'=>1),
		// 	);
		// foreach ($cityInfo as $key => $city) {
		// 	$url = $uriInfo['url'].$city['url'];
		// 	$html = $this->util->curlGet($url);			
		// 	preg_match_all('/<li class="js-item"(.*?)<\/a>/is',$html, $list, PREG_SET_ORDER);
		// 	sleep(1);
		// 	foreach ($list as $key => $value) {
		// 		preg_match('/<a href="(.*?)"(.*?)class="ft-tit">/is', $value[1], $matches);
		// 		$url =  $matches[1];
		// 		$infoHmlt = $this->util->curlGet($url);		

				
		// 		$member = array();

		// 		preg_match('/<span class="phoneNum-style">(.*?)<\/span>/is', $infoHmlt, $matches);
		// 		$member['mobile'] = preg_replace('/\s*/', '', $matches[1]);				
		// 		$userid = 0;
		// 		if($member['mobile']){
		// 			$row = $this->pineryModel->dataFetchRow(array('table'=>'pinery_member_system','where'=>'mobile='.intval($member['mobile'])));
		// 			if($row['id']){
		// 				$userid = $row['id'];
		// 			}else{
		// 				preg_match('/人：(.*?)<span class="fc-orange">/is', $infoHmlt, $matches);
		// 				$member['names'] = mobi_string_filter($matches[1]);
		// 				//$userid = $this->member->addSystemAccount($member);
		// 			}		
		// 			//if($userid){
		// 				$property = array();
		// 				preg_match('/<h1 class="title-name">(.*?)<\/h1>/is', $infoHmlt, $matches);
		// 				$property['title'] = mobi_string_filter($matches[1]);

		// 				preg_match('/<i class="f22 fc-orange f-type">(.*?)<\/i>/is', $infoHmlt, $matches);

						

		// 				$property['price'] = $matches[1]; 

		// 				preg_match('/<i class="pr-5">(.*?)&nbsp;/is', $infoHmlt, $matches);
		// 				$property['update_time'] = strtotime(date('Y').'-'.trim($matches[1]));


		// 				preg_match('/交易地点：(.*?)<\/li>/is', $infoHmlt, $matches);
		// 				$content = '交易地点：'.mobi_string_filter($matches[1]).'<br/>';

						
		// 				preg_match('/类　　型：(.*?)<\/li>/is', $infoHmlt, $matches);
		// 				$content .= '类型：'.mobi_string_filter($matches[1]).'<br/>';

											
						
		// 				preg_match('/<div class="js-tab-content">(.*?)联系我时/is', $infoHmlt, $matches);
		// 				$content .= '描述：'.mobi_string_filter($matches[1]);



		// 				$property['content'] = $content;

		// 				$property['userid'] = $userid;



		// 				$property['city_id'] = $city['id'];
		// 				$property['type'] = 5;
		// 				$property['source'] = 1;
		// 				var_dump($member,$property);exit;
		// 				$this->car->addCar($property);
		// 			//}				
		// 		}
		// 		sleep(2);
		// 	}exit;
		// }
		// //自行车
		// $cityInfo = array(
		// 		array('url'=>'/zixingchemaimai/yanjiao/','id'=>1),
		// 	);
		// foreach ($cityInfo as $key => $city) {
		// 	$url = $uriInfo['url'].$city['url'];
		// 	$html = $this->util->curlGet($url);			
		// 	preg_match_all('/<li class="js-item"(.*?)<\/a>/is',$html, $list, PREG_SET_ORDER);
		// 	sleep(1);
		// 	foreach ($list as $key => $value) {
		// 		preg_match('/<a href="(.*?)"(.*?)class="ft-tit">/is', $value[1], $matches);
		// 		$url =  $matches[1];
		// 		$infoHmlt = $this->util->curlGet($url);		

				
		// 		$member = array();

		// 		preg_match('/<span class="phoneNum-style">(.*?)<\/span>/is', $infoHmlt, $matches);
		// 		$member['mobile'] = preg_replace('/\s*/', '', $matches[1]);				
		// 		$userid = 0;
		// 		if($member['mobile']){
		// 			$row = $this->pineryModel->dataFetchRow(array('table'=>'pinery_member_system','where'=>'mobile='.intval($member['mobile'])));
		// 			if($row['id']){
		// 				$userid = $row['id'];
		// 			}else{
		// 				preg_match('/人：(.*?)<span class="fc-orange">/is', $infoHmlt, $matches);
		// 				$member['names'] = mobi_string_filter($matches[1]);
		// 				//$userid = $this->member->addSystemAccount($member);
		// 			}		
		// 			//if($userid){
		// 				$property = array();
		// 				preg_match('/<h1 class="title-name">(.*?)<\/h1>/is', $infoHmlt, $matches);
		// 				$property['title'] = mobi_string_filter($matches[1]);

		// 				preg_match('/<i class="f22 fc-orange f-type">(.*?)<\/i>/is', $infoHmlt, $matches);

						

		// 				$property['price'] = $matches[1]; 

		// 				preg_match('/<i class="pr-5">(.*?)&nbsp;/is', $infoHmlt, $matches);
		// 				$property['update_time'] = strtotime(date('Y').'-'.trim($matches[1]));


		// 				preg_match('/交易地点：(.*?)<\/li>/is', $infoHmlt, $matches);
		// 				$content = '交易地点：'.mobi_string_filter($matches[1]).'<br/>';

						
		// 				preg_match('/类　　型：(.*?)<\/li>/is', $infoHmlt, $matches);
		// 				$content .= '类型：'.mobi_string_filter($matches[1]).'<br/>';

											
						
		// 				preg_match('/<div class="js-tab-content">(.*?)联系我时/is', $infoHmlt, $matches);
		// 				$content .= '描述：'.mobi_string_filter($matches[1]);



		// 				$property['content'] = $content;

		// 				$property['userid'] = $userid;



		// 				$property['city_id'] = $city['id'];
		// 				$property['type'] = 5;
		// 				$property['source'] = 1;
		// 				var_dump($member,$property);exit;
		// 				$this->car->addCar($property);
		// 			//}				
		// 		}
		// 		sleep(2);
		// 	}exit;
		// }
	}
	/**
	 * [source description]
	 * @return [type] [description]
	 */
	function source($key=null){
		$sourceData[1] = array('key'=>'zzfc_sale','name'=>'涿州房产网-出售','url'=>'http://www.zhuozhoufangchan.com/');
		$sourceData[] = array('key'=>'zzfc_rent','name'=>'涿州房产网-出租','url'=>'http://www.zhuozhoufangchan.com/');
		$sourceData[] = array('key'=>'gjw_qiuzu','name'=>'赶集网-求租','url'=>'http://bj.ganji.com');
		$sourceData[] = array('key'=>'gjw_qiugou','name'=>'赶集网-求购','url'=>'http://bj.ganji.com');
		$sourceData[] = array('key'=>'gjw_car','name'=>'赶集网-车辆','url'=>'http://bj.ganji.com');
		// $sourceData[] = array('key'=>'city58','name'=>'58同城','url'=>'http://bj.58.com/');
		// $sourceData[] = array('key'=>'ajk','name'=>'安居客','url'=>'http://beijing.anjuke.com/');
		
		if($key){
			return $sourceData[$key];
		}else{
			return $sourceData;
		}
	}
	/**
	 * [exec description]
	 * @return [type] [description]
	 */
	function ido(){
		$sid = $_POST['sid'];
		$sourceInfo = $this->source($sid);
		if($sourceInfo){
			$this->$sourceInfo['key']();
		}
	}
}		