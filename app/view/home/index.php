<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Slab:wght@300&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../../../assets/css/reset.css">
    <link rel="stylesheet" href="../../../assets/css/style.css">
    <title>Document</title>
</head>
<body>
<!-- Header -->
<?php require 'app/view/layouts/header.php' ?>
<!-- Slider -->
<div id="slider">
    <div class="slider_pre_next">
        <i class="fa fa-angle-left pre_next_icon"></i>
        <i class="fa fa-angle-right pre_next_icon"></i>
    </div>
    <ul class="slider_dots">
        <li class="slider_dots_icon cl_ccc" data-index = "0"><i class=" fa-solid fa-circle"></i></li>
        <li class="slider_dots_icon" data-index = "1"><i class=" fa-solid fa-circle"></i></li>
        <li class="slider_dots_icon" data-index = "2"><i class=" fa-solid fa-circle"></i></li>
    </ul>
    <div class="slider_wrapper">
        <div class="slider_main d-flex">
            <div class="slider_item slider_1"></div>
            <div class="slider_item slider_2"></div>
            <div class="slider_item slider_3"></div>
        </div>
    </div>
</div>
<!-- Main -->
<div id="main">
    <section class="container">
        <h1 class="section_header fw-bolder text-uppercase text-center m-4" style="font-size: 30px;">Đồng hồ nam</h1>
        <ul class="list_item d-flex " style="max-height: 817px;">
