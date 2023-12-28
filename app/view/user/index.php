<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha1/dist/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha1/dist/js/bootstrap.bundle.min.js">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js">
        <title>Chỉnh sửa thông tin</title>
    </head>
<body>
<?php 
    if(isset($_SESSION['success'])){
        require "app/view/admin/notification/noti_success.php";
        // $this -> render('admin/notification/noti_success');
        unset($_SESSION['success']);    
    }
?>
<div class="container mt-5 mb-5" style="margin-top: 80px !important;height: 680px;">
    <div class="row">
        <div class="col-md-3 ">
            <div class="d-flex flex-column align-items-center text-center p-3 py-5">
                <img class="rounded-circle mt-5" width="150px" src="https://st3.depositphotos.com/15648834/17930/v/600/depositphotos_179308454-stock-illustration-unknown-person-silhouette-glasses-profile.jpg">
                <span class="font-weight-bold"><?php echo $user['first_name'] ?></span><span class="text-black-50"><?php echo '@'.$user['name_account'] ?></span><span> </span></div>
        </div>
        <div class="col-md-5 ">
            <div class="p-3 py-5">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h4 class="text-right">Thông tin cá nhân</h4>
                </div>
                <form action="/User/index/?UpdateID=<?php echo $user['id'] ?>" method="post">
                <div class="row mt-2">
                    <div class="col-md-6"><label class="labels">Tên</label><input type="text" name="first_name" class="form-control" placeholder="first name" value="<?php echo $user['first_name'] ?>"></div>
                    <div class="col-md-6"><label class="labels">Họ</label><input type="text" name="last_name" class="form-control" value="<?php echo $user['last_name'] ?>" placeholder="surname"></div>
                </div>
                <div class="row mt-3">
                    <div class="col-md-12"><label class="labels">Ngày sinh</label><input type="date" name="birthday" class="form-control" placeholder="enter phone number" value="<?php echo $user['birthday'] ?>"></div>
                    <div class="col-md-12"><label class="labels">Số điện thoại</label><input type="text" name="phone" class="form-control" placeholder="enter phone number" value="<?php echo $user['phone'] ?>"></div>
                    <div class="col-md-12"><label class="labels">Địa chỉ</label><input type="text" name="address" class="form-control" placeholder="enter address line 1" value="<?php echo $user['address'] ?>"></div>
                    <div class="col-md-12"><label class="labels">Email</label><input type="text" name="email" class="form-control" placeholder="enter email id" value="<?php echo $user['email'] ?>"></div>
                    <div class="col-md-12"><label class="labels">Mật khẩu</label><input type="password" name="password" class="form-control" placeholder="enter email id" value="<?php echo $user['password'] ?>"></div>
                </div>
                <div class="mt-5 text-center">
                    <button class="btn btn-primary profile-button" type="submit">Lưu thông tin</button>
                </div>
                </form>

            </div>
        </div>
    </div>
</div>
</div>
</div>
</body>
</html>
