<?php

class HomeController extends \core\BaseController
{
    public $model;
    public $data = [];
    public function __construct()
    {
        $this ->model = $this ->model('HomeModel');

    }

    public function index(): void
    {

        $products = (new HomeModel())->getProduct("Đồng hồ nam");
        $this -> data['MaleClock'] = $products;
        $products = (new HomeModel())->getProduct("Đồng hồ nữ");
        $this -> data['FemaleClock'] = $products;
        $products = (new HomeModel())->getProduct("Đồng hồ đôi");
        $this -> data['CoupleClock'] = $products;
        $this -> render('layouts/_main',$this -> data,"home/index");
    }
    public function detail($id='',$slug='2')
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