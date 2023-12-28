<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {
  // Nhận thông tin từ yêu cầu Ajax
  session_start();
  $product_id = $_POST["product_id"];
  $quantity =  $_POST["quantity"];
//   Kiểm tra sự tồn tại của session
  if (!isset($_SESSION["quantity"])) {
      $_SESSION["quantity"] = 1;
  }else{
    if($_SESSION['quantity'] == 1 && $quantity < 0){
      //Kiểm tra trường hợp min
      $_SESSION["quantity"] = 1;
    }else{
      // Tăng giá trị số lượng
      $_SESSION["quantity"] += $quantity;
    }
  }

    // Xử lý thêm số lượng hàng - thực hiện các thao tác cần thiết (lưu vào cơ sở dữ liệu, cập nhật giỏ hàng, v.v.)
  // Phản hồi về client
  echo $_SESSION['quantity'];
  // Kết thúc kịch bản PHP

  exit();
}
?>