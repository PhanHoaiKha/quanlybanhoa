@extends('layouts.index')
@section('content')
<div class="container">
  <h4 class="text-center text-primary mt-4">Chi tiết đơn hàng</h4>
    <table class="table mt-4 mb-5">
        <thead>
          <tr>
            <th scope="col">Stt</th>
            <th scope="col">Hình ảnh</th>
            <th scope="col">Tên</th>
            <th scope="col">Số lượng</th>
            <th scope="col">Giá</th>
            <th scope="col">Ngày tạo</th>
          </tr>
        </thead>
        <tbody>
          @php
            $i = 0;
          @endphp
          @foreach ($chitietdonhang as $item)
          @php
            $i++;
          @endphp
          <tr>
              <td scope="row">{{ $i }}</td>
              @foreach ($sanpham as $sp)
              @if ($item->id_sanpham == $sp->id)
                <td><img src="{{ asset('../public/images/'.$sp->hinhanh) }}" height="200" width="200" alt="{{ $sp->hinhanh }}"></td>
                <td>{{ $sp->ten }}</td>
                <td>{{ $item->soluong }}</td>
                <td>{{ number_format($item->giasanpham,'0','','.') }} đ</td>
                <td>{{ $item->created_at }}</td>
            @endif
            @endforeach
          </tr>
          @endforeach  
        </tbody>
      </table>
</div>
@endsection