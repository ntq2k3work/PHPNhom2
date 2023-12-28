<?php
class UserController extends \core\BaseController
{
    public $data = [];
    public $model;
    public function __construct()
    {
        $this -> model = ($this -> model("UserModel"));
    }
    public function index($action = ""){
        
        $action = explode("=",$action);
        $check = false;
        if(count($action) > 1){
            $id = $action[1];
            $last_name = $_POST['last_name'];
            $first_name = $_POST['first_name'];
            $birthday = $_POST['birthday'];
            $phone = $_POST['phone']; 
            $address = $_POST['address'];
            $email = $_POST['email'];
            $password = $_POST['password'];
            $this -> model -> updateUser($first_name,$last_name,$birthday,$address,$phone,$email,$password,$id);
            $check = true;
            if($check){
                $_SESSION['name'] = $last_name . " ". $first_name; 
                $_SESSION['success'] = "Cập nhật thông tin thành công";
                $link = "/User/index/".$id ;
                echo "<script>window.location.href = '$link' ;</script>";
            }
        }else{
            
            $this -> data['user'] = $this -> model -> getInfoUser($action[0]);
            $this -> render('layouts/_main',$this ->data,"user/index");
        }
        

    }
    public function cartUser($action = ""){
        $action = explode('=',$action);
        $dataBill = [];
        if(count($action) < 2){
            $id = $action[0];
            $_SESSION['id'] = $id;
            if(!empty($id)){
                $UserOrder = $this -> model -> selectBillUser($id);
                $this -> data['UserOrder'] = $UserOrder;
                foreach($UserOrder as $bill){ 
                    $dataBill[$bill['code_bill']][] = array(
                        'name_product' => $bill['name_product'],
                        'image' => $bill['image'],
                        'quantity' => $bill['quantity'],
                        'time_buy' => $bill['time_buy'],
                        'SumMoney' => $bill['TongTien'],
                        'status' => $bill['status']
                    );
                }
            }
        }else{
            if($action[0] == "GetComplete"){
                $id =$_SESSION['id'];
                unset($_SESSION['id']);
                $code_bill = $action[1];
                $this -> model -> GetCompleteBill($code_bill);
                $link = true;
                if(isset($link)){
                    if ($link == true) {
                        echo "<script>window.location.href = '$id';</script>";
                    }
                }
            }
        }
        $this -> data['dataBill'] = $dataBill;
        $this -> render("layouts/_main",$this -> data,"user/cartUser");
    }

}