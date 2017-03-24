<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Emailcode{

	private $code;
	//验证码的随机种子
	private $codeStr='23456789abcdefghjkmnpqrstuvwsyz';
	//验证码长度
	private $codeLen=4;

	public function __construct()
	{
		$this->CI =& get_instance();
	}

	//生成验证码
	private function createCode() {
		$code = '';
		for ($i = 0; $i < $this->codeLen; $i++) {
			$code .= $this->codeStr [mt_rand(0, strlen($this->codeStr) - 1)];
		}
		$this->code = strtoupper($code);
		return $this->code;
	}

	// 保存验证码
	public function saveEamilCode($email){
		$code = $this->createCode();
		$create_time = time();
		$end_time = $create_time + 60*60*24;
		$data = array(
				'code' => $code,
				'account' => $email,
				'create_time' => $create_time,
				'end_time' => $end_time,
		);
		return $this->CI->db->insert('email_code', $data);
	}

	// 获取验证码
	public function getEmailCode($email){
		$nowTime = time();
		$this->CI->db->select('code');
		$this->CI->db->from('email_code');
		$this->CI->db->where('account',$email);
		$this->CI->db->where('end_time >',$nowTime);
		$this->CI->db->order_by('end_time','desc');
		$query = $this->CI->db->get();
		return $query->row()->code;
	}

}