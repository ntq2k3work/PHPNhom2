
<?php

?>
<table style="margin-top: 70px;" class="table table-hover table-bordered" >
    <thead>
      <tr>
        <th>#</th>
        <th scope="col">Mã đơn hàng</th>
        <th scope="col">Tên sản phẩm (Số lượng) </th>
        <!-- <th>Ảnh sản phẩm</th> -->
        <th>Ngày mua</th>
        <th scope="col">Tổng tiền</th>
        <th>Loại hình thanh toán</th>
        <th scope="col">Trạng thái</th>
      </tr>
    </thead>
    <tbody class="table-hover" id="table_container">
 
    </tbody>
  </table>
  <div class="row" style="    width: 100%;">
            <div class="col-sm-12 col-md-5">
              <!-- <div class="dataTables_info" id="sampleTable_info" role="status" aria-live="polite">Hiện 1 đến 10 của 17 danh mục</div> -->
            </div>
            <div class="col-sm-12 col-md-7">
              <div class="dataTables_paginate paging_simple_numbers" id="sampleTable_paginate">
              <?php if(ceil(mysqli_num_rows($UserOrder))/10 >=2){ ?>
                <ul class="pagination" >
                  <li class="paginate_button page-item previous " id="sampleTable_previous"><button href="#" data-dt-idx="1" tabindex="0" class="page-link">Lùi</button></li>
                  <?php for($i = 1;$i<= ceil(mysqli_num_rows($UserOrder)/10);$i++){ ?>
                    <li class="paginate_button page-item <?php if($i == 1) echo "active" ?>"><button href="#" aria-controls="sampleTable" data-dt-idx="<?php echo $i ?>" tabindex="0" class="page-link"><?php echo $i ?></button></li>
                  <?php } ?>
                  <li class="paginate_button page-item next" id="sampleTable_next"><button href="#" data-dt-idx="2" aria-controls="sampleTable" tabindex="0" class="page-link">Tiếp</button></li>
                </ul>
              <?php } ?>
              </div>
            </div>
          </div>
<style>
  table,tr,td,th{
    border: 1px solid #ccc;
  }
    .gradient-custom {
/* fallback for old browsers */
background: #f0f0f0;

/* Chrome 10-25, Safari 5.1-6 */
/* background: -webkit-linear-gradient(to right, rgba(106, 17, 203, 1), rgba(37, 117, 252, 1)); */

/* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
/* background: linear-gradient(to right, rgba(106, 17, 203, 1), rgba(37, 117, 252, 1)) */
}
</style>
<script>


  $(document).ready(function () {
      var max = $('.paginate_button').length - 2;
      console.log(max);
  });
</script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="/public/assets/admin/js/close_modal.js"></script>
<script src="/public/assets/admin/js2/jquery-3.2.1.min.js"></script>
<script src="/public/assets/admin/js2/popper.min.js"></script>
<script src="/public/assets/admin/js2/bootstrap.min.js"></script>
<script src="/ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="/public/assets/client/js/adjust_cart.js"></script>

