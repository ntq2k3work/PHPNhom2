<!DOCTYPE html>
<html lang="en">

    <head>

        <title>Danh sách nhân viên | Quản trị Admin</title>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- Main CSS-->
        <link rel="stylesheet" type="text/css" href="css/notification_error.css">
        <link rel="stylesheet" type="text/css" href="css/main.css">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">
        <!-- or -->
        <link rel="stylesheet" href="https://unpkg.com/boxicons@latest/css/boxicons.min.css">
      
        <!-- Font-icon css-->
        <link rel="stylesheet" type="text/css"
          href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.css">
      
      </head>
<!-- PHP -->
<?php 
      require "checkLog.php";
      require "../config/connect.php";
      require "../process/getProducts.php";
      
      if(isset($_GET['id'])){
        $id = $_GET['id'];
        $sql_product = "select * from tbl_sanpham where id_sanpham = '$id'";
        $result = mysqli_query($connect,$sql_product);
        $row_reset = mysqli_fetch_array($result);
        if(mysqli_num_rows($result)){
          require "../process/getCategories.php";
          if(isset($_GET['del'])){
            $_SESSION['warning'] = "Xác nhận xoá !";
            $_SESSION['link'] = "../process/process_delete_products.php";
            require "../notification/warning.php";
            unset($_SESSION['warning']);
            unset($_SESSION['link']);
          }else{
            require "../notification/editProduct.php";  
          }
        }else{
          $_SESSION['ERROR'] = "ID này không tồn tại !";
        }
      }
      if(isset($_SESSION['ERROR'])){
          require ".././notification/noti_error.php";
          unset($_SESSION['ERROR']);
      }
      if(isset($_SESSION['success'])){
          require ".././notification/noti_success.php";
          unset($_SESSION['success']);
      }
      if(isset($_GET['add'])){
        require "../process/getCategories.php";
        require ".././notification/addProduct.php";
      }
