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
    }

    public function index()
    {
        $personas = $this->paginate();
        $apis = $this->get_api();
        foreach($personas as &$persona)
        {
            $persona->deleteVisible = false;
            $persona->reviseVisible = false;
        }
        $page_size = post_param('size');
        $size = $page_size ? $page_size : 10;
        $total = $this->Persona_Model->persona_count();
        /*
        $arr_data = [
            'total' => $this->Persona_Model->persona_count(),
            'size' => $size,
            'personas' => $personas
        ];*/

        $this->echo_json($personas, compact('total', 'size', 'personas', 'apis'));
    }

    private function paginate()
    {
        $pageno = 0;
        $row_count = 20;
        $total = $this->Persona_Model->persona_count();
        $end = ceil($total / $row_count);

        $pageno = ($pageno > $end) ? $end : $pageno;
        $offset = $pageno * $row_count;

        return $this->Persona_Model->persona_query($offset, $row_count);
    }

    public function edtit_persona()
    {

        $this->User_Model->update_persona();
    }

    public function add()
    {
        $this->Persona_Model->add_user();
    }

    public function delete_persona()
    {
        $this->Persona_Model->soft_delete();
    }
    private function get_api()
    {
        $apis = $this->Api_Model->api_query();

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
        return $arr_top_api;
    }
}