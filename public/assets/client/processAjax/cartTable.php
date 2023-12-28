<?php
session_start();
$connect = mysqli_connect("localhost", "root", "", "clockweb");
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    if(isset($_POST['number_product']) && isset($_POST['carts'])){
        $page = $_POST['page'];
        $carts = $_POST['carts'];
        $space = $_POST['space'];
        $number_product = $_POST['number_product'];
        $itemss = [];
    
        $sumPrice = 0;
        foreach ($carts as $id => $value) {
            $item = new stdClass();
            $item->id = $id;
            $item->value = $value;
            array_push($itemss, $item);
            $sql = "SELECT price FROM products WHERE products.id = '$id' ";
            $result = mysqli_fetch_array(mysqli_query($connect, $sql))['price'];
            $sumPrice += $result * $value;
        }

$result = mysqli_query($connect, $sql);
    }
} else {
    echo "Không lấy được dữ liệu";
    exit;
}
?>

<ul class="card-body ">
    <?php
    if (isset($carts)) {
        for ($i = $space * $page-3; $i < min($number_product, $space * $page); $i++) {
            $id = $itemss[$i]->id;
            $value = $itemss[$i]->value;

            $sql = "SELECT products.*, name_categories, percent FROM products
                    INNER JOIN categories ON products.id_categories = categories.id_categories  
                    LEFT JOIN discount ON products.id = discount.id_product
                    WHERE products.id = '$id' ";

            $result = mysqli_query($connect, $sql);
            $item = mysqli_fetch_array($result);

            $_SESSION['sumPrice'] += ($item['price'] * (100 - $item['percent']) / 100) * $value;
            ?>
            <!-- Single item -->
            <li class="row itemProduct">
                <div class="col-lg-3 col-md-12 mb-4 mb-lg-0">
                    <!-- Image -->
                    <div class="bg-image hover-overlay hover-zoom ripple rounded" data-mdb-ripple-color="light">
                        <img src="/public/assets/client/img/image_product/<?php echo $item['image'] ?>" class="w-100" alt="Blue Jeans Jacket" />
                        <a href="#!">
                            <div class="mask" style="background-color: rgba(251, 251, 251, 0.2)"></div>
                        </a>
                    </div>
                    <!-- Image -->
                </div>

                <div class="col-lg-5 col-md-6 mb-4 mb-lg-0">
                    <!-- Data -->
                    <p><strong><?php echo $item['name_product'] ?></strong></p>
                    <p class="mt-2 mb-2">Danh mục : <?php echo $item['name_categories'] ?></p>
                    <?php if ($item['percent'] > 0) { ?>
                        <p class="mt-2 mb-2">Giá cũ: <del><?php echo number_format($item['price'], 0, ',') ?></del></p>
                        <p class="mt-2 mb-2">Giá mới: <?php echo number_format($item['price'] * (100 - $item['percent']) / 100, 0, ',') ?></p>
                    <?php } else { ?>
                        <p class="mt-2 mb-2">Giá tiền : <?php echo number_format($item['price'], 0, ',') ?></p>
                    <?php } ?>
                    <a href="/Cart/deleteCart/<?php echo $item['id'] ?>" class="btn btn-primary btn-sm me-1 mb-2" title="Xoá sản phẩm">
                        <i class="fas fa-trash"></i>
                    </a>
                    <!-- <button type="button" class="btn btn-danger btn-sm mb-2" data-mdb-toggle="tooltip"
                    title="Move to the wish list">
                    <i class="fas fa-heart"></i>
                </button> -->
                    <!-- Data -->
                </div>

                <div class="col-lg-4 col-md-6 mb-4 mb-lg-0">
                    <!-- Quantity -->
                    <div class="d-flex mb-4" style="max-width: 300px">
                        <a class="btn btn-primary px-3 me-2" href="/Cart/index/SubtractID=<?php echo $id ?>">
                            <i class="fas fa-minus"></i>
                        </a>

                        <div class="form-outline">
                            <input id="quantity" min="0" max="<?php echo $item['quantity'] ?>" name="quantity" value="<?php echo $value ?>"type="number" class="form-control" />
                            <!-- <label class="form-label" for="form1">Quantity</label> -->
                        </div>

                        <a href="/Cart/index/AddID=<?php echo $id ?>" class="btn btn-primary px-3 ms-2" id="btnTang_click">
                            <i class="fas fa-plus"></i>
                        </a>
                    </div>
                    <!-- Quantity -->

                    <!-- Price -->
                    <p class="text-start text-md-center">
                        <strong id="price"><?php echo number_format($value * $item['price'] * (100 - $item['percent']) / 100, 0, ',') ?></strong>
                    </p>
                    <!-- Price -->
                </div>
            </li>
            <!-- Single item -->

            <hr class="my-4" />
        <?php
        }
    }
    ?>
    <!-- Single item -->
</ul>
<script>
    var sumPrice = <?php echo $sumPrice ?>;
</script>