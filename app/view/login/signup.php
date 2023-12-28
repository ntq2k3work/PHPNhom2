<!DOCTYPE html>
<html lang="en">

<head>
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
    if (isset($_SESSION['ERROR'])) {
        require "app/view/admin/notification/noti_error.php";
        unset($_SESSION['ERROR']);
    }
    ?>
    <section class="vh-100 gradient-custom">
        <div class="py-5 h-100">
            <div class="row d-flex justify-content-center align-items-center h-100 m-0">
                <div class="col-12 col-md-8 col-lg-6 col-xl-5">
                    <div class="card bg-dark text-white" style="border-radius: 1rem;">
                        <div class="card-body p-5 text-center">

                            <form action="/login/addUser" method="post" class="mb-md-2 mt-md-2 pb-5">
                                <h2 class="fw-bold mb-2 text-uppercase">Đăng ký</h2>
                                <p class="text-white-50 mb-5">Vui lòng nhập tài khoản và mật khẩu!</p>
                                <div class="row">
                                    <div class="wrap-input100 validate-input col-6">
                                        <input class="input100" type="text" placeholder="Họ" name="last_name" id="last_name" required>
                                        <span class="focus-input100"></span>
                                        <span class="symbol-input100">
                                            <i class='bx bx-user'></i>
                                        </span>
                                    </div>
                                    <div class="wrap-input100 validate-input col-6">
                                        <input class="input100" type="text" placeholder="Tên" name="first_name" id="first_name" required>
                                        <span class="focus-input100"></span>
                                        <span class="symbol-input100">
                                            <i class='bx bx-user'></i>
                                        </span>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="wrap-input100 validate-input col-8">
                                        <input class="input100" type="date" placeholder="Ngày sinh" name="birthday" id="birthday" value="2023-01-01" required>
                                        <span class="focus-input100"></span>
                                        <span class="symbol-input100">
                                            <i class='bx bx-calendar'></i>
                                        </span>
                                    </div>
                                    <div class="wrap-input100 validate-input col-4 d-flex align-item-center mt-2">
                                        <div class="mr-2"><input class="" type="radio" placeholder="Tên" name="gender" id="gender" value="1" checked > Nam</div>
                                        <div><input class="" type="radio" placeholder="Tên" name="gender" id="gender" value="0" > Nữ  </div>
                                        <span class="focus-input100"></span>
                                        <span class="symbol-input100">
                                        </span>
                                    </div>
                                </div>
                                <div class="wrap-input100 validate-input">
                                    <input class="input100" type="text" placeholder="Tài khoản" name="username" id="username">
                                    <span class="focus-input100 "></span>
                                    <span class="symbol-input100">
                                        <i class='bx bx-user'></i>
                                    </span>
                                </div>
                                <div class="wrap-input100 validate-input">
                                    <input autocomplete="off" class="input100" type="password" placeholder="Mật khẩu" name="password" id="password-field" required>
                                    <span toggle="#password-field" class="bx fa-fw bx-hide field-icon click-eye"></span>
                                    <span class="focus-input100 errorpass"></span>
                                    <span class="symbol-input100">
                                        <i class='bx bx-key'></i>
                                    </span>
                                </div>
                                <div class="wrap-input100 validate-input">
                                    <input autocomplete="off" class="input100" type="password" placeholder="Nhập lại mật khẩu" name="passwordConfirm" id="passwordConfirm-field" required>
                                    <span toggle="#password-field" class="bx fa-fw bx-hide field-icon click-eye"></span>
                                    <span class="focus-input100"></span>
                                    <span class="symbol-input100">
                                        <i class='bx bx-key'></i>
                                    </span>
                                </div>
                                
                                <div class="wrap-input100 validate-input">
                                    <input class="input100" type="phone" placeholder="Số điện thoại" name="phone" id="phone" required>
                                    <span class="focus-input100"></span>
                                    <span class="symbol-input100">
                                        <i class='bx bx-phone'></i>
                                    </span>
                                </div>
                                <div class="wrap-input100 validate-input">
                                    <input class="input100" type="email" placeholder="Email" name="email" id="email" required>
                                    <span class="focus-input100"></span>
                                    <span class="symbol-input100">
                                        <i class="fa-regular fa-envelope"></i>
                                    </span>
                                </div>
                                <div class="wrap-input100 validate-input">
                                    <input class="input100" type="text" placeholder="Quê quán" name="address" id="address" required>
                                    <span class="focus-input100"></span>
                                    <span class="symbol-input100">
                                        <i class='bx bx-home'></i>
                                    </span>
                                </div>
                                <!-- <div class="form-check text-left m-l-10 text-small" style="font-size: 16px;">
                                    <input class="form-check-input" name="remember" type="checkbox" value="" id="form2Example31" />
                                    <label class="form-check-label " style="padding-left: 5px;" for="form2Example31"> Nhớ mật khẩu </label>
                                </div> -->
                                <input id="btnSubmit" class="btn btn-outline-light btn-lg px-5 text-dark mt-4 w-50" type="submit" value="Đăng Ký">
                                <p class="small mb-3 pb-lg-2"><a class="text-white-50" href="/login/forgot">Quên mật khẩu?</a></p>

                            </form>
                            <div>
                                <p class="mb-0 text-white">Đã có tài khoản <a href="/login" class="text-white-50 fw-bold">Đăng nhập</a>
                                </p>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</body>
<script src="/public/assets/admin/js/close_modal.js"></script>
<script src="https://unpkg.com/boxicons@latest/dist/boxicons.js"></script>
<script src="/public/assets/admin/vendor/jquery/jquery-3.2.1.min.js"></script>
<script src="/public/assets/admin/vendor/bootstrap/js/popper.js"></script>
<script src="/public/assets/admin/vendor/bootstrap/js/bootstrap.min.js"></script>
<script src="/public/assets/admin/vendor/select2/select2.min.js"></script>
<script type="text/javascript">
    //show - hide mật khẩu
    $(".click-eye").click(function() {
        $(this).toggleClass("bx-show bx-hide");
        var input = $($(this).attr("toggle"));
        if (input.attr("type") == "password") {
            input.attr("type", "text");
        } else {
            input.attr("type", "password");
        }
    });
    function validateRegistrationForm() {
  var email = document.getElementById("email").value;
  var phone = document.getElementById("phone").value;
  var password = document.getElementById("password-field").value;
  var confirmPassword = document.getElementById("passwordConfirm-field").value;

  // Kiểm tra xem các trường nhập liệu có rỗng không

  
}
</script>

</html>