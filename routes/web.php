<?php

use App\Http\Controllers\GioHangController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\LoaiSanPhamController;
use App\Http\Controllers\MaGiamGiaController;
use App\Http\Controllers\MailController;
use App\Http\Controllers\SanPhamController;
use App\Http\Controllers\SinhVienController;
use App\Http\Controllers\test;
use App\Http\Controllers\UserController;
use App\Models\LoaiSanPham;
use App\Models\MaGiamGia;
use App\Models\SinhVien;
use Illuminate\Support\Facades\Redis;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::prefix('admin')->group(function () {
    Route::prefix('sanpham')->group(function () {

        Route::get('danhsach', [SanPhamController::class, 'danhsach']);

        Route::get('them', [SanPhamController::class, 'them']);
        Route::post('them', [SanPhamController::class, 'dulieuthem']);

        Route::get('sua/{id}', [SanPhamController::class, 'sua']);
        Route::post('sua/{id}', [SanPhamController::class, 'dulieusua']);

        Route::get('xoa/{id}', [SanPhamController::class, 'xoa']);
    });

    Route::prefix('loaisanpham')->group(function(){

        Route::get('danhsach', [LoaiSanPhamController::class, 'danhsach']);

        Route::get('them', [LoaiSanPhamController::class, 'them']);
        Route::post('them', [LoaiSanPhamController::class, 'dulieuthem']);

        Route::get('sua/{id}', [LoaiSanPhamController::class, 'sua']);
        Route::post('sua/{id}', [LoaiSanPhamController::class, 'dulieusua']);

        Route::get('xoa/{id}', [LoaiSanPhamController::class, 'xoa']);
    });

    Route::prefix('magiamgia')->group(function(){
        Route::get('danhsach', [MaGiamGiaController::class, 'danhsach']);
        Route::get('them', [MaGiamGiaController::class, 'them']);
        Route::post('them', [MaGiamGiaController::class, 'dulieuthem']);
        Route::get('xoa/{id}', [MaGiamGiaController::class, 'xoa']);
    });
});

Route::get('index', [IndexController::class, 'index']);
Route::get('chitietsanpham/{id}', [IndexController::class, 'chitietsanpham']);


Route::get('giohang/them/{id}', [GioHangController::class, 'them']);
Route::get('giohang/danhsach', [GioHangController::class, 'danhsach']);
Route::get('giohang/xoa/{id}', [GioHangController::class, 'xoa']);
Route::post('giohang/capnhat', [GioHangController::class, 'capnhat']);
Route::post('giohang/chitietthem/{id}', [GioHangController::class, 'chitietsanphamthem']);
Route::get('giohang/xoatatca', [GioHangController::class, 'xoatatca']);
Route::get('giohang/thanhtoan',[GioHangController::class, 'thanhtoan'])->middleware('login');
Route::Post('giohang/thanhtoan', [GioHangController::class, 'dulieuthanhtoan']);

Route::get('dangnhap', [UserController::class, 'getDangNhapAdmin'])->name('dangnhap');
Route::post('dangnhap', [UserController::class, 'postDangNhapAdmin']);
Route::get('dangxuat',[UserController::class, 'getDangXuat'])->name('dangxuat');

Route::get('donhangcuatoi', [UserController::class, 'donhangcuatoi']);
Route::get('chitietdonhang/{id}', [UserController::class, 'chitietdonhang']);
Route::post('thanhtoanpaypal', [GioHangController::class, 'thanhtoanpaypal']);
Route::get('paypalthanhtoan', [GioHangController::class, 'paypal']);

Route::get('guimail', [MailController::class, 'guimail']);
Route::get('thanhtoanloi', function(){
    return view('giohang.loi');
});