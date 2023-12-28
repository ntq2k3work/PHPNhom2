<?php 
    if(!isset($_SESSION['userID'])){
        header('location:/home');
        exit;
    }
?>
<div class="user_form "  >
    <div class="user_main">
        <p class="user_name"><?php echo $_SESSION['name'] ?> </p>
        <ul style="list-style-type: none;">
            <li style="list-style: none;" class="user_information"><a href="/User/index/<?php echo $_SESSION['userID'] ?>">Thông tin cá nhân</a></li>
            <li style="list-style: none;" class="user_information"><a href="/User/cartUser/<?php echo $_SESSION['userID'] ?>">Danh sách hàng đã đặt</a></li>
        </ul>
    </div>
    <hr style="opacity: 0.3; margin: 12px;">
    <ul class="sign_help" style="list-style-type: none;">
        <li class="move_sign_up" style="list-style: none;"><a href="/login/logout">Đăng xuất</a></li>
    </ul>
</div>

