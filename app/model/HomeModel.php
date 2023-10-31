<?php
require_once 'connect.php';
class HomeModel
{
//    Lấy danh sachs theo danh mục

    public function get($table,$params)
    {
        $connect = (new connect()) ->cn();
        if(!empty($params)){
            $sql_select = "select * from $table where name_categories = '$params'";
        }else{
            $sql_select = "select * from $table";
        }
        $result = mysqli_query($connect,$sql_select);
        return $result;
    }
}