<?php $item_container_number = 12 ?>

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
            <li class="m-2 p-2">Xem tất cả <?php echo mysqli_num_rows($products) ?>  kết quả</li>
            <li class="m-2">
                <select name="" id="order-select" class="p-2" >
                    <option value="1" selected>Thứ tự mặc định</option>
                    <option value="3">Thứ tự theo giá : cao đến thấp</option>
                    <option value="2">Thứ tự theo giá : thấp đến cao</option>
                </select>
            </li>
        </ol>
    </div>
    <div class="main_categories d-flex" style="    min-height: 800px;">
        <div class="categories_left w-25">
            <div class="left_header m-3">
                <h5 class="text-uppercase">Danh mục sản phẩm</h5>
                <ul class="border p-2">

                    <li class="border-bottom p-1"><a href="/product/list/Dong-Ho-Nam" class="text-decoration-none text-dark">Đồng hồ nam</a></li>
                    <li class="border-bottom p-1"><a href="/product/list/Dong-Ho-Nu" class="text-decoration-none text-dark">Đồng hồ nữ</a></li>
                    <li class="border-bottom p-1"><a href="/product/list/Dong-Ho-Doi" class="text-decoration-none text-dark">Đồng hồ đôi</a></li>
                    <li class="d-flex justify-content-between">
                        <a href="/product/list/Phu-kien" class="text-decoration-none text-dark">Phụ kiện</a>
                        <!-- <p><i class="fas fa-sort-down"></i></p> -->
                    </li>
                </ul>
            </div>
            <div class="left_header m-3">
                <h5 class="text-uppercase">THƯƠNG HIỆU</h5>
                <ul class="border p-2">
                    <?php  ?>
                    <li class="border-bottom p-1"><a href="/product/list/Rolex" class="text-decoration-none text-dark">Rolex</a></li>
                    <li class="border-bottom p-1"><a href="/product/list/Louis_Erard" class="text-decoration-none text-dark">Louis Erard</a></li>
                    <li class="border-bottom p-1"><a href="/product/list/Mathey_Tissot" class="text-decoration-none text-dark">Mathey Tissot</a></li>
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
                    <li class="border-bottom p-1"><a href="/product/list/Day_Da" class="text-decoration-none text-dark">Dây da</a></li>
                    <li class="border-bottom p-1"><a href="/product/list/Day_Kim_Loai" class="text-decoration-none text-dark">Dây kim loại</a></li>
                    <li class="border-bottom p-1"><a href="/product/list/Nhua_Cao_Su" class="text-decoration-none text-dark">Dây nhựa / Cao su</a></li>
                    <li class=""><a href="/product/list/Titanium" class="text-decoration-none text-dark">Dây titanium</a></li>

                </ul>
            </div>

        </div>
        <div class="categories_right w-75">
            <div id="listContainer">
                
            </div>
            <div class="row">
            <div class="col-sm-12 col-md-5">
              <!-- <div class="dataTables_info" id="sampleTable_info" role="status" aria-live="polite">Hiện 1 đến 10 của 17 danh mục</div> -->
            </div>
            <div class="col-sm-12 col-md-7">
              <div class="dataTables_paginate paging_simple_numbers" id="sampleTable_paginate">
                <ul class="pagination mb-2 mt-2" >
                  <li class="paginate_button page-item previous " id="sampleTable_previous"><button href="#" data-dt-idx="1" tabindex="0" class="page-link">Lùi</button></li>
                  <?php for($i = 1;$i<= ceil(mysqli_num_rows($products)/$item_container_number);$i++){ ?>
                    <li class="paginate_button page-item <?php if($i == 1) echo "active" ?>"><button href="#" aria-controls="sampleTable" data-dt-idx="<?php echo $i ?>" tabindex="0" class="page-link"><?php echo $i ?></button></li>
                  <?php } ?>
                  <li class="paginate_button page-item next" id="sampleTable_next"><button href="#" data-dt-idx="2" aria-controls="sampleTable" tabindex="0" class="page-link">Tiếp</button></li>
                </ul>
              </div>
            </div>
          </div>
        </div>
    </div>

</section>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="/public/assets/client/js/adjust_cart.js"></script>
<script src="/public/assets/admin/js/close_modal.js"></script>
<script src="/public/assets/admin/js2/jquery-3.2.1.min.js"></script>
<script src="/public/assets/admin/js2/popper.min.js"></script>
<script src="/public/assets/admin/js2/bootstrap.min.js"></script>
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script>
  $(document).ready(function() {
    var max = $(".paginate_button").length - 2;
    $("#sampleTable_previous").addClass("disabled")
    <?php if(mysqli_num_rows($products) <= $item_container_number) ?>  $("#sampleTable_next").addClass("disabled") 
    <?php if(mysqli_num_rows($products) > 0){ ?>
      $.post("/public/assets/client/processAjax/listTable.php", 
        {
          page : 1,
          carts : <?php echo json_encode($items) ?>,
          space :<?php echo $item_container_number ?>,
          number_product : <?php echo mysqli_num_rows($products) ?> 
        }
        ,
          function (data, textStatus, jqXHR) {
            $('#listContainer').html(data);
          }
          );
    <?php } ?>
    $(".page-link").on('click', function () {
        var page = $(this).attr("data-dt-idx");
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

      $.post("/public/assets/client/processAjax/listTable.php", 
      {
        page : page,
        carts : <?php echo json_encode($items) ?>,
        space :<?php echo $item_container_number ?>,
        number_product : <?php echo count($items) ?>
      }
      ,
        function (data, textStatus, jqXHR) {
          $('#listContainer').html(data);
        }
      );
    });
  });

  // Lọc
  const orderSelect = document.getElementById('order-select');
    const resultContainer = document.getElementById('listContainer');

    orderSelect.addEventListener('change', function () {
        const selectedValue = orderSelect.value;
        executeAjax(selectedValue);
    });

    function executeAjax(selectedValue) {

        if (selectedValue === '1') {

          $.post("/public/assets/client/processAjax/listTable.php", 
            {
              page : 1,
              carts : <?php echo json_encode($items) ?>,
              space :<?php echo $item_container_number ?>,
              number_product : <?php echo mysqli_num_rows($products) ?> 
            }
            ,
              function (data, textStatus, jqXHR) {
                $('#listContainer').html(data);
              }
            );
            
        }
        // Nếu selectedValue là '2' (Thứ tự theo mức độ phổ biến)
        else if (selectedValue === '2') {
          $.post("/public/assets/client/processAjax/sort.php", 
            {
              page : 1,
              carts : <?php echo json_encode($items) ?>,
              space :<?php echo $item_container_number ?>,
              number_product : <?php echo mysqli_num_rows($products) ?> ,
              selectedValue : 2
            }
            ,
              function (data, textStatus, jqXHR) {
                $('#listContainer').html(data);
              }
            );
        }
        // Nếu selectedValue là '3' (Thứ tự theo giá: cao đến thấp)
        else if (selectedValue === '3') {
            $.post("/public/assets/client/processAjax/sort.php", 
            {
              page : 1,
              carts : <?php echo json_encode($items) ?>,
              space :<?php echo $item_container_number ?>,
              number_product : <?php echo mysqli_num_rows($products) ?> ,
              selectedValue : 3
            }
            ,
              function (data, textStatus, jqXHR) {
                $('#listContainer').html(data);
              }
            );
        }
    }
</script>