<?php
// require_once './configs/connect.php';
class HomeModel
{
//    Lấy danh sachs theo danh mục

    public function getProduct($params)
    {
        if(!empty($params)){
            $sql_select = "select products.*,name_categories,percent,time_start,time_finish from products 
            inner join categories on products.id_categories = categories.id_categories  
            left join discount on products.id = discount.id_product
            where name_categories = '$params'";
        }else{
            $sql_select = "select * from products
                        inner join categories on products.id_categories = categories.id_categories  
                        inner join discount on products.id = discount.id_product
            ";
        }
        $result = (new connect()) ->query($sql_select);
        return $result;
    }
    
}