<?php
class CartModel {
    private $cart;

    public function __construct() {
        // Khởi tạo giỏ hàng
        if (!isset($_SESSION['cart'])) {
            $_SESSION['cart'] = array();
        }
        $this->cart = &$_SESSION['cart'];
    }

    public function getAllItems() {
    }
    
    public function addItem($item) {
        $sql_select = "select * from products where id = '$item'";
        return (new connect()) ->query($sql_select);
    }

    public function removeItem($index) {
        if (isset($this->cart[$index])) {
            unset($this->cart[$index]);
        }
    }

    public function clearCart() {
        $this->cart = array();
    }
    public function getUser($id) {
        $sql = "select * from customer where id = '$id'";
        return (new connect()) -> query($sql);
    }
    public function ThanhToan($id,$code_bill = "",$time = ""){
        if($time != ""){
            $currentDate = $time ;

        }else $currentDate = date('Y-m-d');
        if($code_bill == "") $code_bill = time()."";
        $sql_insert_bill = "insert into bill(id_user,time_buy,code_bill)
        values('$id','$currentDate','$code_bill')";
        (new connect()) ->execute($sql_insert_bill);
        $check = "select * from bill where code_bill = '$code_bill' ";
        return (new connect()) -> query($check);
    }
}