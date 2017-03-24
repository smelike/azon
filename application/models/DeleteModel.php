<?php

/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/3/21
 * Time: 15:15
 */
class DeleteModel extends BaseModel
{
        public function __construct()
        {
                parent::__construct();
        }

        public function delete_one($tableName, $arr_where)
        {
            $this->db->delete($tableName, $arr_where);
        }

}