<!--            Chaạy foreach lấy giá trị của từng item trong list-->
            <li class="item text-center w-25">
                <button class="item_add_cart" title="Thêm vào giỏ hàng" type="submit">
                    <a href="" style="color: #000;"><i class="fa-solid fa-cart-plus"></i></a>
                </button>
                <a href="">
                    <div class="sale_down">
                        -10%
                    </div>
                    <div class="item_main">
                        <div class="item_img">
                            <img class="w-100" src="../../../assets/img/item_1.jpg" alt="">
                        </div>
                        <div class="item_categories small text-uppercase m-1">Đồng hồ nam</div>
                        <div class="item_name m-1">ĐỒNG HỒ LOUIS ERARD 13900AA05.BDC102 NAM PIN DÂY DA</div>
                        <div class="item_cost d-flex justify-content-evenly m-2">
                            <del class="item_cost_old cl_old "> 28,140,000 đ</del>
                            <p class="item_cost_new">18,195,300 đ</p>
                        </div>
                    </div>
                </a>
            </li>
            <li class="item text-center w-25">
                <button class="item_add_cart" title="Thêm vào giỏ hàng" type="submit">
                    <a href="" style="color: #000;"><i class="fa-solid fa-cart-plus"></i></a>
                </button>
                <a href="">
                    <div class="sale_down">
                        -10%
                    </div>
                    <div class="item_main">
                        <div class="item_img">
                            <img class="w-100" src="../../../assets/img/item_1.jpg" alt="">
                        </div>
                        <div class="item_categories small text-uppercase m-1">Đồng hồ nam</div>
                        <div class="item_name m-1">ĐỒNG HỒ LOUIS ERARD 13900AA05.BDC102 NAM PIN DÂY DA</div>
                        <div class="item_cost d-flex justify-content-evenly m-2">
                            <del class="item_cost_old cl_old "> 28,140,000 đ</del>
                            <p class="item_cost_new">18,195,300 đ</p>
                        </div>
                    </div>
                </a>
            </li>
            <li class="item text-center w-25">
                <button class="item_add_cart" title="Thêm vào giỏ hàng" type="submit">
                    <a href="" style="color: #000;"><i class="fa-solid fa-cart-plus"></i></a>
                </button>
                <a href="">
                    <div class="sale_down">
                        -10%
                    </div>
                    <div class="item_main">
                        <div class="item_img">
                            <img class="w-100" src="../../../assets/img/item_1.jpg" alt="">
                        </div>
                        <div class="item_categories small text-uppercase m-1">Đồng hồ nam</div>
                        <div class="item_name m-1">ĐỒNG HỒ LOUIS ERARD 13900AA05.BDC102 NAM PIN DÂY DA</div>
                        <div class="item_cost d-flex justify-content-evenly m-2">
                            <del class="item_cost_old cl_old "> 28,140,000 đ</del>
                            <p class="item_cost_new">18,195,300 đ</p>
                        </div>
                    </div>
                </a>
            </li>
        </ul>
    </section>
    <!-- BR -->
    <div class="break break_1 d-flex justify-content-evenly">
        <div class="break_section align-items-center d-flex ">
            <div class="break_icon " style="margin: 0 4px;"><i class="fa-solid fa-truck" style="font-size: 36px;"></i></div>
            <div class="break_content">
                <h3 style="font-size: 24px;margin: 2px 0;">Miễn phí giao hàng</h3>
                <p title="" style="opacity: 0.85; font-size: 14px;" >Giao hàng tận nơi, đảm bảo chất lượng</p>
            </div>
        </div>
        <div class="break_section align-items-center d-flex">
            <div class="break_icon " style="margin: 0 4px;"><i class="fa-solid fa-gift" style="font-size: 36px;"></i></div>
            <div class="break_content">
                <h3 style="font-size: 24px;margin: 2px 0;">Quà Tặng Đặc Biệt</h3>
                <p title="" style="opacity: 0.85; font-size: 14px;">Ưu đãi lớn, giảm giá sâu</p>
            </div>
        </div>
        <div class="break_section align-items-center d-flex">
            <div class="break_icon " style="margin: 0 4px;"><i class="fa-regular fa-clock"  style="font-size: 36px;"></i></div>
            <div class="break_content">
                <h3 style="font-size: 24px;margin: 2px 0;">Tiện lợi và nhanh gọn</h3>
                <p title="" style="opacity: 0.85; font-size: 14px;">Đặt mua ở mọi nơi,nhanh gọn và tiện lợi</p>
            </div>
        </div>
    </div>
    <section class="container">
        <h1 class="section_header fw-bolder text-uppercase text-center m-4" style="font-size: 30px;">Đồng hồ nữ</h1>
        <ul class="list_item d-flex " style="max-height: 817px;">
            <li class="item text-center w-25">
                <button class="item_add_cart" title="Thêm vào giỏ hàng" type="submit">
                    <a href="" style="color: #000;"><i class="fa-solid fa-cart-plus"></i></a>
                </button>
                <a href="">
                    <div class="sale_down">
                        -10%
                    </div>
                    <div class="item_main">
                        <div class="item_img">
                            <img class="w-100" src="../../../assets/img/item_1.jpg" alt="">
                        </div>
                        <div class="item_categories small text-uppercase m-1">Đồng hồ nam</div>
                        <div class="item_name m-1">ĐỒNG HỒ LOUIS ERARD 13900AA05.BDC102 NAM PIN DÂY DA</div>
                        <div class="item_cost d-flex justify-content-evenly m-2">
                            <del class="item_cost_old cl_old ">20,217,000 đ</del>
                            <p class="item_cost_new">18,195,300 đ</p>
                        </div>
                    </div>
                </a>
            </li>
            <li class="item text-center w-25">
                <button class="item_add_cart" title="Thêm vào giỏ hàng" type="submit">
                    <a href="" style="color: #000;"><i class="fa-solid fa-cart-plus"></i></a>
                </button>
                <a href="">
                    <div class="sale_down">
                        -10%
                    </div>
                    <div class="item_main">
                        <div class="item_img">
                            <img class="w-100" src="../../../assets/img/item_1.jpg" alt="">
                        </div>
                        <div class="item_categories small text-uppercase m-1">Đồng hồ nam</div>
                        <div class="item_name m-1">ĐỒNG HỒ LOUIS ERARD 13900AA05.BDC102 NAM PIN DÂY DA</div>
                        <div class="item_cost d-flex justify-content-evenly m-2">
                            <del class="item_cost_old cl_old ">20,217,000 đ</del>
                            <p class="item_cost_new">18,195,300 đ</p>
                        </div>
                    </div>
                </a>
            </li>
            <li class="item text-center w-25">
                <button class="item_add_cart" title="Thêm vào giỏ hàng" type="submit">
                    <a href="" style="color: #000;"><i class="fa-solid fa-cart-plus"></i></a>
                </button>
                <a href="">
                    <div class="sale_down">
                        -10%
                    </div>
                    <div class="item_main">
                        <div class="item_img">
                            <img class="w-100" src="../../../assets/img/item_1.jpg" alt="">
                        </div>
                        <div class="item_categories small text-uppercase m-1">Đồng hồ nam</div>
                        <div class="item_name m-1">ĐỒNG HỒ LOUIS ERARD 13900AA05.BDC102 NAM PIN DÂY DA</div>
                        <div class="item_cost d-flex justify-content-evenly m-2">
                            <del class="item_cost_old cl_old ">20,217,000 đ</del>
                            <p class="item_cost_new">18,195,300 đ</p>
                        </div>
                    </div>
                </a>
            </li>
        </ul>
    </section>
    <div class="break break_2 d-flex">
        <div class="break_2_section w-100"><img class="w-100" src="/assets/img/banner.jpg" alt=""></div>
        <div class="break_2_section w-100"><img class="w-100" src="/assets/img/banner.jpg" alt=""></div>
    </div>
    <!-- Phần 1 -->
    <section class="container ">
        <h1 class="section_header fw-bolder text-uppercase text-center m-4" style="font-size: 30px;">Đồng hồ đôi</h1>
        <div class="section_wapper">
            <div class="section_wapper_pre_next section_wapper_next_icon_left ">
                <i class="fa fa-angle-left section_wapper_next_icon_left"></i>
            </div>
            <div class="section_wapper_pre_next section_wapper_next_icon_right ">
                <i class="fa fa-angle-right "></i>
            </div>
            <div class="couple_container">
                <ul class="list_item section_item_slide couple_clock d-flex " style="max-height: 409px;">
                    <li class="item text-center w-25">
                        <button class="item_add_cart" title="Thêm vào giỏ hàng" type="submit">
                            <a href="" style="color: #000;"><i class="fa-solid fa-cart-plus"></i></a>
                        </button>
                        <a href="">
                            <div class="sale_down">
                                -10%
                            </div>
                            <div class="item_main">
                                <div class="item_img">
                                    <img class="w-100" src="../../../assets/img/item_1.jpg" alt="">
                                </div>
                                <div class="item_categories small text-uppercase m-1">Đồng hồ nam</div>
                                <div class="item_name m-1">ĐỒNG HỒ LOUIS </div>
                                <div class="item_cost d-flex justify-content-evenly m-2">
                                    <del class="item_cost_old cl_old ">20,217,000 đ</del>
                                    <p class="item_cost_new">18,195,300 đ</p>
                                </div>
                            </div>
                        </a>
                    </li>
                    <li class="item text-center w-25">
                        <button class="item_add_cart" title="Thêm vào giỏ hàng" type="submit">
                            <a href="" style="color: #000;"><i class="fa-solid fa-cart-plus"></i></a>
                        </button>
                        <a href="">
                            <div class="sale_down">
                                -10%
                            </div>
                            <div class="item_main">
                                <div class="item_img">
                                    <img class="w-100" src="../../../assets/img/item_1.jpg" alt="">
                                </div>
                                <div class="item_categories small text-uppercase m-1">Đồng hồ nam</div>
                                <div class="item_name m-1">ĐỒNG HỒ LOUIS ERARD 13900AA05.BDC102 NAM PIN DÂY DA</div>
                                <div class="item_cost d-flex justify-content-evenly m-2">
                                    <del class="item_cost_old cl_old ">20,217,000 đ</del>
                                    <p class="item_cost_new">18,195,300 đ</p>
                                </div>
                            </div>
                        </a>
                    </li>
                    <li class="item text-center w-25">
                        <button class="item_add_cart" title="Thêm vào giỏ hàng" type="submit">
                            <a href="" style="color: #000;"><i class="fa-solid fa-cart-plus"></i></a>
                        </button>
                        <a href="">
                            <div class="sale_down">
                                -10%
                            </div>
                            <div class="item_main">
                                <div class="item_img">
                                    <img class="w-100" src="../../../assets/img/item_1.jpg" alt="">
                                </div>
                                <div class="item_categories small text-uppercase m-1">Đồng hồ nam</div>
                                <div class="item_name m-1">ĐỒNG HỒ LOUIS ERARD 13900AA05.BDC102 NAM PIN DÂY DA</div>
                                <div class="item_cost d-flex justify-content-evenly m-2">
                                    <del class="item_cost_old cl_old ">20,217,000 đ</del>
                                    <p class="item_cost_new">18,195,300 đ</p>
                                </div>
                            </div>
                        </a>
                    </li>
                    <li class="item text-center w-25">
                        <button class="item_add_cart" title="Thêm vào giỏ hàng" type="submit">
                            <a href="" style="color: #000;"><i class="fa-solid fa-cart-plus"></i></a>
                        </button>
                        <a href="">
                            <div class="sale_down">
                                -10%
                            </div>
                            <div class="item_main">
                                <div class="item_img">
                                    <img class="w-100" src="../../../assets/img/item_1.jpg" alt="">
                                </div>
                                <div class="item_categories small text-uppercase m-1">Đồng hồ nam</div>
                                <div class="item_name m-1">ĐỒNG HỒ LOUIS ERARD </div>
                                <div class="item_cost d-flex justify-content-evenly m-2">
                                    <del class="item_cost_old cl_old ">20,217,000 đ</del>
                                    <p class="item_cost_new">18,195,300 đ</p>
                                </div>
                            </div>
                        </a>
                    </li>
                    <li class="item text-center w-25">
                        <button class="item_add_cart" title="Thêm vào giỏ hàng" type="submit">
                            <a href="" style="color: #000;"><i class="fa-solid fa-cart-plus"></i></a>
                        </button>
                        <a href="">
                            <div class="sale_down">
                                -10%
                            </div>
                            <div class="item_main">
                                <div class="item_img">
                                    <img class="w-100" src="https://cuahangdongho.vn/wp-content/uploads/2020/03/9769-g03-e1596777033549-529x600.png" alt="">
                                </div>
                                <div class="item_categories small text-uppercase m-1">Đồng hồ nam</div>
                                <div class="item_name m-1">ĐỒNG HỒ LOUIS ERARD 13900AA05.</div>
                                <div class="item_cost d-flex justify-content-evenly m-2">
                                    <del class="item_cost_old cl_old ">20,217,000 đ</del>
                                    <p class="item_cost_new">18,195,300 đ</p>
                                </div>
                            </div>
                        </a>
                    </li>
                    <li class="item text-center w-25">
                        <button class="item_add_cart" title="Thêm vào giỏ hàng" type="submit">
                            <a href="" style="color: #000;"><i class="fa-solid fa-cart-plus"></i></a>
                        </button>
                        <a href="">
                            <div class="sale_down">
                                -10%
                            </div>
                            <div class="item_main">
                                <div class="item_img">
                                    <img class="w-100" src="https://vidatuixachlouiskimmi.com/wp-content/uploads/2021/07/Dong-ho-Rolex-DateJust-Blue-Navi.jpg" alt="">
                                </div>
                                <div class="item_categories small text-uppercase m-1">Đồng hồ nam</div>
                                <div class="item_name m-1">ĐỒNG HỒ LOUIS ERARD 13900AA05.BDC102 NAM PIN DÂY DA</div>
                                <div class="item_cost d-flex justify-content-evenly m-2">
                                    <del class="item_cost_old cl_old ">20,217,000 đ</del>
                                    <p class="item_cost_new">18,195,300 đ</p>
                                </div>
                            </div>
                        </a>
                    </li>
                    <li class="item text-center w-25">
                        <button class="item_add_cart" title="Thêm vào giỏ hàng" type="submit">
                            <a href="" style="color: #000;"><i class="fa-solid fa-cart-plus"></i></a>
                        </button>
                        <a href="">
                            <div class="sale_down">
                                -10%
                            </div>
                            <div class="item_main">
                                <div class="item_img">
                                    <img class="w-100" src="../../../assets/img/item_1.jpg" alt="">
                                </div>
                                <div class="item_categories small text-uppercase m-1">Đồng hồ nam</div>
                                <div class="item_name m-1">ĐỒNG HỒ LOUIS ERARD 13900AA05.BDC102 NAM PIN DÂY DA</div>
                                <div class="item_cost d-flex justify-content-evenly m-2">
                                    <del class="item_cost_old cl_old ">20,217,000 đ</del>
                                    <p class="item_cost_new">18,195,300 đ</p>
                                </div>
                            </div>
                        </a>
                    </li>
                    <li class="item text-center w-25">
                        <button class="item_add_cart" title="Thêm vào giỏ hàng" type="submit">
                            <a href="" style="color: #000;"><i class="fa-solid fa-cart-plus"></i></a>
                        </button>
                        <a href="">
                            <div class="sale_down">
                                -10%
                            </div>
                            <div class="item_main">
                                <div class="item_img">
                                    <img class="w-100" src="../../../assets/img/item_1.jpg" alt="">
                                </div>
                                <div class="item_categories small text-uppercase m-1">Đồng hồ nam</div>
                                <div class="item_name m-1">ĐỒNG HỒ LOUIS ERARD 13900AA05.BDC102 NAM PIN DÂY DA</div>
                                <div class="item_cost d-flex justify-content-evenly m-2">
                                    <del class="item_cost_old cl_old ">20,217,000 đ</del>
                                    <p class="item_cost_new">18,195,300 đ</p>
                                </div>
                            </div>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </section>
</div>
<!-- Footer -->
<?php require "app/view/layouts/footer.php" ?>
</body>
<script src="/assets/js/slider_action.js"></script>
<script src="/assets/js/show_item.js"></script>
</html>