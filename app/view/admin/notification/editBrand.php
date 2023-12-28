
<?php 
  print_r($brand);
?>
<div class="modal fade show" id="ModalUP" tabindex="-1" role="dialog" aria-hidden="true" data-backdrop="static"
    data-keyboard="false" style="padding-right: 17px; display: block;">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">

        <div class="modal-body">
          <div class="row">
            <div class="form-group  col-md-12">
              <span class="thong-tin-thanh-toan">
                <h5>Chỉnh sửa thương hiệu</h5>
              </span>
            </div>
          </div>
          <form class="row" action="/admin/QuanLyThuongHieu/?Updated=<?php echo $id ?>" method="post">
            <div class="form-group col-md-12">
              <label class="control-label">Tên danh mục</label>
              <input class="form-control" name="name_brand" type="text" required value="<?php echo $brand['name_brand'] ; ?>" >
            </div>
            <div class="form-group col-md-12">
              <label class="control-label">Địa chỉ</label>
              <input class="form-control" name="address" type="text" required value="<?php echo $brand['address'] ; ?>" >
            </div>
            <div class="form-group col-md-12">
              <label class="control-label">Email</label>
              <input class="form-control" name="email" type="phone" required value="<?php echo $brand['email'] ; ?>" >
            </div>
            <div class="form-group col-md-12">
              <label class="control-label">Số điện thoại</label>
              <input class="form-control" name="phone" type="text" required value="<?php echo $brand['phone'] ; ?>" >
            </div>
            <!-- <div class="form-group col-md-12">
              <label class="control-label">Thứ tự danh mục</label>
              <input class="form-control" type="text" required value="<?php echo $brand['thutu']; ?>" disabled>
            </div> -->
            <BR>

          <BR>
          <BR>
            <div class="ml-3">
              <button class="btn btn-save" type="submit"">Chỉnh sửa</button>
              <button class="btn btn-cancel" onclick="close_modal('modal')">Hủy bỏ</button>
            </div>
          </form>
          
          <BR>
        </div>
        <div class="modal-footer">
        </div>
      </div>
    </div>
  </div>