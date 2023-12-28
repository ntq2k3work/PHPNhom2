<?php
class connect{
    public function cn(){
        $database = new database(2);
        // $database ->setDatabase(2);
        $connect = mysqli_connect($database ->host,$database ->user,$database ->password,$database ->db);
        if($connect ->connect_error){
            die("Không thể kết nối với database");
        }
        mysqli_set_charset($connect,"utf8");
        return $connect;
    }
    public function query($param){
        $connect = $this->cn();
        $result = mysqli_query($connect,$param);
        mysqli_close($connect);
        return $result;
    }
    public function execute($param){
        $connect = $this->cn();
        $result = mysqli_query($connect,$param);
        mysqli_close($connect);
    }
}



