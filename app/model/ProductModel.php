<?php
require_once './configs/connect.php';
class ProductModel
{
    public function getProductList($params = "")
    {
        $connect = (new connect()) ->cn();
        if(!empty($params)){
            $sql_select = "select products.*,products.id AS product_id,name_categories,percent,time_start,time_finish,brand.*,material.* from products
            inner join categories on products.id_categories = categories.id_categories 
            inner join brand on products.id_brand  = brand.id
            inner join material on products.id_material  = material.id
            left join discount on products.id = discount.id_product
            where name_categories = '$params'";
        }else{
            $sql_select = "select products.*,products.id AS product_id,name_categories,percent,time_start,time_finish,brand.*,material.* from products
            inner join categories on products.id_categories = categories.id_categories 
            inner join brand on products.id_brand  = brand.id
            inner join material on products.id_material  = material.id
            left join discount on products.id = discount.id_product
            ";
        }
        $result = (new connect()) ->query($sql_select);
        return $result;
    }
    public function getInfoProduct($id){
        if(isset($id)){
            $sql_select = "select products.*,products.id AS product_id,name_categories,percent,time_start,time_finish,brand.*,material.* from products
            inner join categories on products.id_categories = categories.id_categories 
            inner join brand on products.id_brand  = brand.id
            inner join material on products.id_material  = material.id
            left join discount on products.id = discount.id_product
            where products.id = '$id'";
            $result = (new connect()) -> query($sql_select);
            return mysqli_fetch_array($result);
        }
    }
    public function getSameProduct($id = "",$categories = "",$id_brand = ""){
        if($categories != "" && $id_brand != ""){
            $sql_select = "select products.*,products.id AS product_id,name_categories,percent,time_start,time_finish,brand.*,material.* from products
            inner join categories on products.id_categories = categories.id_categories 
            inner join brand on products.id_brand  = brand.id
            inner join material on products.id_material  = material.id
            left join discount on products.id = discount.id_product
            where name_categories = '$categories'and products.id_brand = '$id_brand' and products.id <> '$id'";
            $result = (new connect()) -> query($sql_select);
        }
        return $result;
    }
}