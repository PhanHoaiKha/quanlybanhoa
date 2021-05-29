@extends('layouts.index')
@section('content')
<div class="container">
  <h4 class="text-center text-primary mt-4">Đơn hàng của tôi</h4>
  @if (session('thanhcong'))
    <div class="alert alert-success" role="alert">
        {{ session('thanhcong') }}
    </div>
  @endif
    <table class="table mt-4 mb-5">
        <thead>
          <tr>
            <th scope="col">Stt</th>
            <th scope="col">Ngày</th>
            <th scope="col">Trạng thái</th>
            <th scope="col">Phương thức thanh toán</th>
            <th scope="col">Tổng tiền</th>
            <th scope="col">Thao tác</th>
          </tr>
        </thead>
        <tbody>
          @php
            $i = 0;
          @endphp
          @foreach ($donhang as $item)
          @php
            $i++;
          @endphp
          <tr>
            <th scope="row">{{ $i }}</th>
            <td>{{ $item->created_at }}</td>
            <td>{{ $item->trangthai }}</td>
            <td>{{ $item->phuongthucthanhtoan }}</td>
            <td>{{ number_format($item->tongtien,'0','','.') }} đ</td>
            <td><a href="chitietdonhang/{{ $item->id }}">Xem chi tiết</a> | <a href="">Xoá</a></td>
          </tr>
          @endforeach  
        </tbody>
      </table>
      {{ $donhang->onEachSide(1)->links('vendor.pagination.bootstrap-4') }}
</div>
@endsection