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
    public function render($view)
    {
        if(file_exists('app/view/'.$view.'.php')){
            require 'app/view/'.$view.'.php';
        }
    }
}