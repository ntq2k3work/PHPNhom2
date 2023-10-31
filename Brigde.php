<?php
    define('__DIR_ROOT',__DIR__);
    session_start();
//    ob_start();
    require "configs/routes.php";
    require "app/App.php"; //Load app
    require 'app/core/BaseController.php'; //Load BaseController