<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Balance{
	
	protected $CI;
	public $num;

    // We'll use a constructor, as you can't directly call a function
    // from a property definition.
    public function __construct()
    {
        // Assign the CodeIgniter super-object
        $this->CI =& get_instance();

    }
	
	public function bills(){
		
		
	}
	
		//数据统计定时脚本bills
	/*
	1、中介，
		人工刷评、人工刷单、加入收藏、关联访问、评价点赞、物流单号、快速上评、平台佣金、订单回款
	2、卖家
		人工刷评、人工刷单、加入收藏、关联访问、评价点赞、物流单号、快速上评、平台佣金、订单回款
	
	
	*/
	/*
	//用户充值记录
		卖家名称 订单号（流水号）	项目	时间	状态	操作人	金额	余额
		
	//----定时扣子订单的金额
	//加入到中介的账户待收款余额
		====卖家名称，产品编号，流水号，子任务编号，金额， 时间 ，类型（订单扣费）
	//----定时退回订单的金额（订单未刷完，退还未刷的部分，订单异常退回全部）
	//退回到卖家的账户余额
		====卖家账户，产品编号，流水号，子任务编号，金额，时间，类型（中介未执行，退回）
	//中介的余额每天结算一次，扣除中介的提款金额
		====中介名称， 收款账户，收款金额，收款时间 状态（已转帐，未转账）。
		
	中介名称，账户余额， 可提现余额。
	卖家名称，账户余额。*/
}