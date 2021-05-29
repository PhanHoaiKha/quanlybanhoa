<?php

namespace App\Http\Controllers;

use App\Models\SanPham;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    //
    public function index(){
        $sanpham = SanPham::paginate(6);
        return view('sanpham.sanpham', compact('sanpham'));
    }
    public function chitietsanpham($id){
        $sanpham = SanPham::find($id);
        $id_sp = $sanpham->id;
        $id_loai = $sanpham->id_loai;
        $sanphams = SanPham::where([
            ['id', '!=', $id_sp],
            ['id_loai', '=', $id_loai]
        ])->get();
        return view('sanpham.chitietsanpham', compact('sanpham', 'sanphams'));
    }
}
