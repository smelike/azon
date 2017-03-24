<?php

/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/3/21
 * Time: 15:21
 */
class ReadModel extends BaseModel
{
        public function __construct()
        {
             parent::__construct();
        }

        public function generate_read_sql()
        {
            $query = $this->db->get_where('mytable', array('id' => $id), $limit, $offset);
        }
        public function read_one()
        {

        }

        public function paginate($tableName, $offset = 0, $row_count = 0)
        {
            $query = array();
            if ($offset || $row_count) {
                $query = $this->db->get($tableName, $offset, $row_count);
            }
            if ($query) {
                 return $query->result();
            }
            return false;
        }

        /* The second parameter enables you to set whether or not the query builder query will be reset
            (by default it will be reset, just like when using $this->db->get()):
        */
        public function get_compile_query($tableName)
        {
            echo $this->db->limit(10,20)->get_compiled_select('mytable', FALSE);

            // Prints string: SELECT * FROM mytable LIMIT 20, 10
            // (in MySQL. Other databases have slightly different syntax)

            echo $this->db->select('title, content, date')->get_compiled_select();

            // Prints string: SELECT title, content, date FROM mytable LIMIT 20, 10
            // The key thing to notice in the above example is that the second query did not utilize $this->db->from()
            // and did not pass a table name into the first parameter.
            // The reason for this outcome is because the query has not been executed using $this->db->get() which resets
            // values or reset directly using $this->db->reset_query().
        }

}