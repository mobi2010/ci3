<?php if (!defined('BASEPATH')) exit('No direct script access allowed'); 
/**
 * 分页
 */
 class Page {
  /**
   * [分页]
   * @param  [array] $pages [分页参数]
   * array(
   * sum => 1000,//记录总数
   * size => 10, //每页显示的记录数
   * psize => 8,//显示的页数
   * pn =>'p',//参数名如：&p=1
   * unset => array('p'),//没用的参数
   * )
   * 
   * @return [string]        [html]
   */
  function show($pages=array()){    
     $html = null;
     $sum = $pages["sum"]>0 ? $pages["sum"] : 0; //记录总数     
     $size = $pages["size"]>0 ? $pages["size"] : 15; //每页显示的记录数
     $psum = ceil($sum/$size);//总页数
     if($sum > 0 && $psum > 1){
       ############################参数      
       $pn = $pages['pn'] ? $pages['pn'] : 'p';
       $p = $pages[$pn] ? $pages[$pn] : $_GET[$pn]; //当前页码
       $p = $p > 0 ? $p : 1;
       $psize = $pages["psize"]>0 ? $pages["psize"] : 6; //显示的页数
       $url = $pages['url'] ? $pages['url'] : "?"; //链接地址
       $unset = $pages['unset'] ? $pages['unset'] : array($pn);//需要upset掉的参数
       ############################链接参数
       $url .= $this->queryString($unset);
       //###############页面显示    
         $html .= '<div class="tc pageStyle w clearfix pt20">';       
         $psize = $psize > $psum ? $psum : $psize; //显示的页数
         $pj = 3;//自动翻转的基数
         if($p+$psize > $psum){     
         $c = ($p+$psize -$psum);
         $c = $c >$pj ? $c : ($pj+1);
         $pg = $p-$c+1;
        }elseif($p > $pj && $p<$psum){
         $pg = $p-$pj;
        } 
         $pg = $pg >0 ? $pg : 1;       
         //上页
        $purl =  $p > 1 ? $url.'&'.$pn.'='.($p-1) : null;
        $html .= '<a class="previous" href="'.$purl.'#userNav"><span class="hidden">previous</span></a>';        
        $html .= $pg > 1 ? '<a href="'.$url.'&'.$pn.'=1">1</a>...' : null;           
         for($i=0;$i<$psize;$i++){
            $pi = $i+$pg;
            if($p == $pi){
               $html .= "<a class='on'>{$pi}</a>";
            }else{
               $html .= "<a href='{$url}&{$pn}={$pi}#userNav'>{$pi}</a>";
            }
         }   
         $html .= ($pg+$psize-1) < $psum ? "...<a href='{$url}&{$pn}={$psum}#userNav'>{$psum}</a>" : null;    
         $aurl .= $p < $psum ? $url.'&'.$pn.'='.($p+1) : null;
         $html .= '<a class="next" href="'.$aurl.'#userNav"><span class="hidden">next</span></a>';
         $html .= '</div>';
     }
     return $html;
}
   //请求参数
   function queryString($unset=""){
     $query_stirng = $_GET;
     $str = null;
     if(is_array($unset)){
        foreach ($unset as $k=>$v){
          unset($query_stirng[$v]);
        }    
     }
     $str .= http_build_query($query_stirng);
     return $str;
  }

}
?>