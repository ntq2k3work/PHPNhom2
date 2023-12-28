<?php 
class CartController extends \core\BaseController
 {
    private $cartModel;
    public $data = [];
    public function __construct() {
        $this->cartModel = $this -> model("CartModel");
    }

    public function index($action = "") {
        $action = explode('=',$action);
        if(count($action) >= 2){
            $id = $action[1];
        }
        if(!empty($id)){
            if($action['0'] == "SubtractID"){
                if($_SESSION['cart']["$id"] > 1)$_SESSION['cart']["$id"] --;
            }
            if($action['0'] == "AddID") $_SESSION['cart']["$id"] ++;
            if($action[0] == "nextpage") $this -> data['nextpage'] = $id;
        }
        if(isset($_SESSION['success'])){
            $content = $_SESSION['success'];
            echo "<script>alert('$content')</script>";
            unset($_SESSION['success']);
        }
        if(isset($_SESSION['userID'])){
            $this -> data['items'] = $_SESSION['cart'];
            $this -> data['user'] = $this -> cartModel -> getUser($_SESSION['userID']);
            // $this -> data['page'] = $page;
            $this -> render("layouts/_main",$this -> data,"cart/index");
            if(isset($_GET['ThanhToan'])){
                header("location:Cart/ThanhToan");
                exit;
            }
        }else{
            $_SESSION['ERROR'] = "Đăng nhập để thực hiện chức năng này";
            header("location:/home");

        }
    }

    public function addToCart($id) {
        if(isset($_SESSION['userID'])){
            $quantity = $_POST['quantity'];
            if(empty($_SESSION['cart'])){
                $_SESSION['cart']["$id"] = $quantity;
            }else{
                if(!empty($_SESSION['cart']["$id"])) {
                    $_SESSION['cart']["$id"] += $quantity;

                }else{
                    $_SESSION['cart']["$id"] = 1;
                }
            }
            header("location:/product/detail/$id");
            exit;
        }else{
            $_SESSION['ERROR'] = "Đăng nhập để thực hiện chức năng này";
            header("location:/home");
            exit;
        }
    }

    public function removeFromCart($id) {
 
        $quantity = $_GET['quantity'];
        unset($_SESSION['cart'][$id]);
        echo $_SESSION['sum_cart'];
        $previous_page = $_SERVER['HTTP_REFERER'];
        header("location:$previous_page");
    }
    public function ThanhToan($method = "") {
        // Thanh toán online
            $this -> data['items'] = $_SESSION['cart'];
            $this -> data['sumPrice'] = $_SESSION['sumPrice'];
            $this -> data['user'] = mysqli_fetch_array($this -> cartModel -> getUser($_SESSION['userID']));
            $this -> render("layouts/_main",$this->data,"cart/thanhtoan");
            // $this -> render("cart/thanhtoan");
            // $quantity = $_GET['quantity'];
            // unset($_SESSION['cart'][$id]);
            // echo $_SESSION['sum_cart'];
            // $previous_page = $_SERVER['HTTP_REFERER'];
            // header("location:$previous_page");
    }

    public function clearCart() {
        $this->cartModel->clearCart();
        $this->index();
    }
    public function result_atm($content = ""){
        // $_SESSION['success'] = "Thành công";
        $content = explode('&',$content);
        $id = explode("=",$content[13])[1];
        $code_bill = explode("=",$content[4])[1];
        $price = explode("=",$content[3])[1];
        $time = explode("%",explode("=",$content[10])[1])[0];
        $bill = mysqli_fetch_array($this -> cartModel -> ThanhToan($id,$code_bill,$time));
            $id_bill = $bill['id'];
            foreach($_SESSION['cart'] as $id => $value){
                $sql_insert_orderdetail = "insert into orderdetail(id_bill,id_products,quantity,code_bill)
                values('$id_bill','$id','$value','$code_bill')";
                $sql_update_product = "update product set quantity = quantity-'$value' 
                where id = '$id' and quantity >= '$value'";
                (new connect()) ->execute($sql_insert_orderdetail);
                (new connect()) ->execute($sql_update_product);
            }
            $_SESSION['success'] = "Đặt hàng thành công !";
            unset($_SESSION['cart'] );
            header("location:/Cart/");
    }
    public function Complete($method = ""){
        $id = $_POST['id'];
        $method = $_POST['httt_ma'];
        if(isset($_POST['httt2'])){
            $method1 = $_POST['httt2'];
        }
        if(isset($method1)){
                $api_access = [
                    "partnerCode" => "MOMOBKUN20180529",
                    "accessKey" => "klm05TvNBzhg7h7j",
                    "secretKey" => "at67qH6mk8w5Y1nAyMoYKMWACiEi2bsa"
                ];
                function execPostRequest($url, $data){
                    $ch = curl_init($url);
                    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
                    curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
                    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                    curl_setopt(
                        $ch,
                        CURLOPT_HTTPHEADER,
                        array(
                            'Content-Type: application/json',
                            'Content-Length: ' . strlen($data)
                        )
                    );
                    curl_setopt($ch, CURLOPT_TIMEOUT, 5);
                    curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 5);
                    //execute post
                    $result = curl_exec($ch);
                    //close connection
                    curl_close($ch);
                    return $result;
                }
                
                $endpoint = "https://test-payment.momo.vn/gw_payment/transactionProcessor";
                $this -> data['partnerCode'] = $api_access["partnerCode"];
                $this -> data['accessKey'] = $api_access["accessKey"];
                $this -> data['secretKey'] = $api_access["secretKey"];
                $orderInfo = "Thanh toán qua MOMO :" . $id;
                $amount = "".$_SESSION['sumPrice'];
                $orderId = time() . ""; //Mã đơn hàng
                $returnUrl = "http://btlphp.test:8080/Cart/result_atm/";
                $notifyurl = "http://localhost:8000/atm/ipn_momo.php";
                // Lưu ý: link notifyUrl không phải là dạng localhost
                $bankCode = "SML";
                    $partnerCode = $api_access["partnerCode"];
                    $accessKey = $api_access["accessKey"];
                    $serectkey = $api_access["secretKey"];
                    $orderid = time() . "";
                    $bankCode = $bankCode;
                    $returnUrl = $returnUrl;
                    $requestId = time() . "";
                    $requestType = "payWithMoMoATM";
                    $extraData = "".$id;
                    //before sign HMAC SHA256 signature
                    $rawHashArr =  array(
                        'partnerCode' => $partnerCode,
                        'accessKey' => $accessKey,
                        'requestId' => $requestId,
                        'amount' => $amount,
                        'orderId' => $orderId,
                        'orderInfo' => $orderInfo,
                        'bankCode' => $bankCode,
                        'returnUrl' => $returnUrl,
                        'notifyUrl' => $notifyurl,
                        'extraData' => $extraData,
                        'requestType' => $requestType
                    );
                    // echo $serectkey;die;
                    $rawHash = "partnerCode=" . $partnerCode . "&accessKey=" . $accessKey . "&requestId=" . $requestId . "&bankCode=" . $bankCode . "&amount=" . $amount . "&orderId=" . $orderid . "&orderInfo=" . $orderInfo . "&returnUrl=" . $returnUrl . "&notifyUrl=" . $notifyurl . "&extraData=" . $extraData . "&requestType=" . $requestType;
                    $signature = hash_hmac("sha256", $rawHash, $serectkey);

                    $this -> data =  array(
                        'partnerCode' => $partnerCode,
                        'accessKey' => $accessKey,
                        'requestId' => $requestId,
                        'amount' => $amount,
                        'orderId' => $orderid,
                        'orderInfo' => $orderInfo,
                        'returnUrl' => $returnUrl,
                        'bankCode' => $bankCode,
                        'notifyUrl' => $notifyurl,
                        'extraData' => $extraData,
                        'requestType' => $requestType,
                        'signature' => $signature
                    );

                    $result = execPostRequest($endpoint, json_encode($this -> data));
                    $jsonResult = json_decode($result, true);  // decode json
                    header('location:' . $jsonResult['payUrl']);
                    error_log(print_r($jsonResult, true));
                $this -> render("layouts/_main",$this->data,"cart/momo");
        }
        if(isset($method)){
            $bill = mysqli_fetch_array($this -> cartModel -> ThanhToan($id));
            $id_bill = $bill['id'];
            $code_bill = $bill['code_bill'];
            foreach($_SESSION['cart'] as $id => $value){
                $sql_insert_orderdetail = "insert into orderdetail(id_bill,id_products,quantity,code_bill)
                values('$id_bill','$id','$value','$code_bill')";
                (new connect()) ->execute($sql_insert_orderdetail);
            }
            $_SESSION['success'] = "Đặt hàng thành công !";
            unset($_SESSION['cart'] );
            header("location:/Cart/");
        }
        
    }
    public function deleteCart($id = ""){
        if(!empty($id)){
            unset($_SESSION['cart'][$id]);
        }
        $_SESSION['success'] = "Xoá thành công !";
        header("location:/Cart/");
    }
}