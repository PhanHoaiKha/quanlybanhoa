@extends('admin.layouts.index')

@section('content')
<div class="card mb-4">
  <div class="card-header">
      <i class="fas fa-table mr-1"></i>
      Dữ liệu sản phẩm
  </div>
  <div class="row">
      <div class="col-3"></div>
      <div class="col-6">
        <div class="card-body">
            <a href="them"><i class="fas fa-plus-circle float-right mb-2 fa-lg"></i></a>
            <div class="table-responsive">
            <table class="table table-border" width="100%">
                <thead class="thead-dark">
                <tr>
                    <th width="30%">Mã loại sản phẩm</th>
                    <th width="40%">Tên loại</th>
                    <th class="text-center" width="15%">Sửa</th>
                    <th class="text-center" width="15%">Xoá</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($loai as $l)
                <tr>
                    <td>{{ $l->maloai }}</td>
                    <td>{{ $l->tenloai }}</td>
                    <td class="text-center"><a href="sua/{{ $l->id }}"><i class="fas fa-edit fa-lg"></i></a></td>
                    <td class="text-center"><a href="xoa/{{ $l->id }}"><i class="fas fa-trash-alt fa-lg"></i></a></td>
                </tr>
                @endforeach
                </tbody>
            </table>
            </div>
        </div>
      </div>
      <div class="col-3"></div>
  </div>
</div>
@endsection