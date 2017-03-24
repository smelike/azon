<?php

/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/3/21
 * Time: 14:34
 */
class CreateModel extends BaseModel
{

    public function __construct()
    {
        parent::__construct();
    }

    public function generate_insert_sql($tableName, array $arr_data)
    {
        // insert into table
        $str = $this->db->insert_string($tableName, $arr_data);
        /*
        if ($query = $this->query($str))
        {
            return  $this->db->insert_id();
        }
        */
    }
    public function insert_one($tableName, $arr_data)
    {
        $return = $this->db->insert($tableName, $arr_data);

        if ($return) {
            return $this->db->insert_id();
        }
    }

    public function insert_batch($tableName, $arr_data)
    {
        $return = $this->db->insert_batch($tableName, $arr_data);
    }
}