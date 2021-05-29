<?php

namespace App\Http\Controllers;

use App\Models\ChiTietDonHang;
use App\Models\DonHang;
use App\Models\Huyen;
use App\Models\MaGiamGia;
use App\Models\SanPham;
use App\Models\Tinh;
use App\Models\UsersMeta;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class GioHangController extends Controller
{
    //
    public function danhsach(){
        return view('giohang.danhsach');
    }
    public function them(Request $request, $id){
        $sanpham = SanPham::find($id);
        Cart::add([
            'id' => $sanpham->id,
            'name' => $sanpham->ten,
            'price' => $sanpham->gia,
            'qty' => 1,
            'options' => ['hinhanh' => $sanpham->hinhanh]
        ]);
        return redirect('giohang/danhsach');
    }
    public function chitietsanphamthem(Request $request, $id){
        $sanpham = SanPham::find($id);
        Cart::add([
            'id' => $sanpham->id,
            'name' => $sanpham->ten,
            'price' => $sanpham->gia,
            'qty' => $request->soluong,
            'options' => ['hinhanh' => $sanpham->hinhanh]
        ]);
        return redirect('giohang/danhsach');
    }
    public function capnhat(Request $request){
        $sanpham = $request->soluong;
        foreach($sanpham as $k => $v){
            Cart::update($k, $v);
        }
        return redirect('giohang/danhsach');
    }
    public function xoa($id){
        Cart::remove($id);
        return redirect('giohang/danhsach');
    }
    public function xoatatca(){
        Cart::destroy();
        return view('giohang.danhsach');
    }
    public function thanhtoan(){
        $tinh = Tinh::all();
        $huyen = Huyen::all();
        return view('giohang.thanhtoan', compact('tinh', 'huyen'));
    }
    public function dulieuthanhtoan(Request $request){

        $messages = [
            'hoten.required' => 'Vui lòng nhập họ tên!',
            'sdt.required' => 'Vui lòng nhập số điện thoại!',
            'diachi.required' => 'Vui lòng nhập địa chỉ!',
        ];
        $this->validate($request,[
            'hoten' => 'required',
            'sdt' => 'required',
            'diachi' => 'required',
        ], $messages);
        
        $user = Auth::user()->id;
        $usermeta = UsersMeta::where('uid', '=', $user)->get();
        if(count($usermeta)==1){
            UsersMeta::where('uid', '=', $user)->update([
                'hoten' => $request->hoten,
                'sdt' => $request->sdt,
                'email' => $request->email,
                'diachi' => $request->diachi,
                'tinh' => $request->tinh,
                'huyen' => $request->huyen,
            ]);
            $request->session()->flash('success');
        }else{
            UsersMeta::create([
                'uid' => $user,
                'hoten' => $request->hoten,
                'sdt' => $request->sdt,
                'email' => $request->email,
                'diachi' => $request->diachi,
                'tinh' => $request->tinh,
                'huyen' => $request->huyen,
            ]);
            $request->session()->flash('success');
        }
        if(session('success')){
            $magiamgia = MaGiamGia::all();
            if(isset($request->magiamgia)){
                foreach($magiamgia as $mgg){
                    if($mgg->magiamgia == $request->magiamgia && $mgg->soluong > 0){
                        $tongtien = (Cart::total()*85)/100;
                        $capnhatsoluong = $mgg->soluong -1;
                        MaGiamGia::where('magiamgia' , '=', $mgg->magiamgia)->update(['soluong' => $capnhatsoluong]);
                        break;
                    }
                    else
                    {
                        $tongtien = Cart::total();
                        break;
                    }
                }
            }
            else{
                $tongtien = Cart::total();
            }
            DonHang::create([
                'uid' => $user,
                'tongtien' => $tongtien,
                'trangthai' => 'Đặt hàng thành công',
                'phuongthucthanhtoan' => $request->phuongthuc,
            ]);
            $request->session()->flash('success2');

            if(session('success2')){
                $id_donhang = DonHang::orderBy('id', 'desc')->take(1)->first();
                foreach(Cart::content() as $item){
                    ChiTietDonHang::create([
                        'id_sanpham' => $item->id,
                        'soluong' => $item->qty,
                        'id_donhang' => $id_donhang->id,
                        'giasanpham' => $item->price,
                    ]);
                }
                if($request->phuongthuc == 'pal'){
                    $total = round($tongtien/23064.72);
                    return view('giohang.thanhtoanpaypal', compact('total'));
                }
                else{
                    Cart::destroy();
                    return redirect('guimail');
                }
                
            }
        }
    }
    public function thanhtoanpaypal(){

    }
}
