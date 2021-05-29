<?php

namespace App\Http\Controllers;

use App\Models\MaGiamGia;
use Illuminate\Http\Request;

class MaGiamGiaController extends Controller
{
    //
    public function danhsach(){
        $magiamgia = MaGiamGia::all();
        return view('admin.magiamgia.danhsach', compact('magiamgia'));
    }
    public function them(){
        return view('admin.magiamgia.them');
    }
    public function dulieuthem(Request $request){
        MaGiamGia::create([
            'magiamgia' => $request->magiamgia,
            'soluong' => $request->soluong
        ]);
        return redirect('admin/magiamgia/danhsach');
    }
    public function xoa($id){
        MaGiamGia::destroy($id);
        return redirect('admin/magiamgia/danhsach');
    }
}
