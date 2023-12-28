<?php 
$connect = mysqli_connect("localhost", "root", "", "clockweb");
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $key = $_POST['key'];
    $sql = "select products.*,products.id AS product_id,price,name_categories from products
    inner join categories on products.id_categories = categories.id_categories 
    inner join brand on products.id_brand  = brand.id
    inner join material on products.id_material  = material.id
    left join discount on products.id = discount.id_product
    where name_product like '%$key%' or name_categories like '%$key%' limit 8";
    $result = mysqli_query($connect,$sql);
}
?>

<ul class="contentSearching"  >
    <?php 
    if(mysqli_num_rows($result) < 1){ ?>
        <strong class="d-flex justify-content-center align-item-center">Sản phẩm không tồn tại</strong>
    <?php } ?> 
    <?php foreach($result as $product){ ?>
    <li>
        <a href="/product/detail/<?php echo $product['id'] ?>" class="d-flex justify-content-around text-decoration-none align-item-center">
            <div style="flex:2;margin: 0 5px 0 0;"><?php echo $product['name_product'] ?></div>
            <div style="flex:1 " class="text-center"><?php echo $product['name_categories'] ?></div>
            <div style="flex:1 " class="text-center"><?php echo number_format($product['price'],0,',') ?> đ</div>
        </a>
    </li>
    <?php } ?>
</ul>
<script>
    
</script>