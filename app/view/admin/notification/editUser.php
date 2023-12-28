
<div class="modal fade show" id="ModalUP" tabindex="-1" role="dialog" aria-hidden="true" data-backdrop="static"
    data-keyboard="false" style="padding-right: 17px; display: block;">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">

        <div class="modal-body">
          <div class="row">
            <div class="form-group  col-md-12">
              <span class="thong-tin-thanh-toan">
                <h5>Đặt lại mật khẩu khách hàng</h5>
              </span>
            </div>
          </div>
          <form class="row" action="" method="post">
            <div class="form-group col-md-6">
              <label class="control-label">ID khách hàng</label>
              <input class="form-control" type="text"  value="<?php echo $UpdateCustomer['id']; ?>" disabled>
            </div>
            <div class="form-group col-md-6">
              <label class="control-label">Tên tài khoản</label>
              <input class="form-control" type="text" required value="<?php echo $UpdateCustomer['name_account']; ?>" disabled>
            </div>
            <div class="form-group col-md-6">
              <label class="control-label">Họ và tên</label>
              <input class="form-control" type="text" required value="<?php echo $UpdateCustomer['last_name'] . " " . $UpdateCustomer['first_name']; ?>" disabled>
            </div>
            <div class="form-group  col-md-6">
              <label class="control-label">Số điện thoại</label>
              <input class="form-control" type="number" required value="<?php echo $UpdateCustomer['phone']; ?>" disabled>
            </div>
            <div class="form-group col-md-6">
              <label class="control-label">Địa chỉ</label>
              <input class="form-control" type="text" required value="<?php echo $UpdateCustomer['address']; ?>" disabled>
            </div>
            <div class="form-group col-md-6">
              <label class="control-label">Ngày sinh</label>
              <input class="form-control" type="date" value="<?php echo $UpdateCustomer['birthday']; ?>" disabled>
            </div>
            <div class="form-group col-md-6">
              <label class="control-label">Email</label>
              <input class="form-control" type="text" required value="<?php echo $UpdateCustomer['email']; ?>" disabled>
            </div>
          </form>
          <BR>

          <BR>
          <BR>
          <a class="btn btn-save" href="/admin/QuanLyKH/?ResetID=<?php echo $UpdateCustomer['id']; ?>">Đặt lại</a>
          <a class="btn btn-cancel" href="/admin/QuanLyKH" onclick="close_modal('modal')">Hủy bỏ</a>
          <BR>
        </div>
        <div class="modal-footer">
        </div>
      </div>
    </div>
  </div>