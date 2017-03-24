<?php

/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/3/20
 * Time: 14:25
 */
class BaseModel extends CI_Model
{

    public function __construct()
    {
		$this->load->database();
    }

    public function from_table($tableName)
    {
        $this->db->from($tableName);
    }
    public function set_fields($field_string)
    {
        // $this->db->select('title, content, date');
        $this->db->select($field_string);
    }

    public function set_join($joinTable, $where, $joinType)
    {
        $this->db->join($joinTable, $where, $joinType);
    }

    public function fetch_query_result($query)
    {
        $query->result();
    }

    public function set_and_where($arr_where)
    {
        foreach($arr_where as $key => $value) {
            $this->db->where($key, $value);
        }
    }

    public function set_or_where()
    {

    }
    // $this->db->where('MATCH (field) AGAINST ("value")', NULL, FALSE);

    public function get_table($tableName = '')
    {
        if (empty($tableName)) {
            $query = $this->db->get();
        } else {
            $query = $this->db->get($tableName);
        }
        return $query;
    }
    public function query_sql($sql_str)
    {
        $query = $this->db->query($sql_str);

        if ($this->db->error()) {
            return false;
        }
        return $query;
    }

    public function db_error()
    {
        return $this->db->error();
    }


    public function debug()
    {
        return $this->db->last_query();
    }

}