@extends('layouts.index')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-1"></div>
        <div class="col-10 m-3">
            <h3 class="text-primary text-center">Tiến thành đặt hàng</h3>
            <form action="thanhtoan" method="POST">
                @csrf
            <div class="row">
                <div class="col-6">
                <div class="form-group">
                    <label>Họ tên</label>
                    <input type="text" class="form-control" name="hoten">
                    <span class="text-danger">{{ $errors->first('hoten') }}</span>
                </div>
                <div class="form-group">
                    <label>Số điện thoại</label>
                    <input type="text" class="form-control" name="sdt">
                    <span class="text-danger">{{ $errors->first('sdt') }}</span>
                </div>
                <input type="hidden" name="email" value="{{ Auth::user()->email }}">
                
                <div class="row">
                    <div class="col-6">
                        <div class="form-group">
                            <label>Tỉnh</label>
                            <select class="form-control" name="tinh">
                                @foreach ($tinh as $t)
                                <option value="{{ $t->id }}">{{ $t->tentinh }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label>Huyện/TP</label>
                            <select class="form-control" name="huyen">
                                @foreach ($huyen as $h)
                                    <option value="{{ $h->id }}">{{ $h->tenhuyen }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
                
                <div class="form-group">
                    <label>Địa chỉ</label>
                    <input type="text" class="form-control" name="diachi">
                    <span class="text-danger">{{ $errors->first('diachi') }}</span>
                </div>
                <div class="form-group">
                    <label>Mã giảm giá</label>
                    <input class="form-control" type="text" name="magiamgia" placeholder="Nhập mã giảm giá nếu có">
                </div>
                </div>
                <div class="col-6">
                    <div class="row">
                        <div class="col-md-offset-1 col-md-10"><h5 class="text-center">Đơn hàng của bạn</h5><br>
                            <table class="table">
                                <tr> <!--tổng giỏ hàng-->
                                    <td width="30%">Số lượng sản phẩm</td>
                                    <td width="30%">{{ Cart::count() }}</td>
                                </tr>
                                <tr>
                                    <td>Phí vận tuyển</td>
                                    <td>Miễn phí vận chuyển</td>
                                </tr>
                                <tr>
                                    <td>Thành tiền</td>
                                    <td>{{ number_format(Cart::total(),'0','','.') }} đ</td>
                                </tr>
                            </table>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-offset-1 col-md-8"> <h5>Phương thức thanh toán</h5><br></div>
                    </div>
                    <div class="row">
                        <div class="col-md-offset-1 col-md-6">
                            <input type="radio" name="phuongthuc" value="cod" checked="checked"> <!--Thanh toán khi giao hàng -->
                            <label>Thanh toán khi nhận hàng</label>
                        </div>
                        <div class="col-md-6">
                            <input type="radio" name="phuongthuc" value="pal">               
                            <!--Thanh toán bằng tài khoản Paypal -->
                            <label>Paypal</label>
                        </div>
                    </div>
                    <div class="float-right">
                        <button type="submit" class="btn btn-primary mr-5 mt-5">Đặt hàng</button>
                    </div>
                </div>
            </div>
                
              </form>
        </div>
        <div class="col-1"></div>
    </div>
</div>
@endsection