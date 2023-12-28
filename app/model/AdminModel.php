<?php
// require_once './configs/connect.php';
class AdminModel
{

    public function checklog($username,$password)
    {
        $sql_check = "select * from admin where username = '$username' and password = '$password'";
        $admin = (new connect()) ->query($sql_check);
        return mysqli_fetch_array($admin);
    }
    public function sendPass($email)
    {
        $sql_check_id = "select id from admin where email = '$email'";
        $id = (new connect()) ->query($sql_check_id);
        if(mysqli_num_rows($id)){
            $to = $email;
            $subject = "Reset Password";
            $repass  = substr(md5(rand(1,10000000)),0,6);
            $sql_update_pass = "update admin set password = '$repass' where email = '$email'";
            $txt = "Mật khẩu mới của bạn là '$repass'";
            $headers = "From: adminWebClock@gamil.com" . "\r\n".
            "CC: '$email'";
            mail($to,$subject,$txt,$headers);
            (new connect()) ->execute($sql_update_pass);
        }
    }
    public function selectCustomer($id = "")
    {
        if($id == ""){
            $sql_select_KH = "select * from customer order by id desc";
        }else{
            $sql_select_KH = "select * from customer where id = '$id'";
        }
      return (new connect()) -> query($sql_select_KH);
    }
    public function selectProduct($id ="")
    {
        $data = [];
        if($id == ""){
            $sql_select_products = "select products.*,name_categories,percent from products
                INNER JOIN categories on products.id_categories = categories.id_categories
                left join discount on discount.id_product = products.id
            ";
        }else{
            $sql_select_products = "select * from products 
            left join discount on discount.id_product = products.id
            where products.id = '$id'";
        }
        $sql_select_categories = "select * from categories";
        $sql_select_brand = "select * from brand";
        $sql_select_material = "select * from material";
        $data['categories'] = (new connect()) -> query($sql_select_categories);
        $data['brands'] = (new connect()) -> query($sql_select_brand);
        $data['justProduct'] = (new connect()) -> query($sql_select_products);
        $data['materials'] = (new connect()) -> query($sql_select_material);
      return ($data);
    }
    public function insertProduct($name_product,$quantity,$price,$id_categories,$id_material,$released,$shape,$color,$size,$battery,$water,$brand,$description,$id_product,$file_name){
        $sql_insert = "insert into products(name_product,quantity,price,id_categories,id_material,released,shape,color,size,battery,water_resistance,id_brand,description,id_product,image)
        value('$name_product','$quantity','$price','$id_categories','$id_material','$released','$shape','$color','$size','$battery','$water','$brand','$description','$id_product','$file_name')";
        (new connect()) ->execute($sql_insert);
    }
    public function editProduct($id, $name_product, $quantity, $price, $id_categories, $id_material, $released, $shape, $color, $size, $battery, $water, $brand, $description = "", $id_product = "", $file_name = 0)
{
    if ($id != "") {
        if (!empty($file_name)) {
            $sql_update_products = "UPDATE products SET id_product = '$id_product', name_product = '$name_product', price = '$price', quantity = '$quantity',
                image = '$file_name', released = '$released', shape = '$shape', color = '$color', size = '$size', battery = '$battery', water_resistance = '$water', id_brand = '$brand', description = '$description', id_categories = '$id_categories',
                id_material = '$id_material'
                WHERE id = '$id';";
        } else {
            $sql_update_products = "UPDATE products SET id_product = '$id_product', name_product = '$name_product', price = '$price', quantity = '$quantity',
                released = '$released', shape = '$shape', color = '$color', size = '$size', battery = '$battery', water_resistance = '$water', id_brand = '$brand', description = '$description', id_categories = '$id_categories',
                id_material = '$id_material'
                WHERE id = '$id'";
        }
        (new connect())->execute($sql_update_products);
    }
}
    public function deleteProduct($id ="")
    {
        $sql_del_products = "delete from products;";
        if($id == ""){
        }else{
            $sql_del_products = "DELETE FROM products 
            WHERE products.id = '$id'";
        }
        (new connect()) ->execute($sql_del_products);
    }
    public function UpdatedBrand($name_brand ="",$id = "",$address = "",$email = "",$phone = "")
    {
        $sql_del_products = "update brand set name_brand = '$name_brand', 
        address = '$address',email = '$email', phone = '$phone'
        where id = '$id'";
        (new connect()) ->execute($sql_del_products);
    }
    public function deleteBrand($id ="")
    {
        if($id == ""){
            $sql_del_products = "delete from products";
            $sql_del_categories = "delete from brand";
        }else{
            $sql_del_products = "delete from products where id_brand = '$id'";
            $sql_del_categories = "DELETE FROM brand 
            WHERE brand.id = '$id'";
        }
        (new connect()) ->execute($sql_del_products);
        (new connect()) ->execute($sql_del_categories);
    }
    
