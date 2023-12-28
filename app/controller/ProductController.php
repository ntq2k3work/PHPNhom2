<?php

class ProductController extends \core\BaseController
{
    public $modelProduct;
    public $data = [];
    public function __construct()
    {
        $this -> modelProduct = $this -> model("ProductModel");
    }
    public function index($categories = "")
    {
        $brand = "";
        $wire_material = "";
        if($categories == "Dong-Ho-Nam"){
            $categories = "Đồng hồ nam";
        }
        if($categories == "Dong-Ho-Nu"){
            $categories = "Đồng hồ nữ";
        }
        if($categories == "Dong-Ho-Doi"){
            $categories = "Đồng hồ đôi";
        }
        if($categories == "Phu-kien"){
            $categories = "Phụ kiện";
        }
        if($categories == "Rolex"){
            $brand = "1";
            $categories = "";
        }
        if($categories == "Louis_Erard"){
            $brand = "2";
            $categories = "";

        }
        if($categories == "Mathey_Tissot"){
            $brand = "3";
            $categories = "";

        }
        if($categories == "Day_Da"){
            $wire_material = "1";
            $categories = "";

        }
        if($categories == "Day_Kim_Loai"){
            $wire_material = "2";
            $categories = "";
        }
        if($categories == "Nhua_Cao_Su"){
            $wire_material = "3";
            $categories = "";
        } 
        if($categories == "Titanium"){
            $wire_material = "4";
            $categories = "";
        }
        $this -> data['categories'] = $this -> modelProduct -> getCategories();
        // $product = $this ->model('ProductModel');
        $dataProducts = ($this -> modelProduct )-> getProductList($categories,$brand,$wire_material);
        $this ->data['products'] = $dataProducts;
        $items = [];
        foreach($dataProducts as $product){
            array_push($items,$product);
        }
        $this -> data['items'] = $items;
//        Render view
        $this ->render('layouts/_main',$this ->data,"products/list");
    }
    public function list($categories = "")
    {
       $this -> index($categories);
    }
    public function detail($id=0)   
    {
        if(!empty($id)){
            // $product = $this ->model('ProductModel');
            $this -> data['infoProduct'] = ($this -> modelProduct) -> getInfoProduct($id);

            $id_brand = $this -> data['infoProduct']['id_brand'];
            $categories = $this -> data['infoProduct']['name_categories'];
            $this -> data['sameProducts'] = (object) (($this -> modelProduct) -> getSameProduct($id,$categories,$id_brand));
    //        Render view
            $this ->render('layouts/_main',$this -> data,"products/detail");
        }else{
            echo "Lỗi";
        }
    }
    
}