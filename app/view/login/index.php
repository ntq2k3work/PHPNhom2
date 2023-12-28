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
    if (isset($_SESSION['success'])) {
        require "app/view/admin/notification/noti_success.php";
        unset($_SESSION['success']);
    }
    ?>
    <section class="vh-100 gradient-custom">
        <div class="container py-5 h-100">
            <div class="row d-flex justify-content-center align-items-center h-100" >
                <div class="col-12 col-md-8 col-lg-6 col-xl-5">
                    <div class="card bg-dark text-white" style="border-radius: 1rem;">
                        <div class="card-body p-5 text-center">

                            <form action="/login/checklog" method="post" class="mb-md-2 mt-md-2 pb-5">
                                <h2 class="fw-bold mb-2 text-uppercase">Đăng nhập</h2>
                                <p class="text-white-50 mb-5">Vui lòng nhập tài khoản và mật khẩu!</p>
                                <div class="wrap-input100 validate-input">
                                    <input class="input100" type="text" placeholder="Tài khoản" name="username" id="username">
                                    <span class="focus-input100"></span>
                                    <span class="symbol-input100">
                                        <i class='bx bx-user'></i>
                                    </span>
                                </div>
                                <div class="wrap-input100 validate-input">
                                    <input autocomplete="off" class="input100" type="password" placeholder="Mật khẩu" name="password" id="password-field">
                                    <span toggle="#password-field" class="bx fa-fw bx-hide field-icon click-eye"></span>
                                    <span class="focus-input100"></span>
                                    <span class="symbol-input100">
                                        <i class='bx bx-key'></i>
                                    </span>
                                </div>
                                <div class="form-check text-left m-l-10 text-small" style="font-size: 16px;">
                                    <input class="form-check-input" name="remember" type="checkbox" value="" id="form2Example31" />
                                    <label class="form-check-label " style="padding-left: 5px;" for="form2Example31"> Nhớ mật khẩu </label>
                                </div>
                                <p class="small mb-3 pb-lg-2"><a class="text-white-50" href="/login/forgot">Quên mật khẩu?</a></p>

                                <input class="btn btn-outline-light btn-lg px-5 text-dark" type="submit" value="Đăng Nhập">
                            </form>
                            <div>
                                <p class="mb-0 text-white">Don't have an account? <a href="/login/signup" class="text-white-50 fw-bold">Đăng ký</a>
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
</script>

</html>