    // Khách hàng tiềm năng
    public function CustomerTN(){
        $sql_count_KH = "SELECT bill.id,bill.id_user,first_name,last_name,time_buy,sum(orderdetail.quantity*price) as 'Tongtien'                        
        FROM orderdetail INNER JOIN products ON products.id = orderdetail.id                                                   
        INNER JOIN bill ON orderdetail.id_bill = bill.id                                                                       
        INNER JOIN customer ON customer.id = bill.id_user GROUP BY bill.id,bill.id_user,time_buy ORDER BY Tongtien desc limit 5";
        return (new connect()) -> query($sql_count_KH); 
    }
    // Xoá tài khoản khách hàng
    public function deleteUser($id =""){
        $sql_del_User = "delete from products;";
        if($id == ""){
        }else{
            $sql_del_User = "DELETE FROM customer 
            WHERE id = '$id'";
        }
        (new connect()) ->execute($sql_del_User);
    }
    // Chỉnh sửa thông tin
    public function editID($id = ""){
        $sql_check_id = "select * from customer where id = '$id'";
        $item = (new connect()) ->query($sql_check_id);
        if(mysqli_num_rows($item)){
            $item = mysqli_fetch_array($item);
            $email = $item['email'];
            $to = $email;
            $subject = "Reset Password";
            $repass  = substr(md5(rand(1,10000000)),0,6);
            $sql_update_pass = "update customer set password = '$repass' where id = '$id'";
            $txt = "Mật khẩu mới của bạn là '$repass'";
            $headers = "From: adminWebClock@gamil.com" . "\r\n".
            "CC: '$email'";
            mail($to,$subject,$txt,$headers);
            (new connect()) ->execute($sql_update_pass);
        }
    }
    public function selectBill($id = "")
    {
        if($id == ""){
            $sql_select_KH = "SELECT id_bill,price,note,bill.code_bill,bill.id_user,orderdetail.id_products,name_product,orderdetail.quantity,first_name,last_name,phone,time_buy,orderdetail.quantity * price AS 'TongTien',bill.status
            FROM bill 
            INNER JOIN orderdetail ON bill.code_bill = orderdetail.code_bill
            INNER JOIN customer ON bill.id_user = customer.id
            INNER JOIN products ON products.id = orderdetail.id_products  where note != 1";
        }else{
            $sql_select_KH = "select * from bill where id = '$id' and note = 0";
        }
      return (new connect()) -> query($sql_select_KH);
    }
    public function deleteBill($id = ""){
        if($id != ""){
            $sql_ex = "update bill set note = 1 where id = '$id' and status = 1";
            $sql_check_status_bill = "select * from bill where id = '$id' and status = 0 ";
            $check = mysqli_num_rows((new connect()) -> query($sql_check_status_bill));
            //Kiểm tra xem có đơn chưa duyệt không
            if($check > 0){
                $sql_delete_order = "delete from orderdetail where id_bill = '$id'"; //Xoá sản phẩm
                $sql_ex = "delete from bill where id = '$id' and status = 0 ";
                (new connect()) -> execute($sql_delete_order);
            }
        }else{
            $sql_ex = "update bill set note = 1";
        }
        (new connect()) -> execute($sql_ex);
    }
    public function insertBrand($name_brand,$address,$email,$phone)
    {
        $sql = "insert into brand(name_brand,address,email,phone)
         values('$name_brand','$address','$email','$phone')";
            (new connect()) ->execute($sql);
    }
    public function insertUser($username,$password,$first_name,$last_name,$birthday,$phone,$address,$email,$gender,$token){
        $sql_insert = "insert into customer(name_account,password,first_name,last_name,birthday,phone,address,email,gender,token)
        values('$username','$password','$first_name','$last_name','$birthday','$phone','$address','$email',$gender,'$token') ";
        (new connect()) ->execute($sql_insert);
    }
    public function deleteDiscount($id = ""){
        $sql = "delete from discount where id_product = '$id'";
        (new connect()) -> execute($sql);
    }
    public function addDiscount($id_product,$percent,$time_start,$time_finish){
        $sql = "insert into discount(id_product,percent,time_start,time_finish)
            values('$id_product','$percent','$time_start','$time_finish')";
        (new connect()) ->execute($sql);
    }
    // Cập nhật đơn hàng
    public function GetCompleteBill($code_bill){
        $sql_select = " update bill set status = '1'
        where code_bill = '$code_bill' and status = '0'";
        return (new connect()) ->query($sql_select);
    }
    // Lấy ra danh mục
    public function selectBrand($id = ""){
        if($id == ""){
            $sql_count = "SELECT COUNT(*) AS SoLuong,brand.id,name_brand,address,email,phone FROM products 
            Right JOIN brand ON brand.id = products.id_brand GROUP BY brand.id,brand.name_brand";
        }else{
            $sql_count = "SELECT id,name_brand,address,phone,email from brand where id = '$id'";
        }
        return (new connect()) -> query($sql_count);
    }
}