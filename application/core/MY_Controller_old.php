<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MY_Controller extends CI_Controller {

    public $uid;
    public $priv;

	public function __construct()
    {
        parent::__construct();
        $this->CI =& get_instance();
        $this->CI->load->model('Data_model');
        $this->load->helper('url');
        //加载验证类
        $this->load->library(array('form_validation','pagination'));
        $this->is_login();

        $this->priv =$this->getPurs('',1);
        $this->load->vars('priv',$this->priv);
        if($this->uid != 1){//超级管理员不用验证  admin 123456
            $this->checkPurview();
        }else{

        }
    }

    // 判断是否已经登陆
    protected function is_login(){
    	if($_SESSION['middler'] == null) {
            redirect(site_url('/login/index'));
        }
        $this->uid        = intval($_SESSION['middler']['id']);
        $this->mobile     = $_SESSION['middler']['mobile'];
        $this->group_id   = intval($_SESSION['middler']['user_group_id']);
        $this->username   = $_SESSION['middler']['username'];
        $this->company_id = intval($_SESSION['middler']['company_id']);
        //print_r($_SESSION['middler']);
    }

    // 判断是否有权限
    protected function checkPurview(){
        //获取url
        $class = $this->CI->uri->segment(1);
        $method = $this->CI->uri->segment(2);
        $class = $class ? $class : 'home';
        $method = $method ? $method : 'index';
        $class = strtolower($class);
        $method = strtolower($method);
        $route = '/' . $class . '/' . $method;
        $this->load->vars('route',$route);

        //获取权限信息
        $url_wh = array();
        $url_wh['url'] = trim($route);
        $url_wh['status'] = 1;
        $url_wh['type'] = 1;
        $url = $this->Data_model->getSingle($url_wh,'user_rule');
        //获取用户权限
        $user_group_wh = array();
        $user_group_wh['id'] = $this->group_id;
        $user_group = $this->Data_model->getSingle($user_group_wh,'user_group');


        if(!$user_group['rule']){
            echo "<script>alert('无权访问');history.back();</script>";
            exit();
        }
        $user_rule = explode(',',$user_group['rule']);
        $this->priv =$this->getPurs($user_rule);
        $this->load->vars('priv',$this->priv);

        if(in_array($url['id'],$user_rule)){
            return true;
        }else{
            if($this->input->is_ajax_request()){
                echo json_encode(array('s'=>0,'msg'=>'无权操作'));
                exit();
            }else{
                echo "<script>alert('无权访问');history.back();</script>";
                exit();
            }
        }
    }

    protected function insert_order_log($order_id,$uid,$msg){
        $insert_data = array();
        $insert_data['order_id'] = $order_id;
        $insert_data['user_id'] = $uid;
        $insert_data['action'] = $msg;
        $insert_data['create_time'] = time();
        $res = $this->Data_model->addData($insert_data,'order_log');
        if($res){
            return  $res;
        }else{
            return null;
        }
    }

    //获得权限数组
    private function getPurs($rule,$admin=0){
        $where = array();
        $where['id'] = $rule;
        $where['status'] = 1;

        if($admin){
            $where = array();
        }
        $data_order = 'id asc';
        $rule_arr = $this->Data_model->getData($where,$data_order,0,0,'user_rule','url');
        $ret = array();
        foreach ($rule_arr as $key => $value) {
            $ret[] = $value['url'];
        }
        return $ret;
    }

    public function sendSMS($mobile, $code){
        //时区设置：亚洲/上海
        date_default_timezone_set('Asia/Shanghai');
        require APPPATH.'/libraries/Alidayu/TopClient.php';
        require APPPATH.'/libraries/Alidayu/ResultSet.php';
        require APPPATH.'/libraries/Alidayu/RequestCheckUtil.php';
        require APPPATH.'/libraries/Alidayu/TopLogger.php';
        require APPPATH.'/libraries/Alidayu/AlibabaAliqinFcSmsNumSendRequest.php';
        $c = new \TopClient;
        $config = array();
        //短信内容：公司名/名牌名/产品名
        $product = '慢吞吞之家';//$config['sms_product'];
        //App Key的值 这个在开发者控制台的应用管理点击你添加过的应用就有了
        $c->appkey = '23536262';//$config['sms_appkey'];
        //App Secret的值也是在哪里一起的 你点击查看就有了
        $c->secretKey = 'faf94fe13da1f4a57233a49c91c711d1';//$config['sms_secretKey'];
        //这个是用户名记录那个用户操作
        $req = new \AlibabaAliqinFcSmsNumSendRequest;
        //代理人编号 可选
        $req->setExtend("123456");
        //短信类型 此处默认 不用修改
        $req->setSmsType("normal");
        //短信签名 必须
        $req->setSmsFreeSignName("慢吞吞之家");
        //短信模板 必须
        $req->setSmsParam("{\"code\":\"$code\",\"product\":\"$product\"}");
        //短信接收号码 支持单个或多个手机号码，传入号码为11位手机号码，不能加0或+86。群发短信需传入多个号码，以英文逗号分隔，
        $req->setRecNum("$mobile");
        //短信模板ID，传入的模板必须是在阿里大鱼“管理中心-短信模板管理”中的可用模板。
        $config['sms_templateCode'] = 'SMS_26095230';
        $req->setSmsTemplateCode($config['sms_templateCode']); // templateCode

        $c->format='json';
        //发送短信
        $resp = $c->execute($req);
        //短信发送成功返回True，失败返回false
        //if (!$resp)
        if ($resp && $resp->result)   // if($resp->result->success == true)
        {

            // 从数据库中查询是否有验证码
            $data = $this->Data_model->getSingle("code = '$code' and add_time > ".(time() - 60*60),'sms_log');
            // 没有就插入验证码,供验证用
            empty($data) && $this->Data_model->addData(array('mobile' => $mobile, 'code' => $code, 'add_time' => time(), 'session_id' =>$this->uid),'sms_log' );
            return true;
        }
        else
        {
            return false;
        }
    }

    public function sms_log($mobile,$code,$session_id){
        //判断是否存在验证码
        $data = $this->Data_model->getSingle(array('mobile'=>$mobile,'session_id'=>$session_id),'sms_log');
        //获取时间配置
        $sms_time_out = 120;
        //120秒以内不可重复发送
        if($data && (time() - $data['add_time']) < $sms_time_out)
            return array('status'=>-1,'msg'=>$sms_time_out.'秒内不允许重复发送');

        $row = $this->Data_model->addData(array('mobile'=>$mobile,'code'=>$code,'add_time'=>time(),'session_id'=>$session_id),'sms_log');
        if(!$row)
            return array('status'=>-1,'msg'=>'发送失败');
        //$send = sendSMS($mobile,'您好，你的验证码是：'.$code);
        $send = $this->sendSMS($mobile,$code);
        if(!$send)
            return array('status'=>-1,'msg'=>'发送失败');
        return array('status'=>1,'msg'=>'发送成功');
    }

    /**
     * 短信验证码验证
     */
    public function sms_code_verify($mobile,$code,$session_id){
        //判断是否存在验证码
        //echo $mobile,$code,$session_id;exit;
        $data = $this->Data_model->getSingle(array('mobile'=>$mobile,'session_id'=>$session_id,'code'=>$code),'sms_log');
        if(empty($data))
            return array('status'=>-1,'msg'=>'手机验证码不匹配');

        //获取时间配置
        $sms_time_out = 120;
        //验证是否过时
        if((time() - $data['add_time']) > $sms_time_out)
            return array('status'=>-1,'msg'=>'手机验证码超时'); //超时处理

        $this->Data_model->delData($data['id'],'sms_log');
        return array('status'=>1,'msg'=>'验证成功');
    }

    //导出
    public function exports($name,$title,$content){
        $this->load->library('Excels');
        $this->excels->exports($content,$title,$name);
    }

    // 获取汇率
    //参数：平台id ，卖家公司id
    protected function get_rate($platform_id,$com_id){
        $rate_table = 'company_rate a';
        $rate_join = array();
        $rate_join[] = array('currency b','b.id = a.currency_id','left');
        $rate_join[] = array('platform c','c.currency_id = b.id','left');
        $rate_wh = array();
        $rate_wh['c.id'] = $platform_id;
        $rate_wh['a.company_id'] = (int)$com_id;
        $rate_wh['a.status'] = 1;
        $rate_fields = 'a.id,a.real_rate,b.name,b.rate,b.code';
        $rate_order = '';
        $rate_group = '';
        $rate_first = 0;
        $rate_num = 0;
        $rate_info = $this->Data_model->getJoinData($rate_table, $rate_join, $rate_wh, $rate_fields, $rate_order, $rate_group, $rate_first, $rate_num);
        if($rate_info){
            $rate = $rate_info[0];
            return floatval($rate_info[0]['rate']) + floatval($rate_info[0]['real_rate']);
        }else{
            return null;
        }
    }

    // 获取卖家费率
    protected function get_saller_price($com_id){
        $price = $this->Data_model->getSingle(array('company_id'=>(int)$com_id),'company_price');
        if($price){
            return $price;
        }else{
            return null;
        }
    }

    //获取平台名字
    protected function get_platform_name($platform_id) {
        $platform = $this->Data_model->getSingle(array('id'=>(int)$platform_id),'platform');
        if($platform){
            return $platform['name'];
        }else{
            return null;
        }
    }

    //获取平台网址
    protected function get_platform_url($platform_id) {
        $platform = $this->Data_model->getSingle(array('id'=>(int)$platform_id),'platform');
        if($platform){
            return $platform['url'];
        }else{
            return null;
        }
    }

    //获取店铺名字
    protected function get_shop_name($shop_id) {
        $shop = $this->Data_model->getSingle(array('id'=>(int)$shop_id),'store');
        if($shop){
            return $shop['name'];
        }else{
            return null;
        }
    }

    //获取任务信息
    protected function get_product_info($id){
        $order_table = 'product a';
        $order_join = array();
        $order_join[] = array('platform b','b.id = a.platform','left');
        $order_join[] = array('store c','c.id = a.execute_shop','left');
        $order_wh = array();
        $order_wh['a.id'] = intval($id);
        $order_fields = 'a.id,a.bind_ASIN,a.platform,a.execute_shop,b.name as platform_name,a.ASIN,a.bind_product,
                        a.price,a.discount,a.dprice,a.shipping,c.name as shop_name,b.url as platform_url,
                        a.coupon,a.key_word,a.collection,a.gift,a.type,a.fast_comment,a.finish_number,a.commrate,a.remarks';
        $order_order = '';
        $order_group = '';
        $order_first = 0;
        $order_num = 0;
        $order_info = $this->Data_model->getJoinData($order_table, $order_join, $order_wh, $order_fields, $order_order, $order_group, $order_first, $order_num);
        $back_data = array();
        if($order_info){
            $back_data = $order_info[0];
            $back_data['type'] = $back_data['type'] == '1'? '刷单' : '刷评';
            $str = array();
            if($back_data['fast_comment'] == '1'){
                $str[] = '快速上评';
            }
            if($back_data['collection'] == '1'){
                $str[] = '加入收藏';
            }
            $back_data['task_claim'] = $str;
            if(count($str) > 0){
                $back_data['task_claim'] = implode(',',$str);
            }
            $back_data['fast_comment'] = $back_data['fast_comment'] == '1'? '快速上评' : '';
            $back_data['collection'] = $back_data['collection'] == '1'? '加入收藏' : '';
            return $back_data;
        }else{
            return null;
        }
    }

    //获取该中介下所以的成员
    protected function get_company_member(){
        $com_wh = array();
        $com_wh['company_id'] = $this->company_id;
        $order_by = '';
        $com_people = $this->Data_model->getData($com_wh,$order_by,0,0,'user');
        if($com_people){
            return $com_people;
        }else{
            return null;
        }
    }

    //发送通知给卖家
    protected function send_notice($msg,$company_id) {
        //获取接受人
        $com_wh = array();
        $com_wh['company_id'] = (int)$company_id;
        $com_wh['type'] = 2;
        $order_by = '';
        $receive_user = $this->Data_model->getData($com_wh,$order_by,0,0,'user');
        if($receive_user){
            //发送的消息数据
            $_msg = array();
            $_msg['message_type_id'] = 1;
            $_msg['title'] = $msg['title'];
            $_msg['content'] = $msg['content'];
            $_msg['sender'] = $this->uid;
            $_msg['create_time'] = time();
            $_msg['company_id'] = (int)$company_id;
            $this->db->trans_start();
            // 插入消息数据
            $this->db->set($_msg)->insert('message');
            $msg_id = $this->db->insert_id();
            // 插入收信人表
            foreach($receive_user as $a) {
                $accp_data = array();
                $accp_data['message_id'] = intval($msg_id);
                $accp_data['accepter'] = intval($a['id']);
                $this->db->set($accp_data)->insert('message_link');
            }
            $this->db->trans_complete();
            if ($this->db->trans_status() === FALSE){
               return 2;
            }else{
                return 1;
            }
        }
    }

    //查询平台
    protected function query_platform($where = null){
        $table = 'platform a';
        $join = array();
        $join[] = array('currency b','b.id = a.currency_id','left');
        $where['a.status'] = 1;
        $where['b.status'] = 1;
        $fields = 'a.id,a.name,a.url,b.name as currency,b.code,b.rate,a.create_time';
        $order = 'a.id asc';
        $group = '';
        $first = 0;
        $num = 0;
        $list = $this->Data_model->getJoinData($table, $join, $where, $fields, $order, $group, $first, $num);

        return $list;
    }

    //查询公司的平台
    protected function query_middler_platform($company_id = '',$first = 0,$num = 0){
        $list = array();
        if($company_id == ''){
            return $list;
        }else{
            //公司平台信息
            $table = 'com_platform a';
            $join = array();
            $join[] = array('platform b','b.id = a.platform_id','left');
            $join[] = array('currency c','c.id = b.currency_id','left');
            $where = array();
            $where['a.company_id'] = $company_id;
            $where['a.status'] = 1;
            $where['b.status'] = 1;
            $where['c.status'] = 1;
            $fields = 'b.id,b.name,b.url,c.name as currency,c.code,c.rate,a.task_start,a.task_end,b.create_time';
            $order = 'b.id asc';
            $group = '';
            $first = $first;
            $num = $num;
            $list = $this->Data_model->getJoinData($table, $join, $where, $fields, $order, $group, $first, $num);

            return $list;
        }
    }

    //获取用户名
    protected function get_user_name($uid){
        $user = $this->Data_model->getSingle(array('id' => intval($uid)),'user');
        if($user){
            return $user['username'];
        }else{
            return '';
        }
    }

    //获取平台货币
    protected function get_currency($platform_id = ''){
        $code = '￥';
        if($platform_id){
            $pt_wh = array();
            $pt_wh['a.id'] = $platform_id;
            $pt_info = $this->query_platform($pt_wh);
            $code = $pt_info[0]['code'];
        }

        return $code;
    }

    //计算预上评时间
    protected function get_expect_comment_time($platform_id = '',$is_fast = ''){
        $time = time();
        $today = strtotime(date('Y-m-d',$time));
        $expect_comment_time = $today;

        //美国 15天/20天 其他 20天/25天
        if($platform_id == 1){
            if($is_fast == 1){
                $expect_comment_time = $today + 86400 * 15;
            }else{
                $expect_comment_time = $today + 86400 * 20;
            }
        }else{
            if($is_fast == 1){
                $expect_comment_time = $today + 86400 * 20;
            }else{
                $expect_comment_time = $today + 86400 * 25;
            }
        }

        return $expect_comment_time;
    }

    //代替字符串空格
    protected function emptyreplace($str,$s) {
        $str = str_replace('　', ' ', $str);
        $str = str_replace(' ', ' ', $str);
        $noe = false;
        for ($i=0 ; $i<strlen($str); $i++) {
            if($noe && $str[$i]==' ') $str[$i] = $s;
            elseif($str[$i]!=' ') $noe=true;
        }
        return $str;
    }
}
