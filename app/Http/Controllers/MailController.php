<?php

namespace App\Http\Controllers;

use App\Mail\DatHangThanhCong;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class MailController extends Controller
{
    //
    public function guimail(Request $request){
        if(Auth::check()){
            $user = Auth::user()->email;
            Mail::to($user)->send(new DatHangThanhCong);
            Cart::destroy();
            $request->session()->flash('thanhcong', 'Đặt thành thành công');
            return redirect('donhangcuatoi');
        }
    }
}
