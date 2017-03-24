<?php

/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/3/21
 * Time: 14:42
 */
class UpdateModel extends BaseModel
{
    public function __construct()
    {
        parent::__construct();
    }

    public function generate_update_sql($tableName, array $arr_data)
    {
        $str = $this->db->update_string($tableName, $arr_data);
    }

    public function ck_replace($tableName, $arr_data)
    {
        $data = array(
            'title' => 'My title',
            'name'  => 'My Name',
            'date'  => 'My date'
        );
        // if we assume that the title field is our primary key
        $this->db->replace($tableName, $arr_data);
    }

    public function single_update($tableName, $arr_where, $arr_data)
    {
        $this->set_and_where($arr_where);
        $this->db->update($tableName, $arr_data);
        // $this->db->update($tableName, $arr_data, $arr_where);
        /*
        foreach($arr_where as $field => $value)
        {
            $this->db->where($field,)
        }
        */
    }

    public function batch_update($tableName, $arr_data, $primary_key)
    {
        $this->db->update_batch($tableName, $arr_data, $primary_key);
    }

}