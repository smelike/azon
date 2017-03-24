<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Data_model extends CI_Model
{
	var $table;
	public function __construct(){
		parent::__construct();
	}

	public function setTable($table)
	{
		$this->table = $table;
	}
	
	//设置刷评任务，上评的频率。
	function setcommentrate($id){
		$product = $this->db->get_where('product',array('id'=>$id))->result_array();
		$sp = ceil($product[0]['number'] * $product[0]['proportion']);
		$maxcomment = $product[0]['maxcomment'];
		$data = array();
		if($maxcomment <= 0)return ;
		while(true){
			
			$day = rand(0,$maxcomment);
			$sp = $sp	- $day;
			if($sp >= 0){
				$dayarray	=	array(
					'ASIN' => $product[0]['ASIN'],
					'productid' => $product[0]['id'],
					'number'	=> $day
				);
				$data[] = $dayarray;
				
			}else{
				break;
			}


		}
		$this->db->insert_batch('ck_p_comments', $data); 
		return $this->db->affected_rows();
	}

	function setWhere($getwhere){
		if(is_array($getwhere)){
			foreach($getwhere as $key=>$where){
				if($key=='findinset'){

					$this->db->where("1","1 AND FIND_IN_SET($where)",FALSE);
					continue;
				}
				if(is_array($where)){
					$this->db->where_in($key, $where);
				}else{
					$this->db->where($key,$where);
				}
			}
		} else {
			$this->db->where($getwhere);
		}
	}

	function setLike($key,$value){
		$this->db->like($key,$value);
	}

	function setSelect($str){
		$this->db->select($str);
	}

	function addData($data,$table=''){
		$table = $table==''?$this->table:$table;
		if($data){
			$this->db->insert($table,$data);
			return $this->db->insert_id();
		}else{
			return false;
		}
	}

	function editData($datawhere,$data,$table='')
	{
		$table = $table==''?$this->table:$table;
		if(!empty($datawhere))
		{
			$this->db->where($datawhere);
		}
		return $this->db->update($table,$data);
	}

	function editDataByWhereIn($where, $data, $table = '')
	{
		$table = ($table== '') ? $this->table : $table;
		if(!empty($where)) {
			foreach ($where as $key => $value) {
				$this->db->where_in($key, $value);
			}
		}
		return $this->db->update($table,$data);
	}

	function delData($ids,$table='')
	{
		$table = $table==''?$this->table:$table;
		if(is_array($ids)){
			$this->db->where_in('id',$ids);
		}else{
			$this->db->where('id',$ids);
		}
		$this->db->delete($table);
	}

	/* @查询数据
	 *
	 * */
	public function getData($getwhere="",$order='',$pagenum="0",$exnum="0",$table='',$fields='',$groupby='')
	{
		$table = ($table=='') ? $this->table : $table;
		if($getwhere){
			$this->setWhere($getwhere);
		}
		if($order){
			$this->db->order_by($order);
		}
		if($pagenum>0){
			$this->db->limit($exnum,$pagenum);
		}elseif($exnum > 0){
			$this->db->limit($exnum);
		}
		if($fields){
			$this->db->select($fields);
		}
		if($groupby){
			$this->db->group_by($groupby);
		}
		$data = $this->db->get($table)->result_array();
		return $data;
	}

	public function getSingle($getwhere="",$table=''){
		$table = $table==''?$this->table:$table;
		if($getwhere){
			$this->setWhere($getwhere);
		}
		$row = $this->db->get($table)->row_array();
		return $row;
	}
	/* @查询返回多条记录
	 * @param $getWhere
	 * @param $table
	 * @return array()
	 * */
	public function getMultis($getWhere="", $table)
	{
		$table = $table ? $table : $this->table;
		if ($getWhere) {
			$this->setWhere($getWhere);
		}

		return $this->db->get($table)->result_array();
	}

	public function getDataNum($getwhere='',$table=''){
		$table = $table==''?$this->table:$table;
		if($getwhere){
			$this->setWhere($getwhere);
		}
		return $this->db->count_all_results($table);
	}

	public function getJoinData($table="", $join='', $where="", $fields="", $order='', $groupby='', $first_row='0', $num='0'){
		$table = $table==''?$this->table:$table;

		if(is_array($join)){
			foreach($join as $key=>$value){
				if($value[2]){
					$this->db->join($value[0], $value[1],$value[2]);
				}else{
					$this->db->join($value[0], $value[1]);
				}
			}
		}

		if($where){
			$this->setWhere($where);
		}

		if($fields){
			$this->db->select($fields);
		}

		if($order){
			$this->db->order_by($order);
		}

		if($groupby){
			$this->db->group_by($groupby);
		}

		if($first_row>0){
			$this->db->limit($num,$first_row);
		}elseif($num > 0){
			$this->db->limit($num);
		}

		$data = $this->db->get($table)->result_array();
		return $data;
	}
}


