@extends('admin.layouts.index')

@section('content')
<div class="card mb-4">
  <div class="card-header">
      <i class="fas fa-table mr-1"></i>
      Dữ liệu sản phẩm
  </div>
  <div class="card-body">
    <a href="them"><i class="fas fa-plus-circle float-right mb-2 fa-lg"></i></a>
      <div class="table-responsive">
        <table class="table table-border" width="100%">
          <thead class="thead-dark text-center">
            <tr>
              <th width="10%">Mã sản phẩm</th>
              <th width="10%">Hình</th>
              <th width="15%">Tên</th>
              <th width="5%">Giá</th>
              <th width="10%">Số lượng</th>
              <th width="10%">Quy cách</th>
              <th width="10%">Loại</th>
              <th width="20%">Mô tả</th>
              <th width="5%">Sửa</th>
              <th width="5%">Xoá</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($sanpham as $sp)
            <tr>
              <td class="text-center" width="5%">{{ $sp->masanpham }}</td>
              <td><img src={{ asset('../public/images/'.$sp->hinhanh) }} alt="Sản phẩm {{ $sp->hinhanh }}" height="100" width="100"> </td>
              <td>{{ $sp->ten }}</td>
              <td>{{ $sp->gia }}</td>
              <td class="text-center">{{ $sp->soluong }}</td>
              <td class="text-center">{{ $sp->quycach }}</td>
              @foreach ($loai as $l)
                @if ($sp->id_loai == $l->id)
                <td class="text-center">{{ $l->tenloai }}</td>
                @endif    
              @endforeach
              <td>{{ $sp->mota }}</td>
              <td class="text-center"><a href="sua/{{ $sp->id }}"><i class="fas fa-edit fa-lg"></i></a></td>
              <td class="text-center"><a href="xoa/{{ $sp->id }}"><i class="fas fa-trash-alt fa-lg"></i></a></td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>
  </div>
</div>
@endsection