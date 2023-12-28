<?php 
class UserModel{
    public function getInfoUser($id = ""){
        if(!empty($id)){
            $sql_select = "select * from customer
            where id = '$id'";
            $result = (new connect()) -> query($sql_select);
            return mysqli_fetch_array($result);
        }
    }
    public function updateUser($first_name,$last_name,$birthday,$address,$phone,$email,$password,$id = ""){
        if(!empty($id)){
            $sql_update = "update customer set first_name = '$first_name',last_name = '$last_name',birthday = '$birthday',address = '$address',
            password = '$password',phone = '$phone',email = '$email' where id = '$id'";
            (new connect()) -> query($sql_update);
        }
    }
    public function selectBillUser($id){
        $sql_select = "select bill.code_bill,name_product,time_buy,image,orderdetail.quantity,price,orderdetail.quantity*price AS TongTien,bill.status from bill 
        inner join orderdetail on bill.id = orderdetail.id_bill
        inner join products on products.id = orderdetail.id_products
        where id_user = '$id'";
        return (new connect()) ->query($sql_select);
    }
    public function GetCompleteBill($code_bill){
        $sql_select = " update bill set status = '2'
        where code_bill = '$code_bill'";
        return (new connect()) ->query($sql_select);
    }
}