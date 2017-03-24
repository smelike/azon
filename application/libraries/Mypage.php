<?php  
defined('BASEPATH') OR exit('No direct script access allowed');
class Mypage {  
    protected $CI;
    private $page;           //当前页码  
    private $pagenum;      //总页码  
    private $url;
    private $num = 4;           //地址  
    
      //构造方法初始化  
    public function __construct() {  
        $this->CI =& get_instance();
        $get = $this->CI->input->get();
        if(!isset($get['page'])){
            $this->page = 1;
        }elseif(empty($get['page']) || $get['page'] == 0){
            $this->page = 1;
        }else{
            $this->page = intval($get['page']);
        }
    }  
    
    public function next(){
        $str = '';
        $next = $this->num;
        for ($i=1; $i < $next; $i++) { 
            $p = $this->page + $i ;
            if($p <= $this->pagenum){
                $str .= '<li><a href="'.$this->url.$p.'">'.$p.'</a></li>';
            }
        }
        return $str;
    }

    public function current(){
        $str = '<li class="active"><a href="'.$this->url.$this->page.'">'.$this->page.'</a></li>';
        return $str;
    }

    public function first(){
        if($this->page - ($this->num-0) > 0){
            $p =$this->page-1;
            $str = '<li><a href="'.$this->url.$p.'">上一页</a></li><li><a href="javascript:;">...</a></li>';
        }else{
            $str = '';
        }
        return $str;
    }

    public function last(){
        if($this->page + ($this->num-1) < $this->pagenum){
            $p =$this->page+1;
            $str = '<li><a href="javascript:;">...</a></li><li><a href="'.$this->url.$p.'">下一页</a></li>';
        }else{
            $str = '';
        }
        return $str;
    }

    public function prev(){
        $str = '';
        $arr = array();
        $next = $this->num;
        for ($i=1; $i < $next; $i++) { 
            $p = $this->page - $i ;
            array_push($arr, $p);
            
        }
        asort($arr);
        foreach ($arr as $v) {
            if(intval($v) > 0){
                $str .= '<li><a href="'.$this->url.$v.'">'.$v.'</a></li>';
            }
        }
        return $str;
    }

    public function echoPage($c,$r){
        $this->pagenum = ceil($c/$r);
        $url = current_url();
        if(stristr($url,'?')){
            $this->url = $url.'&page=';
        }else{
            $this->url = $url.'?page=';
        }
        $strH = '<ul class="pagination">';
        $strF = '</ul>';
        $str = $strH.$this->first().$this->prev().$this->current().$this->next().$this->last().$strF;
        return $str;
    }
    
 }  
?>