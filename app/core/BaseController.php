<?php

namespace core;

class BaseController
{
    public function model($model)
    {
        if(file_exists('app/model/'.$model.'.php')){
            require_once 'app/model/'.$model.'.php';
            if(class_exists($model)){
                $model = new $model();
                return $model;

            }
        }
        return false;
    }
    public function render($view,$data = [],$mainContent = "")
    {
        extract($data); //Đổi key của mảng thành biến
        if(file_exists('app/view/'.$view.'.php')){
            require 'app/view/'.$view.'.php';
        }else{
            echo "Không thấy file";
        }
    }
}