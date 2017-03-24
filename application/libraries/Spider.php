<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Spider{
	
	protected $CI;
	public $num;

    // We'll use a constructor, as you can't directly call a function
    // from a property definition.
    public function __construct()
    {
        // Assign the CodeIgniter super-object
        $this->CI =& get_instance();

    }

	//物流跟踪号查询
	public function kuaidi100($num){
		$this->num = $num;
		$url	=	"http://www.kuaidi100.com/autonumber/autoComNum?text=".$this->num;//post;
		
		$data	=	$this	->	SpiderCurl($url);
		if($data){
			$autonumber	=	json_decode($data);
			$auto	=	$autonumber->auto;//print_r($auto);
			$type	=	$auto[0]->comCode;
			$url2	=	"http://www.kuaidi100.com/query?type=$type&postid=$this->num&id=1&valicode=&temp=0.25266661930392975";//gete
			//echo $url2;http://www.kuaidi100.com/query?type=ems&postid=L&id=1&valicode=&temp=0.25266661930392975
			$numid	=	$this	->	SpiderCurl($url2);

			$numid	=	json_decode($numid);
			if($numid->status != 200 )return false;
			
			$context	=	$numid->data[0]->context;
			if(strpos($context,'妥投') !==false){
				return 2;//'妥投';
			}else{
				return 1;//'上线';
			}

		}else{
				return false;
		}
		
	}
	//抓取汇率
	public function boc(){

		$currencys	=	array(
						'1'=>"1316",
						'2'=>"1326",
						'3'=>"1314",
						'4'=>"1323",
						'5'=>"1324");
		$header		=	array(
						'Accept-Language:zh-CN,zh;q=0.8,en;q=0.6',
						'User-Agent:Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/54.0.2840.59 Safari/537.36');		
		$url		=	'http://srh.bankofchina.com/search/whpj/search.jsp';	
		
		$rate =	array();
		foreach($currencys as $key=>$currency){
			$data		=	'erectDate='.date('Y-m-d').'&nothing='.date('Y-m-d').'&pjname='.$currency.'&page=1';
			$content	=	$this->mcurl($header,$url,$data);
			$content	=	mb_convert_encoding($content, 'utf-8', 'GBK,UTF-8,ASCII');			
			preg_match_all('/<table[^>]+>(.*)<\/table>/isU', $content, $name);
			
			preg_match_all("/<td.*>(.*)<\/td>/isU", $name[0][1], $trname);
			
			$rates	=	isset($trname[0][5])?$trname[0][5]:0;	
			
			$rate[$key] = str_replace('</td>','',str_replace('<td>','',$rates));
			sleep(1);	//延时一秒 防止被屏蔽		
		}

		return $rate;
	}

		
	//抓取amazon评论
	public function customer($num){
		
		$header		=	array(
				'Accept-Language:zh-CN,zh;q=0.8,en;q=0.6',
				'User-Agent:Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/54.0.2840.59 Safari/537.36');
		$url		=	'https://www.amazon.com/gp/customer-reviews/'.$num;

		$content	=	$this->mcurl($header,$url);	
		if(strpos($content, '<div class="crReviewHeader">Customer Review</div>')){
			return true;
		}
		return false;
	}
	
	//抓快递100的包
	public function SpiderCurl($url){

		// 构造包头，模拟浏览器请求
		$header = array (
				"Host:www.kuaidi100.com",
				"Content-Type:application/x-www-form-urlencoded",//post请求
				"Connection: keep-alive",
				'Referer:https://www.kuaidi100.com/',
				'User-Agent: Mozilla/5.0 (compatible; MSIE 9.0; Windows NT 6.1; WOW64; Trident/5.0; BIDUBrowser 2.6)'
		);
		$ch = curl_init ();
		curl_setopt ( $ch, CURLOPT_URL, $url );
		curl_setopt ( $ch, CURLOPT_HTTPHEADER, $header );
		curl_setopt ( $ch, CURLOPT_RETURNTRANSFER, 1 );
		// 执行
		$content = curl_exec ( $ch );
		if ($content == FALSE) {
			echo "error:" . curl_error ( $ch );
			return false;
		}
		// 关闭
		curl_close ( $ch );

		//输出结果
		//print_r(json_decode($content));
		return $content;
		
	}
	
	public function mcurl($header,$url,$data=array()){

		$ch = curl_init ();
		
		if(strpos($url, 'https://') == false){
			curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false); // 跳过证书检查  
		}
		curl_setopt ( $ch, CURLOPT_URL, $url );
		curl_setopt ( $ch, CURLOPT_HTTPHEADER, $header );
		curl_setopt ( $ch, CURLOPT_RETURNTRANSFER, 1 );
		
		if(!empty($data)){
			curl_setopt( $ch, CURLOPT_POST, 1);
			curl_setopt( $ch, CURLOPT_POSTFIELDS, $data );
		}
		// 执行
		$content = curl_exec ( $ch );
		if ($content == FALSE) {
			echo "error:" . curl_error ( $ch );
			return false;
		}
		// 关闭
		curl_close ( $ch );

		//输出结果
		//print_r(json_decode($content));
		return $content;
	}
	
}
