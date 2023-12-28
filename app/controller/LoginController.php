<?php

class LoginController extends \core\BaseController
{
    public $model;
    public $data = [];
    public function __construct()
    {
        $this ->model = $this ->model('LoginModel');
        // $this -> index();

    }

    public function index(): void
    {
        $this -> render("cdn");
        $this -> render("/login/index");
    }
    public function forgot(): void
    {
        $this -> render("cdn");
        $this -> render("/login/forgot");
    }
    public function signup(): void
    {
        $this -> render("cdn");
        $this -> render("/login/signup");
    }
    // Xử lí phần login
    public function checklog()
    {
        // session_start();
        if(empty($_POST['username']) || empty($_POST['password'])){
            $_SESSION['ERROR'] = "Vui lòng nhập đầy đủ thông tin !";
        }else{
            $remember = false;
            if(isset($_POST['remember'])) $remember = true;
            $username = addslashes($_POST['username']);
            $password = addslashes($_POST['password']);
            $user =  ($this -> model) -> checklog($username,$password);
            if($user['id']){
                $_SESSION['name'] = $user['last_name'] ." ". $user['first_name'];
                $_SESSION['userID'] = strtoupper($user['id']);
                if($remember){
                    $token = uniqid('user_%',true);
                    $id = $user['id'];
                    $sql_update = "update customer set token = '$token' where id = '$id'";
                    (new connect()) ->execute($sql_update);
                    setcookie('dnuser',$token,time() + 86400,'/');
                }
                header('location:/home');
                exit();
            }else{
                $_SESSION['ERROR'] = "Sai tài khoản hoặc mật khẩu";
            }
        }
        header('location:/login');
    }
    // Đăng ký
    public function addUser(){
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            $last_name = addslashes($_POST['last_name']);
            $first_name = addslashes($_POST['first_name']);
            $username = addslashes($_POST['username']);
            $password = addslashes($_POST['password']);
            $passwordConfirm = addslashes($_POST['passwordConfirm']);
            $phone = addslashes($_POST['phone']);
            $email = addslashes($_POST['email']);
            $gender = addslashes($_POST['gender']);
            if($gender == "1"){
                $gender = 1;
            }else{
                $gender = 0;

            }
            $val_pass = true;
            if (strlen($password) < 8) {
                 $val_pass =  false;
            }
        
            // Kiểm tra mật khẩu có chứa ít nhất một chữ cái viết hoa
            if (!preg_match("/[A-Z]/", $password)) {
                 $val_pass =  false;
            }
        
            // Kiểm tra mật khẩu có chứa ít nhất một chữ cái viết thường
            if (!preg_match("/[a-z]/", $password)) {
                 $val_pass =  false;
            }
        
            // Kiểm tra mật khẩu có chứa ít nhất một số
            if (!preg_match("/[0-9]/", $password)) {
                 $val_pass =  false;
            }
        
            // Kiểm tra mật khẩu có chứa ít nhất một ký tự đặc biệt
            if (!preg_match("/[^A-Za-z0-9]/", $password)) {
                 $val_pass =  false;
            }
            if($val_pass == false){
                $_SESSION['ERROR'] = "Mật khẩu phải từ 8 ký tự trở lên có ít nhất 1 ký tự đặc biệt,1 số, 1 chữ hoa, 1 chữ thường";
                header('location:/login/signup');
                exit;
            }
            if($password != $passwordConfirm){
                $_SESSION['ERROR'] = "Mật khẩu không khớp nhau !";
                header('location:/login/signup');
                exit;
            }
            $birthday = $_POST['birthday'];
            $address = $_POST['address'];
            $token = md5("user_%" . $username);
            $sql_check = "select * from customer where name_account = '$username' OR email = '$email' OR phone = '$phone'";
            $get = (new connect()) ->query( $sql_check);
            $check = mysqli_num_rows($get);
            if($check == 0){
                $sql_insert = "insert into customer(name_account,password,first_name,last_name,birthday,phone,address,email,gender,token)
                    values('$username','$password','$first_name','$last_name','$birthday','$phone','$address','$email',$gender,'$token') ";
                (new connect()) ->execute($sql_insert);
            }else{
                $_SESSION['ERROR'] = "Tài khoản hoặc số điện thoại hoặc email đã tồn tại";
                header('location:/login/signup');
                exit;
            }
            $_SESSION['success'] = "Tạo tài khoản thành công";
            header('location:/login');  
        }
    }
    public function logout()
    {
        $previous_page = $_SERVER['HTTP_REFERER'];
        unset($_SESSION['userID']);
        unset($_SESSION['name']);
        setcookie('dnuser',null,-1,'/');
        header("location:$previous_page");
    }
    // Xử lí phần forgot
    public function repassword()
    {
        if(empty($_POST['emailInput'])){
            $_SESSION['ERROR'] = "Vui lòng nhập đầy đủ thông tin !";
            header("location:/home");
            exit();
        }else{
            $email = $_POST['emailInput'];
            ($this -> model) -> sendPass($email);
            $_SESSION['success'] = "Đã gửi lại password!"; 
        }
        header("location:/home");
    }

}