?>
<!--  -->
<body onload="time()" class="app sidebar-mini rtl">
   <!-- Navbar-->
   <header class="app-header">
    <!-- Sidebar toggle button--><a class="app-sidebar__toggle" href="#" data-toggle="sidebar"
      aria-label="Hide Sidebar"></a>
    <!-- Navbar Right Menu-->
    <ul class="app-nav">


      <!-- User Menu-->
      <li><a class="app-nav__item" href="/index.html"><i class='bx bx-log-out bx-rotate-180'></i> </a>

      </li>
    </ul>
  </header>
  <!-- Sidebar menu-->
  <div class="app-sidebar__overlay" data-toggle="sidebar"></div>
  <aside class="app-sidebar">
    <div class="app-sidebar__user"><img class="app-sidebar__user-avatar" src="https://png.pngtree.com/png-vector/20191122/ourlarge/pngtree-beautiful-admin-roles-glyph-vector-icon-png-image_2002847.jpg" width="50px"
        alt="User Image">
      <div>
        <p class="app-sidebar__user-name"><b><?php echo $_SESSION['acAdmin']; ?></b></p>
      </div>
    </div>
    <hr>
    <ul class="app-menu">
      <li><a class="app-menu__item " href=""><i class='app-menu__icon bx bx-tachometer'></i><span
            class="app-menu__label">Bảng điều khiển</span></a></li>
      <li><a class="app-menu__item " href="admin/QuanLyKH"><i class='app-menu__icon bx bx-id-card'></i> <span
            class="app-menu__label ">Quản lý khách hàng</span></a></li>

      <li><a class="app-menu__item active" href="admin/QuanLySP"><i
            class='app-menu__icon bx bx-purchase-tag-alt'></i><span class="app-menu__label">Quản lý sản phẩm</span></a>
      </li>
      <li><a class="app-menu__item" href="admin/QuanLyDonHang"><i class='app-menu__icon bx bx-task'></i><span
            class="app-menu__label">Quản lý đơn hàng</span></a></li>
      <li><a class="app-menu__item" href="admin/QuanLyDanhMuc"><i class='app-menu__icon bx bx-dollar'></i><span
            class="app-menu__label">Quản lý danh mục</span></a></li>

    </ul>
  </aside>
    <main class="app-content">
        <div class="app-title">
            <ul class="app-breadcrumb breadcrumb side">
                <li class="breadcrumb-item active"><a href="#"><b>Danh sách sản phẩm</b></a></li>
            </ul>
            <div id="clock"></div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="tile">
                    <div class="tile-body">
                        <div class="row element-button">
                            <div class="col-sm-2">
              
                              <a class="btn btn-add btn-sm" href="?add=1" title="Thêm"><i class="fas fa-plus"></i>
                                Tạo mới sản phẩm</a>
                            </div>
                            <!-- <div class="col-sm-2">
                              <a class="btn btn-delete btn-sm nhap-tu-file" type="button" title="Nhập" onclick="myFunction(this)"><i
                                  class="fas fa-file-upload"></i> Tải từ file</a>
                            </div>
              
                            <div class="col-sm-2">
                              <a class="btn btn-delete btn-sm print-file" type="button" title="In" onclick="myApp.printTable()"><i
                                  class="fas fa-print"></i> In dữ liệu</a>
                            </div>
                            <div class="col-sm-2">
                              <a class="btn btn-delete btn-sm print-file js-textareacopybtn" type="button" title="Sao chép"><i
                                  class="fas fa-copy"></i> Sao chép</a>
                            </div>
              
                            <div class="col-sm-2">
                              <a class="btn btn-excel btn-sm" href="" title="In"><i class="fas fa-file-excel"></i> Xuất Excel</a>
                            </div>
                            <div class="col-sm-2">
                              <a class="btn btn-delete btn-sm pdf-file" type="button" title="In" onclick="myFunction(this)"><i
                                  class="fas fa-file-pdf"></i> Xuất PDF</a>
                            </div> -->
                            <div class="col-sm-2">
                            <a class="btn btn-delete btn-sm" type="button" title="Xóa" href="../process/process_delete_products.php" onclick="return confirm('Bạn chắn chắn muốn xoá tất cả chứ ?')" style="color: #000;"><i
                              class="fas fa-trash-alt"></i> Xóa tất cả </a>
                            </div>
                          </div>
                        <table class="table table-hover table-bordered" id="sampleTable">
                            <thead>
                                <tr>
                                    <th width="10">#</th>
                                    <th>Mã sản phẩm</th>
                                    <th>Tên sản phẩm</th>
                                    <th>Hình ảnh</th>
                                    <th>Số lượng</th>
                                    <th>Giá bán / sản phẩm</th>
                                    <th>Tình trạng</th>
                                    <th>Danh mục</th>
                                    <th>Chức năng</th>
                                </tr>
                            </thead>
                            <tbody>
                              <?php $cnt = 0; ?>
                              <?php foreach($each as $product){ ?>
                                <?php $cnt ++; ?>
                                <tr>
                                <td width="10"><?php echo $cnt; ?></td>
                                  <td><?php echo $product['masanpham']; ?></td>
                                  <td><?php echo $product['tensanpham']; ?></td>
                                  <td><img class="img-card-person" src="../../images/img_products/<?php echo $product['hinhanh'] ?>" alt="Ảnh sản phẩm"></td>
                                  <td><?php echo $product['soluong']; ?></td>
                                  <td><?php echo number_format($product['giasanpham'],0,'.') ?></td>
                                  <td><?php echo $product['trangthai'] == '1' ? "Còn hàng" : "Hết hàng" ; ?></td>
                                  <td><?php echo $product['tendanhmuc']; ?></td>
                                  <td class="table-td-center">
                                  <a href="?id=<?php echo $product['id_sanpham'] ?>&del=1" 
                                    class="btn trash"title="Xóa"><i class="fas fa-trash-alt"></i>
                                  </a>
                                    <a class="btn btn-primary btn-sm edit" href="?id=<?php echo $product['id_sanpham']; ?>" title="Chỉnh sửa sản phẩm" id="show-emp"
                                      ><i class="fas fa-edit"></i>
                                    </a>
                                  </td>
                                </tr>
                              <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </main>

<!--
  MODAL
-->
<div class="modal fade" id="ModalUP" tabindex="-1" role="dialog" aria-hidden="true" data-backdrop="static"
data-keyboard="false">

</div>
<!--
MODAL
-->

    <!-- Essential javascripts for application to work-->
    <script src="../assets/js/close_modal.js"></script>
    <script src="js/jquery-3.2.1.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script src="src/jquery.table2excel.js"></script>
    <script src="js/main.js"></script>
    <!-- The javascript plugin to display page loading on top-->
    <script src="js/plugins/pace.min.js"></script>
    <!-- Page specific javascripts-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.js"></script>
    <!-- Data table plugin-->
    <script type="text/javascript" src="js/plugins/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="js/plugins/dataTables.bootstrap.min.js"></script>
    <script type="text/javascript">
        $('#sampleTable').DataTable();
        //Thời Gian
    function time() {
      var today = new Date();
      var weekday = new Array(7);
      weekday[0] = "Chủ Nhật";
      weekday[1] = "Thứ Hai";
      weekday[2] = "Thứ Ba";
      weekday[3] = "Thứ Tư";
      weekday[4] = "Thứ Năm";
      weekday[5] = "Thứ Sáu";
      weekday[6] = "Thứ Bảy";
      var day = weekday[today.getDay()];
      var dd = today.getDate();
      var mm = today.getMonth() + 1;
      var yyyy = today.getFullYear();
      var h = today.getHours();
      var m = today.getMinutes();
      var s = today.getSeconds();
      m = checkTime(m);
      s = checkTime(s);
      nowTime = h + " giờ " + m + " phút " + s + " giây";
      if (dd < 10) {
        dd = '0' + dd
      }
      if (mm < 10) {
        mm = '0' + mm
      }
      today = day + ', ' + dd + '/' + mm + '/' + yyyy;
      tmp = '<span class="date"> ' + today + ' - ' + nowTime +
        '</span>';
      document.getElementById("clock").innerHTML = tmp;
      clocktime = setTimeout("time()", "1000", "Javascript");

      function checkTime(i) {
        if (i < 10) {
          i = "0" + i;
        }
        return i;
      }
    }
    </script>

</body>

</html>