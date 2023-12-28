<?php $_SESSION['current_page'] = $nextpage ?? 1;
$_SESSION['sumPrice'] = 0;
?>
<section class="h-100 gradient-custom">
  <div class="container py-5">
    <div class="row d-flex justify-content-center my-4">
      <div class="col-md-8">
        <div class="card mb-4">
          <div class="card-header py-3">
            <h5 class="mb-0">Giỏ hàng - <?php echo count($items) ?> sản phẩm</h5>
          </div>
          <div class="contentt" style="height: 730px;overflow: hidden;">
            <div id="contentCart">
            </div>
          </div>
          
          <div class="row">
            <div class="col-sm-12 col-md-5">
              <!-- <div class="dataTables_info" id="sampleTable_info" role="status" aria-live="polite">Hiện 1 đến 10 của 17 danh mục</div> -->
            </div>
            <div class="col-sm-12 col-md-7">
              <div class="dataTables_paginate paging_simple_numbers" id="sampleTable_paginate">
              <?php if(ceil(count($items)/3) >=2){ ?>
                <ul class="pagination" >
                  <li class="paginate_button page-item previous " id="sampleTable_previous"><button href="#" data-dt-idx="1" tabindex="0" class="page-link">Lùi</button></li>
                  <?php for($i = 1;$i<= ceil(count($items)/3);$i++){ ?>
                    <li class="paginate_button page-item <?php if($i == 1) echo "active" ?>"><button href="#" aria-controls="sampleTable" data-dt-idx="<?php echo $i ?>" tabindex="0" class="page-link"><?php echo $i ?></button></li>
                  <?php } ?>
                  <li class="paginate_button page-item next" id="sampleTable_next"><button href="#" data-dt-idx="2" aria-controls="sampleTable" tabindex="0" class="page-link">Tiếp</button></li>
                </ul>
              <?php } ?>
              </div>
            </div>
          </div>
        </div>

      </div>
      <div class="col-md-4">
        <div class="card mb-4">
          <div class="card-header py-3">
            <h5 class="mb-0">Thanh Toán</h5>
          </div>
          <div class="card-body">
            <ul class="list-group list-group-flush">
              <li class="list-group-item mt-3 mb-3 d-flex justify-content-between align-items-center border-0 px-0 pb-0">
                Số lượng sản phẩm
                <span><?php echo count($_SESSION['cart']) ?></span>
              </li>
              <!-- <li class="list-group-item d-flex justify-content-between align-items-center px-0">
                Shipping
                <span>Gratis</span>
              </li> -->
              <li class="list-group-item d-flex justify-content-between align-items-center border-0 px-0 mb-3">
                <div>
                  <strong>Tổng số tiền</strong>
                  <strong>
                    <!-- <p class="mb-0">(including VAT)</p> -->
                  </strong>
                </div>
                <span><strong id="sumprice"><?php echo number_format($_SESSION['sumPrice'], 0, ',') ?></strong></span>
              </li>
            </ul>

            <a type="button" class="btn btn-primary btn-lg btn-block" href="/Cart/ThanhToan">
              Thanh Toán
            </a>

          </div>
        </div>
      </div>

    </div>
  </div>
</section>
<style>
  .gradient-custom {
    /* fallback for old browsers */
    background: #f0f0f0;

    /* Chrome 10-25, Safari 5.1-6 */
    /* background: -webkit-linear-gradient(to right, rgba(106, 17, 203, 1), rgba(37, 117, 252, 1)); */

    /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
    /* background: linear-gradient(to right, rgba(106, 17, 203, 1), rgba(37, 117, 252, 1)) */
  }
</style>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="/public/assets/client/js/adjust_cart.js"></script>
<script src="/public/assets/admin/js/close_modal.js"></script>
<script src="/public/assets/admin/js2/jquery-3.2.1.min.js"></script>
<script src="/public/assets/admin/js2/popper.min.js"></script>
<script src="/public/assets/admin/js2/bootstrap.min.js"></script>
<script src="/ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>


<script>
  var sumPrice = localStorage.getItem('sumPrice');

  $(document).ready(function() {
    var max = $(".paginate_button").length - 2;
    $("#sampleTable_previous").addClass("disabled")
    <?php if(count($items) > 0){ ?>
      $.post("/public/assets/client/processAjax/cartTable.php", 
        {
          page : 1,
          carts : <?php echo json_encode($items) ?>,
          space :3,
          number_product : <?php echo count($items) ?>,
        }
        ,
        function (data, textStatus, jqXHR) {
          $('#contentCart').html(data);
          $("#sumprice").text(sumPrice.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ","));
        }
        );
        <?php } ?>
        $(".page-link").on('click', function () {
          var page = $(this).attr("data-dt-idx");
          
          console.log(page);
          // Gán chỉ mục nextpage
          var nextpage = Number(page) +1 ; 
          $("#sampleTable_next").attr("data-dt-idx", nextpage);
          // Gán chỉ mục pre page
          var prepage = page -1 ; 
          $("#sampleTable_previous").attr("data-dt-idx", prepage);
          if(nextpage > max){
            $("#sampleTable_next").addClass("disabled")
            $("#sampleTable_previous").removeClass("disabled")
          }
          if(prepage == 0){
            $("#sampleTable_next").removeClass("disabled")
            $("#sampleTable_previous").addClass("disabled")
          }
          var targetElement = $('[data-dt-idx="' + page + '"]'); // Lấy thẻ hiện tại
          targetElement.parent().siblings().removeClass('active')
          $('[data-dt-idx]').removeClass('active');
          targetElement.addClass('active');
          
          $.post("/public/assets/client/processAjax/cartTable.php", 
          {
            page : page,
            carts : <?php echo json_encode($items) ?>,
            space :3,
            number_product : <?php echo count($items) ?>
          }
          ,
          function (data, textStatus, jqXHR) {
            $('#contentCart').html(data);
            $("#sumprice").text(sumPrice.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ","));
          }
          );
        });
  });
</script>