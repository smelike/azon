<?php

/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/3/28
 * Time: 14:05
 */
class Persona extends MY_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model(array('Persona_Model', 'Api_Model'));
        $this->is_login();
    }

    public function index()
    {
        $personas = $this->paginate();
        foreach($personas as &$persona) {
            $persona->deleteVisible = false;
            $persona->ruleAddVisible = false;
        }
        $apis = $this->get_api();
        foreach($personas as &$persona)
        {
            $persona->deleteVisible = false;
            $persona->reviseVisible = false;
        }
        $page_size = post_param('size');
        $size = $page_size ? $page_size : 10;
        $total = $this->Persona_Model->persona_count();

        $this->echo_json($personas, compact('total', 'size', 'personas', 'apis'));
    }

    private function paginate()
    {
        $pageno = 1;
        $row_count = $this->_row_count;

        $total = $this->Persona_Model->persona_count();
        $end = ceil($total / $row_count);

        $post = $this->input->post();
        if ($post)
        {
            $pageno = $post['current'];
            $row_count = $post['size'];
        }

        $pageno = ($pageno > $end) ? $end : $pageno;
        $offset = ($pageno - 1) * $row_count;

        return $this->Persona_Model->persona_query($offset, $row_count);
    }

    public function add()
    {

        if (request_param('id')) {
            $return = $this->edit_persona();
            $msg = $return ? '编辑角色成功' : '编辑角色失败';
        } else {
            $return = $this->Persona_Model->add_persona();
            $msg =  $return ? '新增角色成功' : '新增角色失败';
        }

        $this->echo_json($return, compact('msg'));
    }

    private function edit_persona()
    {
        return $this->Persona_Model->update_persona();
    }

    public function delete_persona()
    {
        $delete = $this->Persona_Model->soft_delete();
        $msg = $delete ?  '角色删除成功' : '角色删除失败';

        $this->echo_json($delete, compact('msg'));
    }

    public function fetch_api()
    {
        $apis = $this->get_api();

        $this->echo_json($apis, compact('apis'));
    }
    private function get_api()
    {
        $type = request_param('type');
        $type = $type ? $type : 2;
        $apis = $this->Api_Model->api_query_by_type($type);

        $arr_top_api = [];
        foreach($apis as $item) {
            if (empty($item->pid)) {
                $arr_top_api[$item->id] = (array)$item;
            }
        }

        foreach($apis as $api)
        {
            if ($api->pid) {
                $arr_top_api[$api->pid]['children'][] = $api;
            }
        }
        sort($arr_top_api);
        // 怎么区分中介 type = 1 与 卖家 = 2 的接口
        //foreach ($arr_top_api as )
        //var_dump($arr_top_api);
        return $arr_top_api;
    }

    public function test_api()
    {
        print_r($this->get_api());
    }
    public function test()
    {
        $ids = [

            8,9,10,59,197,198,199,201,202,191,192,193,194,153,154,144,146,147,
            135,136,137,138,139,140,141,142,131,132,164,125,126,127,128,129,161,
            175,58,121,122,123,176,200,55,120, 97,102,105,56,114,117,115,118,119,
            28,148,173,24,25,26,27,21,22,23,51,52,162,20,14,15,16,17,18,19,165,
            166,11,12,212,213,214,215,216,219,222,223,223,224
        ];

        $this->db->where_in('id', $ids);

        $query = $this->db->get('t_api');

        var_dump($query->result());
    }
}