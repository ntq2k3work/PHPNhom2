<?php

class ProductController extends \core\BaseController
{
    public function index()
    {
        echo  "Đây là danh sách san phẩm";
    }
    public function list_product()
    {
        $product = $this ->model('ProductModel');
        $data = $product -> getProductList();
//        Render view
        $this ->render('products/list');
    }
    public function detail()
    {
        $this ->render('view/layouts/header');
//        Render view
        $this ->render('products/dentail');
    }
}