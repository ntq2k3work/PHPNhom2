<?php
require_once 'connect.php';
class ProductModel
{
    public function getProductList()
    {
        $connect = (new connect()) ->cn();
        if(!empty($params)){
            $sql_select = "select * from products where name_categories = '$params'";
        }else{
            $sql_select = "select * from products";
        }
        $result = (new connect()) ->query($sql_select);
        return mysqli_fetch_array($result);
    }
}