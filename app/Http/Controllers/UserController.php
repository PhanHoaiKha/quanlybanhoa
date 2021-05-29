<?php

namespace App\Http\Controllers;

use App\Models\ChiTietDonHang;
use App\Models\DonHang;
use App\Models\SanPham;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use PhpParser\Node\Expr\FuncCall;

class UserController extends Controller
{
    //
    public function getDangNhapAdmin(){
        return view('dangnhap');
    }
    public function postDangNhapAdmin(Request $request){
        $email = $request->email;
        $password = $request->password;
        if(Auth::attempt(['email' => $email, 'password' => $password])){
            return redirect('index');
        }else{
            return redirect('dangnhap')->with('thongbao', 'Đăng nhập không thành công');
        }
    }
    public function getDangXuat(){
        Auth::logout();
        return redirect('index');
    }
    public function donhangcuatoi(){
        $uid = Auth::user()->id;
        $donhang = DonHang::where('uid', '=', $uid)->orderBy('created_at', 'desc')->paginate(5);
        return view('users.donhangcuatoi', compact('donhang'));
    }
    public function chitietdonhang($id){
        $chitietdonhang = ChiTietDonHang::where('id_donhang', '=', $id)->get();
        $sanpham = SanPham::all();
        return view('users.chitietdonhang', compact('chitietdonhang', 'sanpham'));
    }
}
