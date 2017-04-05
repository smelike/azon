<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Collect extends MY_Controller{

	public function index(){
		$gets = $this->input->get();
		$this->load->helper('array');
		 // 获取平台数据
        $platforms = $this->query_middler_platform($this->middler_com_id);
        //获取店铺数据
        $platform_id = (int)element('t_platform', $gets);
        if($platform_id != ''){
        	$shop_wh = array();
	        $shop_wh['platform_id'] = $platform_id;
	        $shop_wh['company_id'] = $this->company_id;
	        $order_by = '';
	        $shops =  $this->Data_model->getData($shop_wh,$order_by,0,0,'t_store');
	        if($shops){
	            $this->load->vars('shops',$shops);
	        }
        }
    	
		 // 获取分页
        $currentpage = intval($this->uri->segment(3));
        $currentpage = $currentpage?$currentpage:1;
        $row_num = 10;
        $page = ($currentpage - 1) * $row_num;
		//获取数据
		$data_wh = array();
        $data_wh['company_id'] = $this->company_id;
        if(element('asin', $gets) != ''){
        	$data_wh['ASIN'] = element('asin', $gets);
        }
        if(element('platform', $gets) != ''){
        	$data_wh['platform'] = element('platform', $gets);
        }
        if(element('shop', $gets) != ''){
        	$data_wh['execute_shop'] = element('shop', $gets);
        }
        if(element('status', $gets) != '' && (int)element('status', $gets) != 5){
        	$data_wh['status'] = element('status', $gets);
        }else{
        	$data_wh['status <>'] = 5;
        }
        if(element('create_time', $gets) != ''){
        	$data_wh['create_time >'] = strtotime(element('create_time', $gets));
        	$data_wh['create_time <'] = strtotime(element('create_time', $gets)) + 86400 -1;
        }
		if(element('start_time', $gets) != '' && element('end_time', $gets) != ''){
        	$this->db->group_start();
				$sql1 = 'taskstart_time between ' . strtotime(element('start_time', $gets)) . ' and ' . strtotime(element('end_time', $gets));
				$this->db->where($sql1);
				$sql2 = 'taskend_time between ' . strtotime(element('start_time', $gets)) . ' and ' . strtotime(element('end_time', $gets));
				$this->db->or_where($sql2);
				$this->db->or_group_start();
					$sql3 = 'taskstart_time <= ' . strtotime(element('start_time', $gets)) . ' and taskend_time >= ' . strtotime(element('end_time', $gets));
					$this->db->where($sql3);
				$this->db->group_end();
			$this->db->group_end();
        }
		$this->db->where($data_wh);
        $this->db->order_by('create_time DESC');
        $data = $this->db->get('t_collect_task',$row_num,$page)->result_array();

        if(element('start_time', $gets) != '' && element('end_time', $gets) != ''){
        	$this->db->group_start();
				$sql1 = 'taskstart_time between ' . strtotime(element('start_time', $gets)) . ' and ' . strtotime(element('end_time', $gets));
				$this->db->where($sql1);
				$sql2 = 'taskend_time between ' . strtotime(element('start_time', $gets)) . ' and ' . strtotime(element('end_time', $gets));
				$this->db->or_where($sql2);
				$this->db->or_group_start();
					$sql3 = 'taskstart_time <= ' . strtotime(element('start_time', $gets)) . ' and taskend_time >= ' . strtotime(element('end_time', $gets));
					$this->db->where($sql3);
				$this->db->group_end();
			$this->db->group_end();
        }
		$this->db->where($data_wh);
		$t_money = $this->Data_model->Statistical('total_price',$data_wh,'t_collect_task');
        $num = count($this->db->get('t_collect_task')->result_array());
        $tasks = array();
        if($data){
        	foreach ($data as $key => $value) {
        		$value['create_time'] = $value['create_time'] != null && $value['create_time'] != ''? date('Y-m-d H:i:s',$value['create_time']) : '';
        		$value['taskstart_time'] = $value['taskstart_time'] != null && $value['taskstart_time'] != ''? date('Y-m-d',$value['taskstart_time']) : '';
        		$value['taskend_time'] = $value['taskend_time'] != null && $value['taskend_time'] != ''? date('Y-m-d',$value['taskend_time']) : '';
            	$value['url'] = site_url('/collect/edit/'.$value['id']);
            	$p_url = $this->get_platform_url($value['platform']);
            	$url = $p_url.'/dp/'.$value['ASIN'];
            	$value['ASIN'] = '<a target="_blank" href="http://'.$url.'">'.$value['ASIN'].'</a>';
            	$value['platform'] = $this->get_platform_name($value['platform']);
            	$value['execute_shop'] = $this->get_shop_name($value['execute_shop']);
        		switch ((int)$value['status']) {
	                case 1:
	                    $value['_status'] = '待进行';
	                    break;
	                case 2:
	                    $value['_status'] = '进行中';
	                    break;
	                case 3:
	                    $value['_status'] = '待确认';
	                    break;
	                case 4:
	                    $value['_status'] = '已完成';
	                    break;
	                case 6:
	                    $value['_status'] = '审核不通过';
	                    break;
	            }
        		$tasks[] = $value;
        	}
        }
        //分页
        $this->load->library('pagination');
        $config['base_url'] = site_url('/collect/index');
        $config['total_rows'] = $num;
        $config['per_page'] = $row_num;
        $this->pagination->initialize($config);
        $pagetext = $this->pagination->create_links();
		$this->load->vars('t_money', $t_money['total_price']);
        $this->load->vars('platforms',$platforms);
        $this->load->vars('tasks',$tasks);
        $this->load->vars('pagetext',$pagetext);
		$this->load->vars('gets',$gets);
		
	}

	public function add(){
		// 获取平台数据
	 
        $platforms = $this->query_middler_platform($this->middler_com_id);
		$shop_wh = array();
		$shop_wh['company_id'] = $this->company_id;
		$shop_wh['status'] = 1;
		
		$order_by = '';
		$shops =  $this->Data_model->getData($shop_wh,$order_by,0,0,'t_store','id,name,platform_id');
		$new_shops = array();
		foreach($shops as $shop){
			$new_shops[$shop['platform_id']][] = $shop;
		}
		$returnarray['willShow'] = false;
		$returnarray['platforms'] = $new_shops;
		//整合成以平台id为键的多维数组
		echo json_encode($returnarray);exit;
		if ($this->input->method() == 'post'){
			$this->load->library('form_validation');
			$this->load->helper('array');
			$posts = $this->input->post();
			 $this->form_validation->set_rules('platform', 'platform', 'required',
                array('required' => '平台不能为空')
            );
            $this->form_validation->set_rules('shop', 'shop', 'required',
                array('required' => '店铺不能为空')
            );
            $this->form_validation->set_rules('asin', 'asin', 'required',
                array('required' => 'ASIN不能为空')
            );
            $this->form_validation->set_rules('number', 'number', 'required',
                array('required' => '数量不能为空')
            );
            $this->form_validation->set_rules('time_start', 'time_start', 'required',
                array('required' => '任务开始时间不能为空')
            );
         	$this->form_validation->set_rules('time_end', 'time_end', 'required',
                array('required' => '任务结束时间不能为空')
            );
            if ($this->form_validation->run() == FALSE){
            	//获取店铺
            	$platform_id = (int)set_value('platform');
            	$shop_wh = array();
	            $shop_wh['platform_id'] = $platform_id;
	            $shop_wh['company_id'] = $this->company_id;
	            $order_by = '';
	            $shops =  $this->Data_model->getData($shop_wh,$order_by,0,0,'t_store');
	            if($shops){
	                print_r(json_decode($shops));
	            }
                $msgs = $this->form_validation->error_array();
                $str = '';
                if(count($msgs) > 0){
                	foreach ($msgs as $msg) {
                		$str .= $msg.' , ';
                	}
                }
                $this->load->vars('msg_str',$str);
            }else{
            	//关键词
				$key_word = '';
				$keywords = element('key_words', $posts);
				if($keywords != ''){
					$key_word_arr = explode(',',$keywords);
					$keywords_arr = array();
					foreach ($key_word_arr as $k => $key_arr) {
						$keywords_arr[] = trim($key_arr);
					}
					$key_word = implode(',',$keywords_arr);
				}
				//价格
				$price = $this->Data_model->getSingle(array('company_id' => $this->company_id),'company_price');
				if(!empty($price) && $price['collection'] != ''  && $price['collection'] != null){
					// 收藏单价
					$collect_price = floatval($price['collection']);
					//插入数据
					$data = array();
					$data['ASIN'] = element('asin', $posts);
					$data['platform'] = element('platform', $posts);
					$data['execute_shop'] = element('shop', $posts);
					$data['number'] = (int)element('number', $posts);
					$data['taskstart_time'] = strtotime(element('time_start', $posts));
					$data['taskend_time'] = strtotime(element('time_end', $posts));
					$data['key_word'] =$key_word;
					$data['remark'] = element('remark', $posts);
					$data['price'] = $collect_price;
					$data['total_price'] = $collect_price * $data['number'];
					$data['create_man'] = $this->uid;
					$data['company_id'] = $this->company_id;
					$data['middler_com_id'] = $this->middler_com_id;
					$data['create_time'] = time();
					//判断该ASIN在任务时间内是否存在任务
	            	$is_task_wh = array();
					$is_task_wh['ASIN'] = $data['ASIN'];
					$this->db->group_start();
						$sql1 = 'taskstart_time between ' . $data['taskstart_time'] . ' and ' . $data['taskend_time'];
						$this->db->where($sql1);
						$sql2 = 'taskend_time between ' . $data['taskstart_time'] . ' and ' . $data['taskend_time'];
						$this->db->or_where($sql2);
						$this->db->or_group_start();
							$sql3 = 'taskstart_time <= ' . $data['taskstart_time'] . ' and taskend_time >= ' . $data['taskend_time'];
							$this->db->where($sql3);
						$this->db->group_end();
					$this->db->group_end();
					$is_task = $this->Data_model->getSingle($is_task_wh,'t_collect_task');
					if ($is_task){
						$this->load->vars('msg_str','该产品在任务时间已存在');
					}else{
						//执行插入
						$res = $this->Data_model->addData($data,'t_collect_task');
						if($res){
							redirect(site_url('/collect/index'));
						}else{
							$this->load->vars('msg_str','添加失败');
						}
					}
				}else{
					$this->load->vars('msg_str','收藏价格未设置');
				}
            }
		}
		///$this->load->vars('platforms',$platforms);
		//$this->load->view('collect_add');
	}

	public function edit($id){
		if ($this->input->method() == 'post'){
			$this->load->library('form_validation');
			$this->load->helper('array');
			$posts = $this->input->post();
			 $this->form_validation->set_rules('platform', 'platform', 'required',
                array('required' => '平台不能为空')
            );
            $this->form_validation->set_rules('shop', 'shop', 'required',
                array('required' => '店铺不能为空')
            );
            $this->form_validation->set_rules('number', 'number', 'required',
                array('required' => '数量不能为空')
            );
            if ($this->form_validation->run() == FALSE){
                $msgs = $this->form_validation->error_array();
                $str = '';
                if(count($msgs) > 0){
                	foreach ($msgs as $msg) {
                		$str .= $msg.' , ';
                	}
                }
                $this->load->vars('msg_str',$str);
            }else{
            	//关键词
				$key_word = '';
				$keywords = element('key_words', $posts);
				if($keywords != ''){
					$key_word_arr = explode(',',$keywords);
					$keywords_arr = array();
					foreach ($key_word_arr as $k => $key_arr) {
						$keywords_arr[] = trim($key_arr);
					}
					$key_word = implode(',',$keywords_arr);
				}
				//执行更改
				$edit_wh = array();
				$edit_wh['id'] = (int)$id;
				$edit_wh['company_id'] = $this->company_id;
				$edit_wh['status <>'] = 5;
				//任务是否存在
				$_task = $this->db->where($edit_wh)->get('t_collect_task')->row_array();
				if(!empty($_task) && (int)$_task['status'] == 1){
					//插入数据
					$data = array();
					$data['platform'] = element('platform', $posts);
					$data['execute_shop'] = element('shop', $posts);
					$data['number'] = (int)element('number', $posts);
					$data['key_word'] =$key_word;
					$data['remark'] = element('remark', $posts);
					$data['total_price'] = (float)$_task['price'] * $data['number'];
					$res = $this->db->set($data)->where($edit_wh)->update('t_collect_task');
					if($res){
						$url = site_url('/collect/index');
						echo "<script>alert('任务修改成功');location.href='$url';</script>";exit;
					}else{
						$this->load->vars('msg_str','无法修改');
					}
				}else{
					$this->load->vars('msg_str','任务不存在或已经开始，无法修改');
				}
            }
		}
		if(!is_numeric($id))
			return redirect(site_url('/collect/index'));
		$id = (int)$id;
		// 获取平台数据
        $platforms = $this->query_middler_platform($this->middler_com_id);
		//获取任务数据
		$wh = array();
		$wh['company_id'] = $this->company_id;
		$wh['id'] = $id;
		$wh['status <>'] = 5;
		$data = $this->db->where($wh)->get('t_collect_task')->row_array();
		if(empty($data) || (int)$data['status'] != 1)
			return redirect(site_url('/collect/index'));
		if(!empty($data['platform'])){
			//获取店铺
        	$platform_id = (int)$data['platform'];
        	$shop_wh = array();
            $shop_wh['platform_id'] = $platform_id;
            $shop_wh['company_id'] = $this->company_id;
            $order_by = '';
            $shops =  $this->Data_model->getData($shop_wh,$order_by,0,0,'store');
            if($shops){
                $this->load->vars('shops',$shops);
            }
		}
		$data['taskstart_time'] = $data['taskstart_time'] != '' && $data['taskstart_time'] != null? date('Y-m-d',$data['taskstart_time']):'';
		$data['taskend_time'] = $data['taskend_time'] != '' && $data['taskend_time'] != null? date('Y-m-d',$data['taskend_time']):'';
		$this->load->vars('platforms',$platforms);
		$this->load->vars('task',$data);
		$this->load->view('collect_edit');
	}

	public function del(){
		if ($this->input->method() == 'post'){
			$posts = $this->input->post();
			$id = (int)$posts['id'];
			//删除
			$del_wh = array();
			$del_wh['id'] = $id;
			$del_wh['company_id'] = $this->company_id;
			//判读该任务是否存在
			$task = $this->db->where($del_wh)->get('t_collect_task')->row_array();
			if(empty($task)){
				echo json_encode(array('s' => 0,'msg' => '该任务不存在'));
				return;
			}
			if((int)$task['status'] != 1){
				echo json_encode(array('s' => 0,'msg' => '该任务已经开始，无法删除'));
				return;
			}
			//执行删除
			$data = array();
			$data['status'] = 5;
			$res = $this->db->set($data)->where($del_wh)->update('t_collect_task');
			if(!$res){
				echo json_encode(array('s' => 0,'msg' => '任务无法删除'));
				return;
			}
			echo json_encode(array('s' => 1,'msg' => '任务删除成功'));
		}
	}

	public function confirm_task(){
		if ($this->input->method() == 'post'){
			$posts = $this->input->post();
			$id = (int)$posts['id'];
			//确认审核
			$del_wh = array();
			$del_wh['id'] = $id;
			$del_wh['company_id'] = $this->company_id;
			//判读该任务是否存在
			$task = $this->db->where($del_wh)->get('t_collect_task')->row_array();
			if(empty($task)){
				echo json_encode(array('s' => 0,'msg' => '该任务不存在'));
				return;
			}
			if((int)$task['status'] != 3){
				echo json_encode(array('s' => 0,'msg' => '该任务状态未完成，无法确认审核'));
				return;
			}
			$data = array();
			$data['check_remark'] = $posts['val'];
			switch ((int)$posts['type']) {
                case 1:
                    $data['status'] = 4;
                    break;
                case 2:
                    $data['status'] = 6;
                    break;
            }
			
			$res = $this->db->set($data)->where($del_wh)->update('t_collect_task');
			if(!$res){
				echo json_encode(array('s' => 0,'msg' => '任务无法确认审核'));
				return;
			}
			echo json_encode(array('s' => 1,'msg' => '提交审核成功'));
		}
	}

	//查看任务信息
	public function show_detail(){
		if ($this->input->method() == 'post'){
			$posts = $this->input->post();
			$id = (int)$posts['id'];
			$task = $this->db->where(array('id'=>$id))->get('t_collect_task')->row_array();
			if($task){
				$task['create_time'] = $task['create_time'] != null && $task['create_time'] != ''? date('Y-m-d H:i:s',$task['create_time']) : '';
        		$task['taskstart_time'] = $task['taskstart_time'] != null && $task['taskstart_time'] != ''? date('Y-m-d',$task['taskstart_time']) : '';
        		$task['taskend_time'] = $task['taskend_time'] != null && $task['taskend_time'] != ''? date('Y-m-d',$task['taskend_time']) : '';
            	$task['url'] = site_url('/collect/edit/'.$task['id']);
            	$p_url = $this->get_platform_url($task['platform']);
            	$url = $p_url.'/dp/'.$task['ASIN'];
            	$task['ASINA'] = '<a target="_blank" href="http://'.$url.'">'.$task['ASIN'].'</a>';
            	$task['platform'] = $this->get_platform_name($task['platform']);
            	$task['execute_shop'] = $this->get_shop_name($task['execute_shop']);
				echo json_encode(array('s'=>1,'data'=>$task));
			}else{
				echo json_encode(array('s'=>0,'msg'=>'不存在该任务'));
			}
		}
	}
}