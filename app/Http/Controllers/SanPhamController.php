<?php

namespace App\Http\Controllers;

use App\Models\LoaiSanPham;
use App\Models\SanPham;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redis;

class SanPhamController extends Controller
{
    //
    public function them(){
        $loai = LoaiSanPham::all();
        return view('admin.sanpham.them', compact('loai'));
    }
    public function dulieuthem(Request $request){
        if($request->hasFile('hinh')){
            $file = $request->hinh;
            $name = $file->getClientOriginalName('hinh');
            $file->move('public/images', $name);
        }
        SanPham::create([
            'masanpham'=> $request->masanpham,
            'ten' => $request->ten,
            'quycach' => $request->quycach,
            'gia' => $request->gia,
            'soluong' => $request->soluong,
            'id_loai' => $request->loai,
            'mota' => $request->mota,
            'hinhanh' => $name
        ]);
        return redirect('admin/sanpham/danhsach');
    }
    public function danhsach(){
        $sanpham = SanPham::all();
        $loai = LoaiSanPham::all();
        return view('admin.sanpham.danhsach', compact('sanpham', 'loai'));
    }
    public function sua($id){
        $sanpham = SanPham::find($id);
        $loai = LoaiSanPham::all();
        return view('admin.sanpham.sua', compact('sanpham', 'loai'));
    }
    public function dulieusua(Request $request, $id){
        $file = $request->hinh;
        if(isset($file)){
            $name = $file->getClientOriginalName('hinh');
            $file->move('public/images', $name);
        }
        else{
            $name = $request->hinhcu;
        }
        echo $name;
        SanPham::find($id)->update([
            'masanpham'=> $request->masanpham,
            'ten' => $request->ten,
            'quycach' => $request->quycach,
            'gia' => $request->gia,
            'soluong' => $request->soluong,
            'id_loai' => $request->loai,
            'mota' => $request->mota,
            'hinhanh' => $name
        ]);
        return redirect('admin/sanpham/danhsach');
    }
    public function xoa($id){
        SanPham::destroy($id);
        return redirect('admin/sanpham/danhsach');
    }
}
