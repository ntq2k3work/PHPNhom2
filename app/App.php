<?php
require 'errors/errorMess.php';
class App{
    private  $__action;
    private $__params;
    private $__controller; // Thêm string vào khi chuyển sang object thì sẽ gây lỗi $this -> __controller trong construct

    function __construct()
    {
        $this -> __controller = "Home"; //Hiển thị trên URL
        $this -> __action = "index";
        $this -> __params = [];
        $this -> handleUrl();
    }

    public function getUrl()
    {

        $url = '/';
        if(!empty($_SERVER['REQUEST_URI']))
        {
            $url = $_SERVER['REQUEST_URI'];
        }
        return $url;
    }
    public function handleUrl(): void
    {
        $url = $this ->getUrl();

        $urlArr = array_filter(explode('/',$url)); // Lấy ra list url
        $urlArr = array_values($urlArr); // Trả về url rỗng
//        Xử lí controller
        if(!empty($urlArr[0])){
            $this -> __controller = ucfirst($urlArr[0]);
        }else{
            $this -> __controller = ucfirst($this -> __controller);
        }

        $Get_Controller = ($this ->__controller).'Controller';
        if(file_exists('app/controller/'.$Get_Controller. '.php')){
            require 'controller/'.$Get_Controller. '.php'; //Gọi controller
            if(class_exists($Get_Controller)){
                $this ->__controller = new $Get_Controller(); //Chuyển sang objec
                unset($urlArr[0]);
            }else{
                (new errorMess()) ->Block();
            }
        }else{
            (new errorMess()) ->Loi(); //Báo lỗi khi không thấy trang
        }
        
        //Xử lí action
        if(!empty($urlArr[1])){
            $this ->__action = $urlArr[1];
            unset($urlArr[1]);
        }
        //Xử lí params
        $this ->__params = array_values($urlArr);
        //Kiểm tra xem method action có tồn tại trong object $this -> __controller không
        if(method_exists($this ->__controller,$this->__action)){
            
           call_user_func_array([$this ->__controller,$this->__action],$this ->__params); //
        }
        else{
            (new errorMess()) ->errorNotFound(); //Báo lỗi khi không thấy trang
        }

    }

}
