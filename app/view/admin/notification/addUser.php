
<div class="modal fade show" id="ModalUP" tabindex="-1" role="dialog" aria-hidden="true" data-backdrop="static"
    data-keyboard="false" style="padding-right: 17px; display: block;">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">

        <div class="modal-body">
          <div class="row">
            <div class="form-group  col-md-12">
              <span class="thong-tin-thanh-toan">
                <h5>Đăng ký tài khoản khách hàng</h5>
              </span>
            </div>
          </div>
          <form class="row" action="/admin/QuanLyKH/insertedUser=true" method="post">
          <div class="form-group col-md-6">
              <label class="control-label">Họ </label>
              <input class="form-control" type="text" name="last_name" required  >
            </div>
            <div class="form-group col-md-6">
              <label class="control-label">Tên </label>
              <input class="form-control" type="text" name="first_name" required  >
            </div>
            <div class="form-group col-md-6">
              <label class="control-label">Ngày sinh</label>
              <input class="form-control" type="date" name="birthday" required value="09/10/2003"  >
            </div>
            <div class="form-group col-md-6">
              <label class="control-label">Giới tính</label>
              <div class="radio" style="margin-top: 10px;">
              <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="gender" id="inlineRadio1" value="1">
                    <label class="form-check-label" for="inlineRadio1">Nam</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="gender" id="inlineRadio2" value="0">
                    <label class="form-check-label" for="inlineRadio2">Nữ</label>
                </div>
              </div>
            </div>
            <div class="form-group col-md-12">
              <label class="control-label">Tên tài khoản</label>
              <input class="form-control" type="text" name="username" required  >
            </div>
            <div class="form-group col-md-12">
              <label class="control-label">Mật khẩu </label>
              <input class="form-control" type="password" name="password" required  >
            </div>
            <div class="form-group col-md-12">
              <label class="control-label">Xác nhận mật khẩu </label>
              <input class="form-control" type="password" name="confirmpassword" required  >
            </div>
            
            <div class="form-group  col-md-6">
              <label class="control-label">Số điện thoại</label>
              <input class="form-control" type="number" name="phone" required  >
            </div>
            <div class="form-group col-md-6">
              <label class="control-label">Địa chỉ</label>
              <input class="form-control" type="text" name="address" required  >
            </div>
            <div class="form-group col-md-6">
              <label class="control-label">Email</label>
              <input class="form-control" type="text" name="email" required  >
            </div>
            <BR>
  
            <BR>
            <BR>
            <div class="col-md-12">
                <button type="submit" class="btn btn-save" href="/admin/QuanLyKH/insertedUser=true">Đăng ký</button>
                <button class="btn btn-cancel" href="/admin/QuanLyKH" onclick="close_modal('modal')">Hủy bỏ</button>
            </div>
          </form>
          <BR>
        </div>
        <div class="modal-footer">
        </div>
      </div>
    </div>
  </div>