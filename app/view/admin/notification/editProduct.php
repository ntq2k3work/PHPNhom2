<div class="modal fade show" id="ModalUP" tabindex="-1" role="dialog" aria-hidden="true" data-backdrop="static"
    data-keyboard="false" style="padding-right: 17px; display: block;padding-top: 30px;z-index: 10;">
    <div class="modal-dialog modal-dialog-centered" role="document" style="max-width: 800px;" >
      <div class="modal-content">

        <div class="modal-body">
          <div class="row">
            <div class="form-group  col-md-12">
              <span class="thong-tin-thanh-toan">
                <h5>Chỉnh sửa sản phẩm</h5>
              </span>
            </div>
          </div>
          <form class="row" action="/admin/QuanLySP/?editID=<?php echo $UpdateProducts['id'] ?>" method="post" enctype="multipart/form-data">
            <input type="hidden" name="id" value="<?php echo $UpdateProducts['id'] ?>" >
            <div class="form-group col-md-6">
              <label class="control-label">Mã sản phẩm</label>
              <input class="form-control" name="id_product" type="text" required value="<?php echo $UpdateProducts['id_product']; ?>" >
            </div>
            <div class="form-group col-md-6">
              <label class="control-label">Tên sản phẩm</label>
              <input class="form-control" name="name_product" type="text" required value="<?php echo $UpdateProducts['name_product']; ?>" >
            </div>
            <div class="form-group col-md-4">
              <label class="control-label">Ngày phát hành</label>
              <input class="form-control" name="released" type="date" required value="<?php echo $UpdateProducts['released']; ?>" >
            </div>
            <div class="form-group col-md-4">
              <label class="control-label">Hình dạng</label>
              <input class="form-control" name="shape" type="text" required value="<?php echo $UpdateProducts['shape']; ?>" >
            </div>
            <div class="form-group col-md-4">
              <label class="control-label">Màu sắc</label>
              <input class="form-control" name="color" type="text" required value="<?php echo $UpdateProducts['color']; ?>" >
            </div>
            <div class="form-group col-md-4">
              <label class="control-label">Kích thước</label>
              <input class="form-control" name="size" type="text" required value="<?php echo $UpdateProducts['size']; ?>" >
            </div>
            
            <div class="form-group col-md-4">
              <label class="control-label">Loại pin</label>
              <input class="form-control" name="battery" type="text" required value="<?php echo $UpdateProducts['battery']; ?>" >
            </div>
            <div class="form-group col-md-4">
              <label class="control-label">Chống nước</label>
              <input class="form-control" name="water" type="text" required value="<?php echo $UpdateProducts['water_resistance']; ?>" >
            </div>
            <div class="form-group col-md-6">
              <label class="control-label">Số lượng</label>
              <input class="form-control" name="SoLuong" type="number" required value="<?php echo $UpdateProducts['quantity']; ?>" >
            </div>
            <div class="form-group  col-md-6">
              <label class="control-label">Giá tiền/ sản phẩm</label>
              <input class="form-control" name="GiaTien" type="number" required value="<?php echo $UpdateProducts['price']; ?>" >
            </div>
            <div class="form-group col-md-6">
              <label class="control-label">Danh mục</label>
              <select name="categories" id="" class="form-control">
                <?php foreach ($categories as $category) { ?>
                    <option value="<?php echo $category['id_categories'] ?>"><?php echo $category['name_categories'] ?></option>
                <?php } ?>
              </select>
            </div>
            <div class="form-group col-md-6">
              <label class="control-label">Thương hiệu</label>
              <select name="brand" id="" class="form-control">
                <?php foreach ($brands as $brand) { ?>
                    <option value="<?php echo $brand['id']  ?>"><?php echo $brand['name_brand'] ?></option>
                <?php } ?>
              </select>
            </div>
            <div class="form-group col-md-6">
              <label class="control-label">Chất liệu</label>
              <select name="material" id="" class="form-control">
                <?php foreach ($materials as $material) { ?>
                    <option value="<?php echo $material['id'] ?> "><?php echo $material['wire_material'] ?></option>
                <?php } ?>
              </select>
            </div>
            <!-- <div class="form-group col-md-12">
              <label class="control-label">Tóm tắt</label>
              <textarea class="d-block mt-2 " name="tomtat" id="" cols="100" rows="10"><?php echo $UpdateProducts['tomtat']  ?></textarea>
            </div> -->
            <div class="form-group col-md-12">
              <label class="control-label">Nội dung</label>
              <textarea class="d-block mt-2 " style="min-height: 150px;" name="noidung" id="" cols="100" rows="60"><?php echo $UpdateProducts['description']  ?></textarea>
            </div>
            <div class="form-group col-md-12">
              <label class="control-label">Ảnh sản phẩm</label>
              <div><img class="img-card-person" style="margin-left: 0;width: 150px;height: 150px;" src="/public/assets/client/img/image_product/<?php echo $UpdateProducts['image'] ?>" alt="Ảnh sản phẩm"></div>
              <input type="file" class="d-block mt-2 " name="img" id="" accept=".jpg, .jpeg, .png">
            </div>
            <br>
            <div class="col-md-12 mt-4">
                <input type="submit" class="btn btn-save" value="Chỉnh sửa" >
                <a class="btn btn-cancel" href="/admin/QuanLySP" onclick="close_modal('modal')">Hủy bỏ</a>
            </div>
        </form>
        </div>
        <div class="modal-footer">
        </div>
      </div>
    </div>
  </div>