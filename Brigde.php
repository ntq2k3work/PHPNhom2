<?php
    define('_DIR_ROOT',__DIR__);
// Xử lí root
if(!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] == 'on'){
    $web_root = "https://" . $_SERVER['HTTP_HOST'];

}else $web_root = "http://" . $_SERVER['HTTP_HOST'];
$sever = "";
$ar = explode("/",$_SERVER['DOCUMENT_ROOT']);
$cnt = 1;
foreach($ar as $i){
    if($cnt > 4) break;
    $sever = $sever . $i ."\\";
    $cnt++;
}
$folder = str_replace(strtolower($sever),"",strtolower(_DIR_ROOT));
$web_root = $web_root."/".$folder;
define('_FOLDER',$folder);
define('WEB_ROOT',$web_root);
//    ob_start();

session_start();
$config_dir = scandir('configs');
if(!empty($config_dir)){
    foreach ($config_dir as $item) {
        if($item != '.' && $item != '..' && file_exists('configs/' . $item)){
            require_once 'configs/'.$item;
        }
    }
}

    // require "configs/routes.php";
    require "app/App.php"; //Load app
    if(class_exists("database")){
        require_once "configs/connect.php";
    }else{
        echo "Không thể kết nối cơ sở dữ liệu !";
    }
    require 'app/core/BaseController.php'; //Load BaseController