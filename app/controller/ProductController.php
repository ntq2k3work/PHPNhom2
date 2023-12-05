<?php

class ProductController extends \core\BaseController
{
    public $data = [];
    public function index()
    {
        echo  "Đây là danh sách san phẩm";
    }
    public function list($categories = "")
    {
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
        $product = $this ->model('ProductModel');
        $dataProducts = $product -> getProductList($categories);
        $this ->data['products'] = $dataProducts;
//        Render view
        $this ->render('layouts/_main',$this ->data,"products/list");
    }
    public function detail($id=0)   
    {
        if(!empty($id)){
            $product = $this ->model('ProductModel');
            $this -> data['infoProduct'] = $product -> getInfoProduct($id);
            $id_brand = $this -> data['infoProduct']['id_brand'];
            $categories = $this -> data['infoProduct']['name_categories'];
            $this -> data['sameProducts'] = (object) $product -> getSameProduct($id,$categories,$id_brand);
    //        Render view
            $this ->render('layouts/_main',$this -> data,"products/detail");
        }else{
            echo "Lỗi";
        }
    }
    
}