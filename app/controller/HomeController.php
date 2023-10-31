<?php

class HomeController extends \core\BaseController
{
    public $model;
    public function __construct()
    {
        $this ->model = $this ->model('HomeModel');

    }

    public function index(): void
    {
        require_once "app/model/HomeModel.php";
        $products = (new HomeModel())->get("products","");
        
        require_once "app/view/home/index.php";
    }
    public function detail($id='',$slug='2  ')
    {
        echo 'id sản phẩm'.$id.'<br>';
        echo $slug;
    }
    public function search(): void
    {
        $keyword = $_GET['keyword'] ?? '';
        echo "Từ khoá cần tìm là : " .$keyword;
    }

}