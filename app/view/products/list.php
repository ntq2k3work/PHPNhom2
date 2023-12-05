
<section class="categories container" style="margin-top: var(--height);">
          <div class="header_categories d-flex justify-content-sm-between">
                <nav class="m-2" aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#" class="text-decoration-none">Home</a></li>
                        <li class="breadcrumb-item"><a href="#" class="text-decoration-none">Library</a></li>
                        <li class="breadcrumb-item active">Data</li>
                    </ol>
                </nav>
                <ol class="breadcrumb">
                    <li class="m-2 p-2">Xem tất cả 8 kết quả</li>
                    <li class="m-2">
                            <select name="" id="" class="p-2">
                                <option value="" selected>Thứ tự mặc định</option>
                                <option value="" >Thứ tự theo mức độ phổ biến</option>
                                <option value="" >Thứ tự theo giá : cao đến thấp</option>
                                <option value="" >Thứ tự theo giá : thấp đến cao</option>  
                            </select>
                    </li>
                </ol>
          </div>
          <div class="main_categories d-flex">
            <div class="categories_left w-25">
                <div class="left_header m-3">
                    <h5 class="text-uppercase">Danh mục sản phẩm</h5>
                    <ul class="border p-2">
                        <li class="border-bottom p-1"><a href="" class="text-decoration-none text-dark">Đồng hồ nam</a></li>
                        <li class="border-bottom p-1"><a href="" class="text-decoration-none text-dark">Đồng hồ nữ</a></li>
                        <li class="border-bottom p-1"><a href="" class="text-decoration-none text-dark">Đồng hồ đôi</a></li>
                        <li class="d-flex justify-content-between" >
                            <a href="" class="text-decoration-none text-dark">Phụ kiện</a>
                            <p><i class="fas fa-sort-down"></i></p>
                        </li>
                    </ul>
                </div>
                <div class="left_header m-3">
                    <h5 class="text-uppercase">THƯƠNG HIỆU</h5>
                    <ul class="border p-2">
                        <li class="border-bottom p-1"><a href="" class="text-decoration-none text-dark">Đồng hồ nam</a></li>
                        <li class="border-bottom p-1"><a href="" class="text-decoration-none text-dark">Đồng hồ nữ</a></li>
                        <li class="border-bottom p-1"><a href="" class="text-decoration-none text-dark">Đồng hồ đôi</a></li>
                        <li class="d-flex justify-content-between" >
                            <a href="" class="text-decoration-none text-dark">Phụ kiện</a>
                            <p><i class="fas fa-sort-down"></i></p>
                        </li>
                    </ul>
                </div>
                <!-- <div class="left_header m-3">
                    <label for="customRange1" class="form-label text-uppercase">Lọc theo giá</label>
                    <div class="form-range container mt-4" id="customRange1">
                        <div class="form-range" id="price-range-slider">
                      </div>
                </div> -->
                <div class="left_header m-3">
                    <h5 class="text-uppercase">CHẤT LIỆU DÂY</h5>
                    <ul class="border p-2 ">
                        <li class="border-bottom p-1"><a href="<?php echo $_SERVER['REQUEST_URI'] ?>&#8260;?Day-da" class="text-decoration-none text-dark">Dây da</a></li>
                        <li class="border-bottom p-1"><a href="" class="text-decoration-none text-dark">Dây kim loại</a></li>
                        <li class="border-bottom p-1"><a href="" class="text-decoration-none text-dark">Dây nhựa / Cao sư</a></li>
                        <li class=""><a href="" class="text-decoration-none text-dark">Dây titanium</a></li>
                        
                    </ul>
                </div>
                <div class="left_header m-3">
                    <h5 class="text-uppercase">Chất liệu mặt kính</h5>
                    <ul class="border p-2 ">
                        <li class="border-bottom p-1"><a href="" class="text-decoration-none text-dark">Kính Sapphire</a></li>
                        <li class="border-bottom p-1"><a href="" class="text-decoration-none text-dark">Kính Ruby</a></li>
                    </ul>
                </div>
                <div class="left_header m-3">
                    <h5 class="text-uppercase">BỘ MÁY & NĂNG LƯỢNG</h5>
                    <ul class="border p-2 ">
                        <li class="border-bottom p-1"><a href="" class="text-decoration-none text-dark">Cơ (Automatic)</a></li>
                        <li class="border-bottom p-1"><a href="" class="text-decoration-none text-dark">Pin (Quartz)</a></li>
                    </ul>
                </div>
                <div class="left_header m-3">
                    <h5 class="text-uppercase">Kích thước mặt số</h5>
                    <ul class="border p-2 ">
                        <li class="border-bottom p-1"><a href="" class="text-decoration-none text-dark">&#60;29mm</a></li>
                        <li class="border-bottom p-1"><a href="" class="text-decoration-none text-dark">33-35mm</a></li>
                        <li class="border-bottom p-1"><a href="" class="text-decoration-none text-dark">33-35mm</a></li>
                        <li class="border-bottom p-1"><a href="" class="text-decoration-none text-dark">>44mm</a></li>
                    </ul>
                </div>
            </div>
            <div class="categories_right w-75">
            <ul class="list_item d-flex " style="max-height: 817px;">
            <!--            Chaạy foreach lấy giá trị của từng item trong list-->
            <?php foreach ($products as $key) { ?>
                <?php
                $dateStart = new DateTime($key['time_start'] ?? "1-1-2999");
                $dateFinish = new DateTime($key['time_finish'] ?? "1-1-2998");
                $now = new DateTime();
                if ($dateStart <= $now && $now <= $dateFinish) {
                    -$key['percent'] = 0;
                }
                ?>
                <li class="item text-center w-25" >
                    <button class="item_add_cart" title="Thêm vào giỏ hàng" type="submit">
                        <a href="" style="color: #000;"><i class="fa-solid fa-cart-plus"></i></a>
                    </button>
                    <a href="/product/detail/<?php echo $key['product_id'] ?>" style="display: block;min-height: auto;">
                        <?php if ($key['percent'] > 0) { ?>
                            <div class="sale_down">
                                <?php echo -$key['percent'] ?>%
                            </div>
                        <?php } ?>
                        <div class="item_main">
                            <div class="item_img">
                                <img class="w-100" src="/public/assets/client/img/item_1.jpg" alt="">
                            </div>
                            <div class="item_categories small text-uppercase m-1"><?php echo $key['name_categories'] ?></div>
                            <div class="item_name m-1"><?php echo $key['name_product'] ?></div>
                            <div class="item_cost d-flex justify-content-evenly m-2">
                                <!-- <del class="item_cost_old cl_old "> <?php echo number_format($key['price'], 0, '', '.') ?> đ</del> -->
                                <?php if ($key['percent'] > 0) { ?>
                                    <del class="item_cost_old cl_old "><?php echo number_format($key['price'], 0, '', '.') . "đ"; ?></del>
                                <?php } ?>
                                <p class="item_cost_new"><?php
                                                            if ($key['percent'] > 0) {
                                                                echo number_format(($key['price'] * (100 - $key['percent']) / 100), 0, '', '.') . " đ";
                                                            } else {
                                                                echo number_format($key['price'], 0, '', '.') . " đ";
                                                            }
                                                            ?></p>
                            </div>
                        </div>
                    </a>
                </li>
            <?php } ?>
        </ul>
            </div>
          </div>
    </section>