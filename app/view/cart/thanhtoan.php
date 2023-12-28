<!DOCTYPE html>
<html lang="vi" class="h-100">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Thanh toán </title>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="/public/assets/admin/vendor/bootstrap/css/bootstrap.min.css" type="text/css">
    <!-- Font awesome -->
    <link rel="stylesheet" href="/public/assets/admin/vendor/font-awesome/css/font-awesome.min.css" type="text/css">

    <!-- Custom css - Các file css do chúng ta tự viết -->
    <link rel="stylesheet" href="../assets/css/app.css" type="text/css">
</head>

<body>
    <main role="main">
        <!-- Block content - Đục lỗ trên giao diện bố cục chung, đặt tên là `content` -->
        <div class="container mt-4">
            <form class="needs-validation" name="frmthanhtoan" method="post" action="/Cart/Complete">
                <div class="py-5 text-center">
                    <i class="fa fa-credit-card fa-4x" aria-hidden="true"></i>
                    <h2>Thanh toán</h2>
                    <p class="lead">Vui lòng kiểm tra thông tin Khách hàng, thông tin Giỏ hàng trước khi Đặt hàng.</p>
                </div>

                <div class="row">
                    <div class="col-md-4 order-md-2 mb-4">
                        <h4 class="d-flex justify-content-between align-items-center mb-3">
                            <span class="text-muted">Số lượng hàng</span>
                            <span class="badge badge-secondary badge-pill"><?php echo count($items) ?></span>
                        </h4>
                        <ul class="list-group mb-3 d-none" style="height: 350px;overflow: hidden;">
                            <!-- Chạy từng tahngwf -->
                            <?php foreach($items as $id => $value){ ?>
                                <?php
                                    $sql = "select products.*,name_categories,percent from products
                                    inner join categories on products.id_categories = categories.id_categories  
                                    left join discount on products.id = discount.id_product
                                    where products.id = '$id' ";
                                    $item = mysqli_fetch_array((new connect()) -> query($sql));
                                ?>
                            <input type="hidden" name="sanphamgiohang[1][sp_ma]" value="2">
                            <input type="hidden" name="sanphamgiohang[1][gia]" value="11800000.00">
                            <input type="hidden" name="sanphamgiohang[1][soluong]" value="2">

                            <li class="list-group-item d-flex justify-content-between lh-condensed">
                                <div>
                                    <h6 class="my-0"><?php echo $item['name_product'] ?></h6>
                                    <small class="text-muted"><?php echo number_format($item['price'],0,',') ?> x <?php echo $value ?></small>
                                </div>
                                <span class="text-muted"><?php echo number_format($item['price']*$value,0,',') ?></span>
                            </li>
                            <?php } ?>
                        </ul>
                        <div class="list-group-item d-flex justify-content-between" style="z-index: 1;">
                            <span>Tổng thành tiền</span>
                            <strong><?php echo number_format($sumPrice,0,',') ?> VNĐ</strong>
                        </div>


                        <!-- <div class="input-group">
                            <div class="input-group-append">
                                <button type="submit" class="btn btn-secondary " style="margin-left: 120px;">Xác nhận</button>
                            </div>
                        </div> -->

                    </div>
                    <div class="col-md-8 order-md-1">
                            <h4 class="mb-3">Thông tin khách hàng</h4>
                                    <input type="hidden" name="id" value="<?php echo $user['id'] ?>" readonly>
                            <div class="row">
                                <div class="col-md-12">
                                    <label for="kh_ten">Họ tên người nhận</label>
                                    <input type="text" class="form-control" name="kh_ten" id="kh_ten"
                                        value="<?php echo $user['last_name']."  ".$user['first_name']?>" readonly>
                                </div>
    
                                <div class="col-md-12">
                                    <label for="kh_dienthoai">Điện thoại</label> 
                                    <input type="text" class="form-control" name="kh_dienthoai" id="kh_dienthoai"
                                        value="<?php echo $user['phone']?>" readonly >
                                </div>
                                <div class="col-md-12">
                                    <label for="kh_email">Email</label>
                                    <input type="text" class="form-control" name="kh_email" id="kh_email"
                                        value="<?php echo $user['email']?>" readonly>
                                </div>
                                <div class="col-md-12">
                                    <label for="kh_ngaysinh">Nơi nhận hàng</label>
                                    <input type="text" class="form-control" name="kh_ngaysinh" id="kh_ngaysinh"
                                        value="<?php echo $user['address']?>" >
                                </div>
    
                            </div>
    
                            <h4 class="mb-3">Hình thức thanh toán</h4>
    
                            <div class="d-flex my-3">
                                <div class="custom-control custom-radio">
                                    <input type="radio" name="httt_ma" id="httt-1" value="1" style="margin: 0 5px 8px 0;" checked > 
                                    <label class="custom-control-label" for="httt-1">Thanh toán trực tiếp</label>
                                </div>
                                <div class="custom-control custom-radio">
                                    <input type="radio" name="httt_ma" id="CK" value="2" style="margin: 0 5px 8px 0;"> 
                                    <label class="custom-control-label" for="CK">Chuyển khoản</label>
                                    
                                </div>
                            </div>
                            <div class="justify-content-center d-none" id="thanhtoanonl">
                                    <section class="text-center mr-4">
                                        <button class="btn" type="button" name = "payUrl" style="text-decoration: none;" onclick="checked1()">
                                            <input type="radio" name="httt2" id="momo" >
                                            <img src="https://taihinh.com/public/images/momo.ico" alt="" style="width: 50px; height: 50px;">
                                            <p>Ví điện tử momo</p>
                                        </button>
                                    </section>
                                    <section class="text-center ml-4" >
                                        <button name="" class="btn" type="button"  style="text-decoration: none;" onclick="checked()">
                                            <input type="radio" name="httt2" id="vnpay">
                                            <img src="https://vnpay.vn/s1/statics.vnpay.vn/2023/9/06ncktiwd6dc1694418196384.png" alt="" style="width: 50px; height: 50px;">
                                            <p >Ví điện tử VN pay</p>
                                        </button>
                                    </section>
                            </div>
                            <hr class="mb-4">
                            <button class="btn btn-primary btn-lg btn-block" type="submit" name="btnDatHang">Xác nhận</button>
                    </div>
                </div>
            </form>

        </div>
        <!-- End block content -->
    </main>

    <!-- footer -->
    <footer class="footer mt-auto py-3">
       
    </footer>
    <!-- end footer -->

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="/public/assets/admin/vendor/jquery/jquery.min.js"></script>
    <script src="/public/assets/admin/vendor/popperjs/popper.min.js"></script>
    <script src="/public/assets/admin/vendor/bootstrap/js/bootstrap.min.js"></script>

    <!-- Custom script - Các file js do mình tự viết -->
    <script src="../assets/js/app.js"></script>
    <script>
        var CK = document.getElementById("CK");
        var TT = document.getElementById("httt-1");
        var thanhtoanonl = document.getElementById("thanhtoanonl");
        CK.onclick = function(){
            if(this.checked){
                if(!thanhtoanonl.classList.contains("d-flex")){
                    thanhtoanonl.classList.remove("d-none");
                    thanhtoanonl.classList.add("d-flex");
                }
            }
        }
        TT.onclick = function(){
            if(this.checked){
                if(thanhtoanonl.classList.contains("d-flex")){
                    thanhtoanonl.classList.add("d-none");
                    thanhtoanonl.classList.remove("d-flex");
                }
            }
        }
        function checked(){
            var input = document.getElementById('vnpay');
            input.checked = true;
        }
        function checked1(){
            var input = document.getElementById('momo');
            input.checked = true;
        }
        
    </script>
</body>

</html>