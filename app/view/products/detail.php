<?php 
if(isset($_SESSION["quantity"])){
    unset($_SESSION["quantity"]);
    // $_SESSION["success"] = "Thêm thành công";
    // unset($_SESSION["success"]);
} 

?>
<section class="container-lg" id="margin_header" style="margin-top: calc( var(--height) + 20px );">
    <div class="row">
        <!-- side product suggestions  -->
        <!-- <div class="col-lg-3 d-lg-block d-none">
            <h4>Sản phẩm</h4>
            <div
                style="height: 3px; display: block;background-color: rgba(0,0,0,0.1);margin: 1em 0 1em; width: 100%;">
            </div>
            <ul class="side-product-list list-group list-group-flush border">
                <li class="list-group-item">
                    <a href="" class="d-flex text-dark text-decoration-none">
                        <img src="https://mauweb.monamedia.net/dongho/wp-content/uploads/2018/03/dich-vu-khac-laser-len-dong-ho-deo-tay-theo-yeu-cau-600x600-300x300.jpg"
                            alt="" width="60px" height="60px">
                        <span class="">Dịch Vụ Khắc Laser Logo Công Ty Lên Đồng Hồ</span>
                    </a>
                </li>
                <li class="list-group-item">
                    <a href="" class="d-flex text-dark text-decoration-none">
                        <img src="https://mauweb.monamedia.net/dongho/wp-content/uploads/2018/03/dich-vu-khac-laser-len-dong-ho-deo-tay-theo-yeu-cau-600x600-300x300.jpg"
                            alt="" width="60px" height="60px">
                        <span class="">Dịch Vụ Khắc Laser Logo Công Ty Lên Đồng Hồ</span>
                    </a>
                </li>
                <li class="list-group-item">
                    <a href="" class="d-flex text-dark text-decoration-none">
                        <img src="https://mauweb.monamedia.net/dongho/wp-content/uploads/2018/03/dich-vu-khac-laser-len-dong-ho-deo-tay-theo-yeu-cau-600x600-300x300.jpg"
                            alt="" width="60px" height="60px">
                        <span class="">Dịch Vụ Khắc Laser Logo Công Ty Lên Đồng Hồ</span>
                    </a>
                </li>
                <li class="list-group-item">
                    <a href="" class="d-flex text-dark text-decoration-none">
                        <img src="https://mauweb.monamedia.net/dongho/wp-content/uploads/2018/03/dich-vu-khac-laser-len-dong-ho-deo-tay-theo-yeu-cau-600x600-300x300.jpg"
                            alt="" width="60px" height="60px">
                        <span class="">Dịch Vụ Khắc Laser Logo Công Ty Lên Đồng Hồ</span>
                    </a>
                </li>
                <li class="list-group-item">
                    <a href="" class="d-flex text-dark text-decoration-none">
                        <img src="https://mauweb.monamedia.net/dongho/wp-content/uploads/2018/03/dich-vu-khac-laser-len-dong-ho-deo-tay-theo-yeu-cau-600x600-300x300.jpg"
                            alt="" width="60px" height="60px">
                        <span class="">Dịch Vụ Khắc Laser Logo Công Ty Lên Đồng Hồ</span>
                    </a>
                </li>
                <li class="list-group-item">
                    <a href="" class="d-flex text-dark text-decoration-none">
                        <img src="https://mauweb.monamedia.net/dongho/wp-content/uploads/2018/03/dich-vu-khac-laser-len-dong-ho-deo-tay-theo-yeu-cau-600x600-300x300.jpg"
                            alt="" width="60px" height="60px">
                        <span class="">Dịch Vụ Khắc Laser Logo Công Ty Lên Đồng Hồ</span>
                    </a>
                </li>
            </ul>
        </div> -->
        <!-- product information -->
        <div class="">
            <div class="d-flex justify-content-center flex-column flex-lg-row mb-5">
                <!-- product image -->
                <div class="col-lg-5 position-relative">
                    <?php 
                        $dateStart = new DateTime($infoProduct['time_start'] ?? "1-1-2999");
                        $dateFinish = new DateTime($infoProduct['time_finish'] ?? "1-1-2998");
                        $now = new DateTime();
                        if ($dateStart > $dateFinish) {
                            $infoProduct['percent'] = 0;
                        }    
                    ?>
                    <?php if($infoProduct['percent'] > 0){ ?>
                        <span class="badge bg-danger ms-3 position-absolute fs-4"><?php echo -$infoProduct['percent'] ?>%</span>
                    <?php } ?>
                    <img class="w-100"
                        src="/public/assets/client/img/image_product/<?php echo $infoProduct['image'] ?>"
                        alt="" />
                </div>
                <!-- product desciption -->
                <div class="col-lg-7">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item text-capitalize" style="font-size: 16px;"><a class="link-underline link-underline-opacity-0" href="/Home">Trang chủ</a></li>
                            <li class="breadcrumb-item text-capitalize" style="font-size: 16px;"
                                aria-current="page"><a class="link-underline link-underline-opacity-0" href="/list/Dong-ho-nam"><?php echo $infoProduct['name_categories'] ?></a></li>
                        </ol>
                    </nav>
                    <h1 class="text-capitalize"><?php echo $infoProduct['name_product'] ?></h1>
                    <div
                        style="height: 3px; display: block;background-color: rgba(0,0,0,0.1);margin: 1em 0 1em; width: 100%;">
                    </div>
                    <p class="price fs-3 mb-3 mt-3">
                        <?php if($infoProduct['percent'] > 0){ ?>
                            <del class="opacity-75 me-3">
                                <span><?php echo number_format($infoProduct['price'],0,'','.') ?> ₫</span>
                            </del>
                        <?php } ?>
                        <span>
                            <span><?php 
                                if($infoProduct['percent'] > 0){
                                    echo number_format($infoProduct['price']*(100-$infoProduct['percent'])/100,0,'','.');
                                }else{
                                    echo number_format($infoProduct['price'],0,'','.');
                                }
                                
                            ?> đ</span>
                        </span>
                    </p>
                    <strong class="m-1">Mô tả :</strong>
                    <p class="m-2"><?php echo $infoProduct['description'] ?></p>
                    <form class="input-group mb-3" action="/cart/addToCart/<?php echo $infoProduct['product_id'] ?>" method="post">
                        <div class="col-lg-3 mb-3 me-3">
                            <div class="input-group">
                                <span class="input-group-btn">
                                    <button type="button" class="quantity-left-minus btn btn-light border fs-5"
                                        data-type="minus" data-field=""  onclick="subtractQuantity(<?php echo $infoProduct['product_id'] ?>)">
                                        -
                                    </button>
                                </span>
                                <input type="text" id="quantityInput" name="quantity"
                                    class="form-control input-number text-center" value="1" min="1" max="<?php echo $infoProduct['quantity'] ?>">
                                <span class="input-group-btn">
                                    <button type="button" class="quantity-right-plus btn btn-light border fs-5"
                                        data-type="plus" data-field="" onclick="addQuantity(<?php echo $infoProduct['product_id'] ?>)"> 
                                        +
                                    </button>
                                </span>
                            </div>
                        </div>
                        <div class="input-group-append">
                            <button class="btn btn-dark fs-5" type="submit">Đặt hàng</button>
                        </div>
                    </form>
                    <div class="mt-5">
                        <p class="border-top m-1">Mã: <?php echo $infoProduct['id_product'] ?></p>
                        <p class="border-top m-1">Danh mục: <?php echo $infoProduct['name_categories'] ?></p>
                    </div>
                </div>
            </div>
            <!-- product footer -->
            <div class="row mb-5">
                <ul class="nav nav-tabs" id="myTab" role="tablist">
                    <li class="nav-item" role="presentation">
                        <button class="nav-link active text-black" id="detail-tab" data-bs-toggle="tab"
                            data-bs-target="#detail-tab-pane" type="button" role="tab"
                            aria-controls="detail-tab-pane" aria-selected="true">Thông tin bổ sung</button>
                    </li>
                    <!-- <li class="nav-item" role="presentation">
                        <button class="nav-link text-black" id="review-tab" data-bs-toggle="tab"
                            data-bs-target="#review-tab-pane" type="button" role="tab"
                            aria-controls="review-tab-pane" aria-selected="false">Đánh giá</button>
                    </li> -->
                    <li class="nav-item" role="presentation">
                        <button class="nav-link text-black" id="warranty-tab" data-bs-toggle="tab"
                            data-bs-target="#warranty-tab-pane" type="button" role="tab"
                            aria-controls="warranty-tab-pane" aria-selected="false">Chính sách bảo hành</button>
                    </li>

                </ul>
                <div class="tab-content p-0" id="myTabContent">
                    <div class="tab-pane fade show active" id="detail-tab-pane" role="tabpanel"
                        aria-labelledby="detail-tab" tabindex="0">
                        <div class="p-4 border-top-0" style="border: 1px solid #ddd; background-color: #fff;">
                            <table class="table table-striped">
                                <tbody>
                                    <?php if($infoProduct['name_categories'] != "Phụ kiện"){ ?>
                                        <tr>
                                            <th>Bộ máy Năng lượng</th>
                                            <td>
                                                <a class="link-dark link-underline-opacity-0" href="" rel="tag"><?php echo $infoProduct['battery'] ?></a>
                                            </td>
                                        </tr>
                                    <?php } ?>
                                    <tr>
                                        <th>Chất liệu dây</th>
                                        <td>
                                            <a class="link-dark link-underline-opacity-0" href="" rel="tag"><?php echo $infoProduct['wire_material'] ?></a>
                                        </td>
                                    </tr>

                                    <?php if($infoProduct['name_categories'] != "Phụ kiện"){ ?>
                                        <tr>
                                            <th>Giới tính</th>
                                            <td>
                                                <a class="link-dark link-underline-opacity-0" href="" rel="tag"><?php 
                                                    echo explode(' ',$infoProduct['name_categories'])[2] == "đôi" ? "Cả hai" :ucfirst(explode(' ',$infoProduct['name_categories'])[2])  
                                                ?></a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>Hình dạng mặt số</th>
                                            <td>
                                                <a class="link-dark link-underline-opacity-0" href="" rel="tag"><?php echo $infoProduct['shape'] ?></a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>Kích thước mặt số</th>
                                            <td>
                                                <a class="link-dark link-underline-opacity-0" href="" rel="tag"><?php echo $infoProduct['size'] ?></a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>Màu mặt số</th>
                                            <td>
                                                <a class="link-dark link-underline-opacity-0" href=""
                                                    rel="tag"><?php echo $infoProduct['color'] ?></a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>Mức chống nước</th>
                                            <td>
                                                <a class="link-dark link-underline-opacity-0" href="" rel="tag"><?php echo $infoProduct['water_resistance'] ?></a>
                                            </td>
                                        </tr>
                                    <?php } ?>
                                    <tr>
                                        <th>Thương hiệu</th>
                                        <td>
                                            <a class="link-dark link-underline-opacity-0" href=""
                                                rel="tag"><?php echo $infoProduct['name_brand'] ?></a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Xuất xứ</th>
                                        <td>
                                            <a class="link-dark link-underline-opacity-0" href="" rel="tag"><?php echo $infoProduct['address'] ?></a>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <!-- <div class="tab-pane fade" id="review-tab-pane" role="tabpanel" aria-labelledby="review-tab"
                        tabindex="0">
                        <div class="p-4 border-top-0" style="border: 1px solid #ddd; background-color: #fff;">
                            <h3>Đánh giá</h3>
                            <p>Hiện tại chưa có đánh giá nào</p>
                            <form class="row">
                                <h3>Hãy là người đầu tiên nhận xét “ĐỒNG HỒ CASIO GA-110GB-1ADR NAM PIN DÂY NHỰA”
                                </h3>
                                <div class="col-12 mb-4">
                                    <label class="mb-2" for="review">Đánh giá của bạn</label>
                                    <textarea class="form-control" id="review" cols="45" rows="8"
                                        style="width: 924px;min-height: 200px;" required
                                        placeholder="Leave your comment!"></textarea>
                                </div>


                                <div class="col-md-6">
                                    <label for="name" class="form-label">Tên</label>
                                    <input type="text" class="form-control" id="name" required>
                                </div>
                                <div class="col-md-6">
                                    <label for="phonenumber" class="form-label">Số điện thoại</label>
                                    <input type="number" class="form-control" id="phonenumber" required>
                                </div>
                                <div class="col-12 mt-4">
                                    <button type="submit" class="btn btn-dark">Gửi đi</button>
                                </div>
                            </form>
                        </div>
                    </div> -->
                    <div class="tab-pane fade" id="warranty-tab-pane" role="tabpanel" aria-labelledby="warranty-tab"
                        tabindex="0">
                        <div class="p-4 border-top-0" style="border: 1px solid #ddd; background-color: #fff;">
                            <p class="fs-2 m-2 ">Chính sách bảo hành của riêng mỗi hãng:</p>
                            <p class="fs-5 m-2 " style="font-size: 18px !important">CASIO: Bảo hành chính hãng máy 1 năm, pin 1,5 năm</p>
                            <p class="fs-5 m-2 " style="font-size: 18px !important">CITIZEN: Bảo hành chính hãng toàn cầu máy 1 năm, pin 1 năm</p>
                            <p class="fs-5 m-2 " style="font-size: 18px !important">SEIKO: Bảo hành chính hãng toàn cầu máy 1 năm, pin 1 năm</p>
                            <p class="fs-5 m-2 " style="font-size: 18px !important">ORIENT: Bảo hành chính hãng toàn cầu máy 1 năm, pin 1 năm</p>
                            <p class="fs-5 m-2 " style="font-size: 18px !important">OP: Bảo hành chính hãng máy 2 năm, pin 1 năm</p>
                            <p class="fs-5 m-2 " style="font-size: 18px !important">RHYTHM:&nbsp;Bảo hành chính hãng máy 1 năm, pin 1 năm</p>
                            <p class="fs-5 m-2 " style="font-size: 18px !important">OGIVAL:&nbsp;Bảo hành chính hãng máy 2 năm, pin 1 năm</p>
                            <p class="fs-5 m-2 " style="font-size: 18px !important">ELLE:&nbsp;Bảo hành chính hãng máy 2 năm, pin 2 năm</p>
                            <p class="fs-5 m-2 " style="font-size: 18px !important">TISSOT:&nbsp;Bảo hành chính hãng máy 2 năm, pin 1 năm</p>
                        </div>
                    </div>
                </div>
            </div>
                                    
            <h3>SẢN PHẨM TƯƠNG TỰ</h3>
            <div class="couple_container">
                <ul class="list_item section_item_slide couple_clock d-flex " style="max-height: 409px;min-height: 200px;">
                <?php foreach ($sameProducts as $key) { ?>
                    <?php
                        $dateStart = new DateTime($key['time_start'] ?? "1-1-2999");
                        $dateFinish = new DateTime($key['time_finish'] ?? "1-1-2998");
                        $now = new DateTime();
                        if ($dateStart > $dateFinish) {
                            $key['percent'] = 0;
                        }    
                    ?>
                    <li class="item text-center w-25" style="flex: none;">
                        <button class="item_add_cart" title="Thêm vào giỏ hàng" type="submit">
                            <a href="" style="color: #000;"><i class="fa-solid fa-cart-plus"></i></a>
                        </button>
                        <a href="<?php echo $key['product_id'] ?>" style="min-height: auto;">
                            <?php if($key['percent'] > 0){ ?>
                                <div class="sale_down">
                                    <?php echo -$key['percent'] ?> %
                                </div>
                            <?php } ?>
                            <div class="item_main">
                                <div class="item_img">
                                    <img class="w-100" src="/public/assets/client/img/image_product/<?php echo $key['image'] ?>" alt="">
                                </div>
                                <div class="item_categories small text-uppercase m-1"><?php echo $key['name_categories'] ?></div>
                                <div class="item_name m-1"><?php echo $key['name_product'] ?></div>
                                <div class="item_cost d-flex justify-content-evenly m-2">
                                    <?php if($key['percent'] > 0){ ?>
                                    <del class="item_cost_old cl_old "><?php 
                                            echo number_format($key['price'],0,'','.');?>đ
                                    </del>
                                    <?php } ?>
                                    <p class="item_cost_new"><?php echo number_format($key['price']*(100-$key['percent'])/100,0,'','.'); ?> đ</p>
                                </div>
                            </div>
                        </a>
                    </li>
                <?php } ?>
                    
                </ul>
            </div>
        </div>
    </div>
</section>
