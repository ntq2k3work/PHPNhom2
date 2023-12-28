<?php
session_start();
$connect = mysqli_connect("localhost", "root", "", "clockweb");
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    if (isset($_POST['number_product']) && isset($_POST['UserOrder'])) {
        $page = $_POST['page'];
        $UserOrder = $_POST['UserOrder'];
        $space = $_POST['space'];
        $number_product = $_POST['number_product'];
        $itemss = [];

        foreach ($UserOrder as $id => $value) {
            $item = new stdClass();
            $item->id = $id;
            $item->value = $value;
            array_push($itemss, $item);
            print_r($item);
        }
        die();
    }
} else {
    echo "Không lấy được dữ liệu";
    exit;
} ?>
<?php
$check = [];
$cnt = 1;
?>
<?php foreach ($UserOrder as $bill) { ?>
    <tr>
        <?php
        $SumMoney = 0;
        if (!isset($check[$bill['code_bill']]))  $check[$bill['code_bill']] = true; //Nếu code_bill chưa đc xét thì xác nhận đã xét
        else continue;
        ?>
        <td><?php echo $cnt++; ?></td>
        <td><?php echo $bill['code_bill'] ?></td>
        <td>
            <?php foreach ($dataBill[$bill['code_bill']] as $item) {
                echo $item['name_product'] . "(" . $item['quantity'] . ")" . "<br>";
                $SumMoney += $item['SumMoney'];
            } ?>
        </td>
        <td><?php echo date_format(date_create($bill['time_buy']), "d-m-Y") ?></td>

        <td><?php echo number_format($SumMoney, 0, ',') . " VNĐ" ?></td>
        <td></td>
        <td><?php
            if ($item['status'] == 1) echo "<a href='/User/cartUser/GetComplete=" . $bill['code_bill'] . "'>Đã nhận hàng</a>";
            if ($item['status'] == 0) echo "Chờ xác nhận";
            if ($item['status'] == 2) echo "Nhận thành công";
            ?></td>
    </tr>
<?php } ?>
<script>
</script>