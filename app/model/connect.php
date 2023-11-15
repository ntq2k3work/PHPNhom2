<?php
class connect{
    public function cn(){
        $connect = mysqli_connect("localhost","root","","clockweb");
        mysqli_set_charset($connect,"utf8");
        return $connect;
    }
    public function query($param){
        $connect = $this->cn();
        $result = mysqli_query($connect,$param);
        mysqli_close($connect);
        return $result;
    }
    public function execute($param):void{
        $connect = $this->cn();
        $result = mysqli_query($connect,$param);
        mysqli_close($connect);
    }
}



