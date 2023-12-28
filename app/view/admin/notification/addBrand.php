
<div class="modal fade show" id="ModalUP" tabindex="-1" role="dialog" aria-hidden="true" data-backdrop="static"
    data-keyboard="false" style="padding-right: 17px; display: block;">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">

        <div class="modal-body">
          <div class="row">
            <div class="form-group  col-md-12">
              <span class="thong-tin-thanh-toan">
                <h5>Thêm Thương Hiệu</h5>
              </span>
            </div>
          </div>
          <form class="row" action="/admin/QuanLyThuongHieu/?inserted=true" method="post">
            <div class="form-group col-md-12">
              <label class="control-label">Tên Thương Hiệu</label>
              <input class="form-control" type="text" name="nameBrand" required>
            </div>
            <div class="form-group col-md-12">
              <label class="control-label">Địa chỉ</label>
              <input class="form-control" type="text" name="address" required>
            </div>
            <div class="form-group col-md-6">
              <label class="control-label">Email</label>
              <input class="form-control" type="email" name="email" required>
            </div>
            <div class="form-group col-md-6">
              <label class="control-label">Số điện thoại</label>
              <input class="form-control" type="text" name="phone" required>
            </div>
            <div class="col-md-12 mt-4">
              <button type="submit" class="btn btn-save" >Thêm</button>
              <button type="button" class="btn btn-cancel"  onclick="close_modal('modal')">Hủy bỏ</button>
            </div>
          </form>
          <BR>
        </div>
        <div class="modal-footer">
        </div>
      </div>
    </div>
  </div>
  <script src="/public/assets/admin/js/close_modal.js"></script>