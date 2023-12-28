<div class="modal fade show" id="ModalUP" tabindex="-1" role="dialog" aria-hidden="true" data-backdrop="static" data-keyboard="false" style="padding-right: 17px; display: block;">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">

            <div class="modal-body">
                <div class="row">
                    <div class="form-group  col-md-12">
                        <span class="thong-tin-thanh-toan">
                            <h5>Tạo khuyến mãi</h5>
                        </span>
                    </div>
                </div>
                <form class="row" action="/admin/QuanLySP/?addDiscount=true" method="post">
                    <div class="form-group col-md-12">
                        <label class="control-label">Tên sản phẩm</label>
                        <select class="pt-2 pb-2" name="id_product" id="">
                            <?php foreach ($products as $product) { ?>
                                <option class="btn form-control" value="<?php echo $product['id'] ?>"><?php echo $product['name_product'] ?></option>
                            <?php }  ?>
                        </select>
                    </div>
                    <div class="form-group col-md-12">
                        <label class="control-label">Tỉ lệ khuyến mãi</label>
                        <input class="form-control" type="number" max="100" min="0" name="percent" value="0">
                    </div>
                    <div class="form-group col-md-6">
                        <label class="control-label">Thời gian bắt đầu</label>
                        <input class="form-control" type="date" max="100" min="0" name="time_start" value="<?php echo date('Y-m-d'); ?>">
                    </div>
                    <div class="form-group col-md-6">
                        <label class="control-label">Thời gian kết thúc</label>
                        <input class="form-control" type="date" max="100" min="0" name="time_finish" value="<?php echo date('Y-m-d'); ?>">
                    </div>
                    <div class="col-md-12 mt-4">
                        <button type="submit" class="btn btn-save">Thêm</button>
                        <a href="/admin/QuanLySP" type="button" class="btn btn-cancel" onclick="close_modal('modal')">Hủy bỏ</a>
                    </div>
                </form>
                <BR>
            </div>
            <div class="modal-footer">
            </div>
        </div>
    </div>
</div>
<!-- <script src="/public/assets/admin/js/close_modal.js"></script> -->