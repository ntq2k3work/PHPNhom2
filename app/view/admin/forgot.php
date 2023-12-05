<?php session_start() ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Khôi phục mật khẩu | Website quản trị </title>
    <meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" type="text/css" href="/public/assets/admin/css/cssadmin/notification_error.css">
<link rel="stylesheet" type="text/css" href="/public/assets/admin/css/cssadmin/main.css">
<link rel="stylesheet" type="text/css" href="/public/assets/admin/vendor/bootstrap/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="/public/assets/admin/font-awesome-4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" type="text/css" href="/public/assets/admin/vendor/animate/animate.css">
<link rel="stylesheet" type="text/css" href="/public/assets/admin/vendor/css-hamburgers/hamburgers.min.css">
<link rel="stylesheet" type="text/css" href="/public/assets/admin/vendor/select2/select2.min.css">
<link rel="stylesheet" type="text/css" href="/public/assets/admin/css/util.css">
<link rel="stylesheet" type="text/css" href="/public/assets/admin/css/main.css">
<link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-sweetalert/1.0.1/sweetalert.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">
<link rel="stylesheet" href="https://unpkg.com/boxicons@latest/css/boxicons.min.css">
</head>

<body>
    <?php 
        if(isset($_SESSION['success'])){
            require "./notification/noti_success.php";
            unset($_SESSION['success']);
        }
    ?>
    <div class="limiter">
        <div class="container-login100">
            <div class="wrap-login100">
                <div class="login100-pic js-tilt" data-tilt>
                    <img src="/public/assets/admin/images/fg-img.png" alt="IMG">
              </div>
                <div class="login100-form validate-form" >
                    <span class="login100-form-title">
                        <b>KHÔI PHỤC MẬT KHẨU</b>
                    </span>
                    <form action="./process/process_forgot.php" method="post">
                        <div class="wrap-input100 validate-input"
                            data-validate="Bạn cần nhập đúng thông tin như: ex@abc.xyz">
                            <input class="input100" type="text" placeholder="Nhập email" name="emailInput"
                                id="emailInput" value="" />
                            <span class="focus-input100"></span>
                            <span class="symbol-input100">
                                <i class='bx bx-mail-send' ></i>
                            </span>
                        </div>
                        <div class="container-login100-form-btn">
                            <input type="submit" value="Lấy mật khẩu" />
                        </div>

                        <div class="text-center p-t-12">
                            <a class="txt2" href="/admin/index">
                                Trở về đăng nhập
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script src="/public/assets/admin/js/close_modal.js"></script>
   <!--===============================================================================================-->
   <script src="/public/assets/admin/js/main.js"></script>
   <!--===============================================================================================-->
   <script src="/public/assets/admin/vendor/jquery/jquery-3.2.1.min.js"></script>
   <!--===============================================================================================-->
   <script src="/public/assets/admin/vendor/bootstrap/js/popper.js"></script>
   <!--===============================================================================================-->
   <script src="/public/assets/admin/vendor/bootstrap/js/bootstrap.min.js"></script>
   <!--===============================================================================================-->
   <script src="/public/assets/admin/vendor/select2/select2.min.js"></script>
   <!--===============================================================================================-->
   
</body>
<script>
    var close = document.querySelector('.swal-overlay.swal-overlay--show-modal.reInput');
    var btn_close = document.querySelector('.swal-button.swal-button--confirm ');
    function closemodal(){
        close.style.display = 'none';
    }
    btn_close.onclick = function(){
        closemodal();
    };
</script>
</html>