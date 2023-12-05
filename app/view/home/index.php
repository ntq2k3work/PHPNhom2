<!-- Slider -->
<div id="slider">
    <div class="slider_pre_next">
        <i class="fa fa-angle-left pre_next_icon"></i>
        <i class="fa fa-angle-right pre_next_icon"></i>
    </div>
    <ul class="slider_dots">
        <li class="slider_dots_icon cl_ccc" data-index="0"><i class=" fa-solid fa-circle"></i></li>
        <li class="slider_dots_icon" data-index="1"><i class=" fa-solid fa-circle"></i></li>
        <li class="slider_dots_icon" data-index="2"><i class=" fa-solid fa-circle"></i></li>
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
            <?php foreach ($MaleClock as $key) { ?>
                <?php
                $dateStart = new DateTime($key['time_start'] ?? "1-1-2999");
                $dateFinish = new DateTime($key['time_finish'] ?? "1-1-2998");
                $now = new DateTime();
                if ($dateStart <= $now && $now <= $dateFinish) {
                    -$key['percent'] = 0;
                }
                ?>
                <li class="item text-center w-25">
                    <button class="item_add_cart" title="Thêm vào giỏ hàng" type="submit">
                        <a href="" style="color: #000;"><i class="fa-solid fa-cart-plus"></i></a>
                    </button>
                    <a href="product/detail/<?php echo $key['id'] ?>" style="display: block;">
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
    </section>
    <!-- BR -->
    <div class="break break_1 d-flex justify-content-evenly">
        <div class="break_section align-items-center d-flex ">
            <div class="break_icon " style="margin: 0 4px;"><i class="fa-solid fa-truck" style="font-size: 36px;"></i></div>
            <div class="break_content">
                <h3 style="font-size: 24px;margin: 2px 0;">Miễn phí giao hàng</h3>
                <p title="" style="opacity: 0.85; font-size: 14px;">Giao hàng tận nơi, đảm bảo chất lượng</p>
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
            <div class="break_icon " style="margin: 0 4px;"><i class="fa-regular fa-clock" style="font-size: 36px;"></i></div>
            <div class="break_content">
                <h3 style="font-size: 24px;margin: 2px 0;">Tiện lợi và nhanh gọn</h3>
                <p title="" style="opacity: 0.85; font-size: 14px;">Đặt mua ở mọi nơi,nhanh gọn và tiện lợi</p>
            </div>
        </div>
    </div>
    <section class="container">
        <h1 class="section_header fw-bolder text-uppercase text-center m-4" style="font-size: 30px;">Đồng hồ nữ</h1>
        <ul class="list_item d-flex " style="max-height: 817px;">
            <!--            Chaạy foreach lấy giá trị của từng item trong list-->
            <?php foreach ($FemaleClock as $key) { ?>
                <?php
                $dateStart = new DateTime($key['time_start'] ?? "1-1-2999");
                $dateFinish = new DateTime($key['time_finish'] ?? "1-1-2998");
                if ($dateStart > $dateFinish) {
                    -$key['percent'] = 0;
                }
                ?>
                <li class="item text-center w-25">
                    <button class="item_add_cart" title="Thêm vào giỏ hàng" type="submit">
                        <a href="" style="color: #000;"><i class="fa-solid fa-cart-plus"></i></a>
                    </button>
                    <a href="product/detail/<?php echo $key['id'] ?>" style="display: block;">
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
    </section>
    <div class="break break_2 d-flex">
        <div class="break_2_section w-100"><img class="w-100" src="/public/assets/client/img/banner.jpg" alt=""></div>
        <div class="break_2_section w-100"><img class="w-100" src="/public/assets/client/img/banner.jpg" alt=""></div>
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
                    <?php foreach ($CoupleClock as $key) { ?>
                        <?php
                        $dateStart = new DateTime($key['time_start'] ?? "1-1-2999");
                        $dateFinish = new DateTime($key['time_finish'] ?? "1-1-2998");
                        if ($dateStart > $dateFinish) {
                            -$key['percent'] = 0;
                        }
                        ?>
                        <li class="item text-center w-25">
                            <button class="item_add_cart" title="Thêm vào giỏ hàng" type="submit">
                                <a href="" style="color: #000;"><i class="fa-solid fa-cart-plus"></i></a>
                            </button>
                            <a class="item_link" href="product/detail/<?php echo $key['id'] ?>">
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
</div>
<script src="/public/assets/client/js/slider_action.js"></script>
<script src="/public/assets/client/js/show_item.js"></script>