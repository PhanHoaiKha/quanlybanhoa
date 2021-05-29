<?php

namespace App\Http\Controllers;

use App\Models\LoaiSanPham;
use Illuminate\Http\Request;

class LoaiSanPhamController extends Controller
{
    //
    public function danhsach(){
        $loai = LoaiSanPham::all();
        return view('admin.loaisanpham.danhsach', ['loai'=>$loai]);
    }

    public function them(){
        return view('admin.loaisanpham.them');
    }
    public function dulieuthem(Request $request){
        LoaiSanPham::create([
            'maloai' => $request->maloai,
            'tenloai' => $request->tenloai
        ]);
        return redirect('admin/loaisanpham/danhsach');
    }
    public function sua($id){
        $loai = LoaiSanPham::find($id);
        return view('admin.loaisanpham.sua', compact('loai'));
    }
    public function dulieusua(Request $request, $id){
        LoaiSanPham::find($id)->update([
            'tenloai' => $request->tenloai
        ]);
        return redirect('admin/loaisanpham/danhsach');
    }
    public function xoa($id){
        LoaiSanPham::destroy($id);
        return redirect('admin/loaisanpham/danhsach');
    }
}
