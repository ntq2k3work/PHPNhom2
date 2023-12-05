<?php

class AdminController extends \core\BaseController
{
    public $model;
    public $data = [];

    public function index()
    {
        
        $this ->render('admin/index');
        
    }
    public function forgot()
    {
        echo "Đây là quản lí KH";

        $this ->render('admin/forgot');

    }
    public function QuanLyKH()
    {
        echo "Đây là quản lí KH";

        $this ->render('admin/dashboard/table-data-user');

    }
    public function QuanLySP()
    {
        echo "Đây là quản lí Sản phẩm";

        $this ->render('admin/dashboard/table-data-product');

    }
    public function QuanLyDonHang()
    {
        echo "Đây là quản lí đơn hàng";

        $this ->render('admin/dashboard/table-data-order');

    }
    public function QuanLyDanhMuc()
    {
        echo "Đây là quản lí KH";

        $this ->render('admin/dashboard/table-data-categories');

    }
}