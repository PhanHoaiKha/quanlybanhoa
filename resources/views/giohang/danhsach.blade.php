@extends('layouts.index')
@section('content')
<div class="container">

    <ol class="breadcrumb mt-4">
      <li class="breadcrumb-item">
        <a href="{{ url('index') }}">Trang chủ</a>
      </li>
      <li class="breadcrumb-item active">Giỏ hàng</li>
    </ol>
    @if (Cart::count()>0)
    <table class="table mt-4 text-center">
        <thead>
          <tr>
            <th style="width: 5%;">Stt</th>
            <th style="width: 12%;">Hình ảnh</th>
            <th style="width: 20%;">Tên sản phẩm</th>
            <th style="width: 10%;">Giá</th>
            <th style="width: 10%;">Số lượng</th>
            <th style="width: 15%;">Tổng tiền</th>
            <th style="width: 12%;">Thao tác</th>
          </tr>
        </thead>
        <tbody>
          @php
              $i = 0;
          @endphp
          <form action="capnhat" method="post">
              @csrf
              @foreach (Cart::content() as $item)
              @php
                  $i++;
              @endphp
              <tr>
                  <td>{{ $i }}</td>
              <td><img src="{{ asset('../public/images/'.$item->options->hinhanh) }}" height="150" width="150" alt="Hình {{ $item->hinhanh }}"></td>
              <td class="text-left">{{ $item->name }}</td>
              <td>{{ number_format($item->price,'0','','.') }} ₫</td>
              <td>
                  <input max="20" min="1" name="soluong[{{ $item->rowId }}]" type="number" value="{{ $item->qty }}">
              </td>
              <td>{{ number_format($item->total,'0','','.') }} ₫</td>
              <td><a href="xoa/{{ $item->rowId }}">Xoá</a>
              
              </tr>
              @endforeach
              <tr>
                <td colspan="7"><a href="xoatatca"><i><u> Xoá tất cả sản phẩm</u></i></a></td>
              </tr>   
              <tr>
                  <th colspan="4" class="text-left">Thành tiền</th>
                  <td><button type="submit" class="btn btn-primary">Cập nhật</button></td>
                  <th>{{ number_format(Cart::total(),'0','','.') }} ₫</th>
                  <th>
                      <a href="thanhtoan" class="btn btn-primary">Thanh toán</a>
                  </th>
              </tr>
          </form>
        </tbody>
      </table>
    @else
        <h3>Hiện giỏ hàng đang trống</h3>
    @endif
</div>
@endsection