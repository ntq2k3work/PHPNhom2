<?php

class AdminController extends \core\BaseController
{
    public $model;
    public $data = [];
    public function __construct()
    {
        $this ->model = $this ->model('AdminModel');
    }
    public function index()
    {
        $this ->render('admin/index');

    }
    // Xử lí phần login
    public function checklog()
    {
        // session_start();
        if(empty($_POST['username']) || empty($_POST['password'])){
            $_SESSION['ERROR'] = "Vui lòng nhập đầy đủ thông tin !";
        }else{
            $username = addslashes($_POST['username']);
            $password = addslashes($_POST['password']);
            $admin =  ($this -> model) -> checklog($username,$password);

            if($admin['id']){
                $_SESSION['acAdmin'] = strtoupper($admin['username']);
                header('location:/admin/dashboard/');
                exit();
            }else{
                $_SESSION['ERROR'] = "Sai tài khoản hoặc mật khẩu";
            }
        }
        header('location:/admin/');
    }
    public function logout()
    {
        unset($_SESSION['acAdmin']);
        header('location:/admin');
    }
    // Xứ lí phần forgot
    public function forgot()
    {
        $this ->render('admin/forgot');

    }
    public function repassword()
    {
        if(empty($_POST['emailInput'])){
            $_SESSION['ERROR'] = "Vui lòng nhập đầy đủ thông tin !";
            header("location:/admin/forgot");
            exit();
        }else{
            $email = $_POST['emailInput'];
            ($this -> model) -> sendPass($email);
            $_SESSION['success'] = "Đã gửi lại password!"; 
        }
        header("location:/admin/forgot");
    }
    public function dashboard()
    {
        $this -> data['Quantity_KH'] = mysqli_num_rows(($this -> model) -> selectCustomer());
        $this -> data['Customers'] =($this -> model) -> selectCustomer();
        $this -> data['Quantity_Product'] =mysqli_num_rows(($this -> model) -> selectProduct()['justProduct']);
        $this -> data['Quantity_Bill'] =mysqli_num_rows(($this -> model) -> selectBill());
        $this -> data['Bills'] =($this -> model) -> CustomerTN();
        $this ->render('admin/dashboard/index',$this -> data);
    }
    public function QuanLyKH($action = "")
    {
        if($action == "true"){
            $_SESSION['success'] = "Xoá thành công !";
            unset($_SESSION['success']);

        }
        if($action == "inserted"){
            $_SESSION['success'] = "Tạo thành công !";
            unset($_SESSION['success']);

        }
        
        $this -> data['Customers'] = ($this -> model) -> selectCustomer();
        $this ->render('admin/dashboard/table-data-user',$this ->data);
        if(!empty($action)){
            $action = explode('=',$action);
            
            if(count($action) >= 2){
                $id = $action[1];
                // Thêm
                if($action[0] == 'insertUser'){
                    $this -> render('admin/notification/addUser');
                }
                if($action[0] == "insertedUser"){
                    $last_name = $_POST['last_name'];
                    $first_name = $_POST['first_name'];
                    $birthday = $_POST['birthday'];
                    $gender = $_POST['gender'];
                    $username = $_POST['username'];
                    $password = $_POST['password'];
                    $confirmpassword = $_POST['confirmpassword'];
                    $phone = $_POST['phone'];
                    $address = $_POST['address'];
                    $email = $_POST['email'];
                    $token = md5("user_%" . $username);
                    $val_pass = true;
                    if($gender == "1"){
                        $gender = 1;
                    }else{
                        $gender = 0;
        
                    }
                    if (strlen($password) < 8) {
                        $val_pass =  false;
                    }
                
                    // Kiểm tra mật khẩu có chứa ít nhất một chữ cái viết hoa
                    if (!preg_match("/[A-Z]/", $password)) {
                        $val_pass =  false;
                    }
                
                    // Kiểm tra mật khẩu có chứa ít nhất một chữ cái viết thường
                    if (!preg_match("/[a-z]/", $password)) {
                        $val_pass =  false;
                    }
                
                    // Kiểm tra mật khẩu có chứa ít nhất một số
                    if (!preg_match("/[0-9]/", $password)) {
                        $val_pass =  false;
                    }
                
                    // Kiểm tra mật khẩu có chứa ít nhất một ký tự đặc biệt
                    if (!preg_match("/[^A-Za-z0-9]/", $password)) {
                        $val_pass =  false;
                    }
                    if($val_pass == false){
                        $_SESSION['ERROR'] = "Mật khẩu phải từ 8 ký tự trở lên có ít nhất 1 ký tự đặc biệt,1 số, 1 chữ hoa, 1 chữ thường";
                        $this -> render('admin/notification/noti_error');
                        
                    }
                    if($password != $confirmpassword){
                        $_SESSION['ERROR'] = "Mật khẩu không khớp nhau !";
                        $this -> render('admin/notification/noti_error');
                        
                    }
                    $this -> model -> insertUser($username,$password,$first_name,$last_name,$birthday,$phone,$address,$email,$gender,$token);
                    $deleted = true;
                }
                // Sửa
                $this -> data['Item'] = mysqli_fetch_array(($this->model)->selectCustomer($id));
                if($action[0] == "?updateID"){
                    $this -> data['UpdateCustomer'] = mysqli_fetch_array(($this -> model) -> selectCustomer($id));
                    $this -> render('admin/notification/editUser',$this -> data);
                }
                if($action[0] == "?ResetID"){

                    ($this -> model) ->editID($id);
                }
                if($action[0] == "?DeleteID"){
                    $_SESSION['warning'] = "Xác nhận xoá";
                    $_SESSION['link'] = "/admin/QuanLyKH/?del=";
                    $this -> render('admin/notification/warning',$this -> data);
                }
                if($action[0] == "?del"){
                    ($this -> model) ->deleteUser($id);
                    $inserted = true;

                }
            }
            
        }
        if(isset($deleted)){
            if ($deleted == true) {
                echo '<script>window.location.href = "true";</script>';
            }
        }
        if(isset($inserted)){
            if ($inserted == true) {
                echo '<script>window.location.href = "insertd";</script>';
            }
        }

    }
    public function QuanLySP($action = "")
    {
        if($action == "true"){
            $_SESSION['success'] = "Thành công !";
            unset($_SESSION['success']);
        }
        $this -> data['products'] = ($this -> model) ->selectProduct()['justProduct'];
        $this ->render('admin/dashboard/table-data-product',$this -> data);
        if($action == "addDiscount"){
            $this -> data['products'] = ($this -> model) -> selectProduct()['justProduct'];
            $this -> render('admin/notification/addDiscount',$this -> data);

        }
        if($action == "deleteAll"){
            ($this -> model) ->deleteProduct();
            $deleted = true;
        }else{
            $deleted = false;
            // Thêm
            if(isset($_GET['addID'])){
                if($_GET['addID'] == true){
                    $this -> data['categories'] = ($this -> model) -> selectProduct()['categories'];
                    $this -> data['brands'] = ($this -> model) -> selectProduct()['brands'];
                    $this -> data['materials'] = ($this -> model) -> selectProduct()['materials'];
                    $this -> render('admin/notification/addProduct',$this -> data);
                }
            }
            if(isset($_GET['insertProduct'])){
                if(isset($_POST['maSP'])){
                    $id_product = $_POST['maSP'];
                    $name_product = $_POST['tenSP'];
                    $released = $_POST['released'];
                    $shape = $_POST['shape'];
                    $color = $_POST['color'];
                    $size = $_POST['size'];
                    $battery = $_POST['battery'];
                    $id_material = $_POST['material'];
                    $water = $_POST['water'];
                    $brand = $_POST['brand'];
                    $quantity = $_POST['SoLuong'];
                    $price = $_POST['GiaTien'];
                    $id_categories = $_POST['categories'];
                    $description = $_POST['noidung'];
                    $photo_new = $_FILES['img'];
                    $folder = 'public/assets/client/img/image_product/';
                    $file_name = "";
                    if($photo_new['size'] > 0){
                        ///Đến số dấu chấm trong ảnh
                        $cnt = 0;
                        for($i = 0 ; $i < strlen($photo_new['name']);$i++){
                            if($photo_new['name'][$i] == '.') $cnt++;
                        }
                        ///Xử lí upload file từ clientđ 
                        $file_extension = explode('.',$photo_new['name'])[$cnt]; /// Lấy định dạng ảnh
                        if($cnt == 0) $file_extension = 'jpg';
                        $file_name = time() . '.' .$file_extension; ///Thay đổi tên ảnh trên sever để tránh trùng
                        $path_file = $folder . $file_name; //Đường dẫn ảnh
                        move_uploaded_file($photo_new["tmp_name"],$path_file); //Di chuyển ảnh từ thư mục tmp đến thư mục cần lưu qua đường dẫn
                        ($this -> model) ->insertProduct($name_product,$quantity,$price,$id_categories,$id_material,$released,$shape,$color,$size,$battery,$water,$brand,$description,$id_product,$file_name);
                        $deleted = true;
                    }
                }
                if(isset($deleted)){
                    if ($deleted == true) {
                        echo '<script>window.location.href = "true";</script>';
                    }
                }
            }
            if(!empty($action)){
                $action = explode('=',$action);
                if(count($action) >= 2){
                    $id = $action[1];
                    $this -> data['Item'] = mysqli_fetch_array(($this->model)->selectProduct($id)['justProduct']);
                    $this -> data['UpdateProducts'] = mysqli_fetch_array(($this->model)->selectProduct($id)['justProduct']);
                    // Thêm khuyến mãi
                    if($action[0] == "?addDiscount"){
                        $id_product = $_POST['id_product'];
                        $percent = $_POST['percent'];
                        $time_start = $_POST['time_start'];
                        $time_finish = $_POST['time_finish'];
                        $this -> model -> addDiscount($id_product,$percent,$time_start,$time_finish);
                        $deleted = true;

                    }
                    // Sửa
                    if($action[0] == "?updateID"){
                        $this -> data['categories'] = ($this -> model) -> selectProduct($id)['categories'];
                        $this -> data['brands'] = ($this -> model) -> selectProduct($id)['brands'];
                        $this -> data['materials'] = ($this -> model) -> selectProduct($id)['materials'];
                        $this -> render('admin/notification/editProduct',$this -> data);
                    }
                    if($action[0] == "?editID"){
                        if(isset($_POST['id'])){
                            $id = $_POST['id'];
                            $id_product = $_POST['id_product'];
                            $name_product = $_POST['name_product'];
                            $released = $_POST['released'];
                            $shape = $_POST['shape'];
                            $color = $_POST['color'];
                            $size = $_POST['size'];
                            $battery = $_POST['battery'];
                            $water = $_POST['water'];
                            $brand = $_POST['brand'];
                            $quantity = $_POST['SoLuong'];
                            $price = $_POST['GiaTien'];
                            $id_material = $_POST['material'];
                             $id_categories = $_POST['categories'];
                            $description = $_POST['noidung'];
                            $photo_new = $_FILES['img'];
                            $folder = 'public/assets/client/img/image_product/';
                            $file_name = "";

                            if($photo_new['size'] > 0){
                                ///Đến số dấu chấm trong ảnh
                                $cnt = 0;
                                for($i = 0 ; $i < strlen($photo_new['name']);$i++){
                                    if($photo_new['name'][$i] == '.') $cnt++;
                                }
                                ///Xử lí upload file từ clientđ 
                                $file_extension = explode('.',$photo_new['name'])[$cnt]; /// Lấy định dạng ảnh
                                if($cnt == 0) $file_extension = 'jpg';
                                $file_name = time() . '.' .$file_extension; ///Thay đổi tên ảnh trên sever để tránh trùng
                                $path_file = $folder . $file_name; //Đường dẫn ảnh
                                move_uploaded_file($photo_new["tmp_name"],$path_file); //Di chuyển ảnh từ thư mục tmp đến thư mục cần lưu qua đường dẫn
                            }
                            ($this -> model) ->editProduct($id,$name_product,$quantity,$price,$id_categories,$id_material,$released,$shape,$color,$size,$battery,$water,$brand,$description,$id_product,$file_name);
                            $deleted = true;
                        }
                    }
                    // 
                    // Xoá
                    if($action[0] == "?deleteID"){
                        $_SESSION['warning'] = "Xác nhận xoá";
                        $_SESSION['link'] = "/admin/QuanLySP/?del=";
                        $this -> render('admin/notification/warning',$this -> data);
                    }
                    
                    if($action[0] == "?del"){
                        $i = ($this -> model) ->deleteDiscount($id);
                        if(isset($i)){
                            ($this -> model) ->deleteProduct($id);
                        }
                        $deleted = true;

                    }
                    // 
                }
            }
        }
        if ($deleted == true) {
            echo '<script>window.location.href = "true";</script>';
        }

    }
    public function QuanLyDonHang($action = "")
    {
        $this -> data['bill'] = ($this -> model) ->selectBill();  
        $dataBill = [];
        foreach($this -> data['bill'] as $bill){ 
            $dataBill[$bill['code_bill']][] = array(
                'name_product' => $bill['name_product'],
                'quantity' => $bill['quantity'],
                'SumMoney' => $bill['TongTien'],
                'status' => $bill['status']
            );
        }
        $this -> data['dataBill'] = $dataBill;
        $this ->render('admin/dashboard/table-data-order',$this -> data);
        if($action == "true"){
            $_SESSION['success'] = "Xoá thành công !";
            unset($_SESSION['success']);
        }
        if($action == "deleteAll"){
            ($this -> model) ->deleteBill();
            $deleted = true;
        }else{
            $deleted = false;
            if(!empty($action)){
                $action = explode('=',$action);
                if(count($action) >= 2){    
                    $id = $action[1];
                    // 
                    $this -> data['Item'] = mysqli_fetch_array(($this->model)->selectBill($id));
                    // Xoá
                    if($action[0] == "?deleteID"){
                        $_SESSION['warning'] = "Xác nhận xoá đơn hàng";
                        $_SESSION['link'] = "/admin/QuanLyDonHang/?del=";
                        $this -> render('admin/notification/warning',$this -> data);
                    }
                    
                    if($action[0] == "?del"){
                        ($this -> model) ->deleteBill($id);
                        $deleted = true;

                    }
                    // Xác nhận đơn
                    if($action[0] == "?Checked"){
                        $code_bill = $action[1];
                        $this -> model -> GetCompleteBill($code_bill);
                        $deleted = true;
                    }
                }
            }
        }
        if(isset($deleted)){
            if ($deleted == true) {
                echo '<script>window.location.href = "true";</script>';
            }
        }
    }
    public function QuanLyThuongHieu($action = "")
    {
        if($action == "true"){
            $_SESSION['success'] = "Xoá thành công !";
            unset($_SESSION['success']);

        }
        if($action == "inserted"){
            $_SESSION['success'] = "Thêm thành công !";
            unset($_SESSION['success']);

        }
        if($action == "updated"){
            $_SESSION['success'] = "Thêm thành công !";
            unset($_SESSION['success']);

        }
        $this -> data['categories'] = ($this -> model) -> selectBrand();
        $this ->render('admin/dashboard/table-data-brand',$this -> data);
        if($action == "true"){
            $_SESSION['success'] = "Thành công !";
        }
        $action = explode('=',$action);
                if(count($action) >= 2){
                    $id = $action[1];
                    // update
                    if($action[0] == '?UpdateTH'){
                        $this -> data['id'] = $id;
                        $this -> data['brand'] = mysqli_fetch_array($this -> model ->selectBrand($id));
                       
                        $this -> render('admin/notification/editBrand',$this -> data);
                    }
                    if($action[0] == '?Updated'){
                        $this -> data['id'] = $id;
                        if(isset($_POST['name_brand']) && isset($_POST['address']) && isset($_POST['email']) && isset($_POST['phone'])){
                            $name_brand = $_POST['name_brand'];
                            $address = $_POST['address'];
                            $email = $_POST['email'];
                            $phone = $_POST['phone'];
                            $this -> model ->UpdatedBrand($name_brand,$id,$address,$email,$phone);
                            $updated = true;
                        }
                    }
                    
                    // insert
                    if($action[0] == '?Insert'){
                        $this -> render('admin/notification/addBrand',$this -> data);
                    }
                    if($action[0] == '?inserted'){
                        $name_brand = $_POST['nameBrand'];
                        $address = $_POST['address'];
                        $email = $_POST['email'];
                        $phone = $_POST['phone'];
                        ($this -> model) ->insertBrand($name_brand,$address,$email,$phone);
                        $inserted = true;
                    }
                    // Xoá
                    if($action[0] == "?deleteBrand"){
                        $_SESSION['warning'] = "Xoá danh mục sẽ mất tất cả các sản phẩm trong thương hiệu này";
                        $_SESSION['link'] = "/admin/QuanLyThuongHieu/?del=";
                        $this -> data['Item'] = mysqli_fetch_array($this -> model -> selectBrand($id));
                        $this -> render('admin/notification/warning',$this -> data);
                    }
                    if($action[0] == "?del"){
                        ($this -> model) ->deleteBrand($id);
                        $deleted = true;
            
                    }
                    if($action[0] == "?delAll"){
                        ($this -> model) ->deleteBrand($id);
                        $deleted = true;
            
                    }
                }
                if(isset($deleted)){
                    if ($deleted == true) {
                        echo '<script>window.location.href = "true";</script>';
                    }
                }
                if(isset($inserted)){
                    if ($inserted == true) {
                        echo '<script>window.location.href = "inserted";</script>';
                    }
                }
                if(isset($updated)){
                    if ($updated == true) {
                        echo '<script>window.location.href = "updated";</script>';
                    }
                }
                
    }
    
}