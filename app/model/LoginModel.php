<?php
// require_once './configs/connect.php';
class LoginModel
{

    public function checklog($username,$password)
    {
        $sql_check = "select * from customer where name_account = '$username' and password = '$password'";
        $user = (new connect()) ->query($sql_check);
        return mysqli_fetch_array($user);
    }
    public function sendPass($email)
    {
        $sql_check_id = "select id from customer where email = '$email'";
        $id = (new connect()) ->query($sql_check_id);
        if(mysqli_num_rows($id)){
            $to = $email;
            $subject = "Reset Password";
            $repass  = substr(md5(rand(1,10000000)),0,6);
            $sql_update_pass = "update customer set password = '$repass' where email = '$email'";
            $txt = "Mật khẩu mới của bạn là '$repass'";
            $headers = "From: adminWebClock@gamil.com" . "\r\n".
            "CC: '$email'";
            mail($to,$subject,$txt,$headers);
            (new connect()) ->execute($sql_update_pass);
        }
    }
}
?>