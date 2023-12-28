<?php
$connect = mysqli_connect("localhost", "root", "", "clockweb");
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    
    $page = $_POST['page'];
    $space = $_POST['space'];
    $number_product = $_POST['number_product'];
    // Sắp xếp theo giá
    function compareByPrice($a, $b) {
        $percentA = isset($a['percent']) ? intval($a['percent']) : 0;
        $percentB = isset($b['percent']) ? intval($b['percent']) : 0;
    
        $priceA = $a['price'] * (100- $percentA ) /100 ;
        $priceB = $b['price'] * (100- $percentB) /100 ;
        if($_POST['selectedValue'] == '2'){
            return ($priceA < $priceB) ? -1 : 1;
        };
        if($_POST['selectedValue'] == '3') {
            return ($priceA < $priceB) ? 1 : -1;
        }
        return 0;

        
    }
    $carts = $_POST['carts'];
    usort($carts, 'compareByPrice');

 
} else {
    echo "Không lấy được dữ liệu";
    exit;
}
mysqli_close($connect);
?>
<ul class="list_item d-flex " style="max-height: 970px;">
                    <!--            Chaạy foreach lấy giá trị của từng item trong list-->
                    <?php for($i = $space * $page- $space; $i < min($number_product, $space * $page); $i++) {  ?>
                        <?php
                        $dateStart = new DateTime($carts[$i]['time_start'] ?? "1-1-2999");
                        $dateFinish = new DateTime($carts[$i]['time_finish'] ?? "1-1-2998");
                        $now = new DateTime();
                        if ($dateStart > $dateFinish) {
                            $carts[$i]['percent'] = 0;
                        }
                        ?>
                        <li class="item text-center w-25">
                            <button class="item_add_cart" title="Thêm vào giỏ hàng" type="submit">
                                <a href="" style="color: #000;"><i class="fa-solid fa-cart-plus"></i></a>
                            </button>
                            <a href="/product/detail/<?php echo $carts[$i]['product_id'] ?>" style="display: block;min-height: auto;">
                                <?php if ($carts[$i]['percent'] > 0) { ?>
                                    <div class="sale_down">
                                        <?php echo -$carts[$i]['percent'] ?>%
                                    </div>
                                <?php } ?>
                                <div class="item_main">
                                    <div class="item_img">
                                        <img class="w-100" src="/public/assets/client/img/image_product/<?php echo $carts[$i]['image'] ?>" alt="">
                                    </div>
                                    <div class="item_categories small text-uppercase m-1"><?php echo $carts[$i]['name_categories'] ?></div>
                                    <div class="item_name m-1"><?php echo $carts[$i]['name_product'] ?></div>
                                    <div class="item_cost d-flex justify-content-evenly m-2">
                                        <!-- <del class="item_cost_old cl_old "> <?php echo number_format($carts[$i]['price'], 0, '', '.') ?> đ</del> -->
                                        <?php if ($carts[$i]['percent'] > 0) { ?>
                                            <del class="item_cost_old cl_old "><?php echo number_format($carts[$i]['price'], 0, '', '.') . "đ"; ?></del>
                                        <?php } ?>
                                        <p class="item_cost_new"><?php
                                                                    if ($carts[$i]['percent'] > 0) {
                                                                        echo number_format(($carts[$i]['price'] * (100 - $carts[$i]['percent']) / 100), 0, '', '.') . " đ";
                                                                    } else {
                                                                        echo number_format($carts[$i]['price'], 0, '', '.') . " đ";
                                                                    }
                                                                    ?></p>
                                    </div>
                                </div>
                            </a>
                        </li>
                    <?php } ?>
                </ul>