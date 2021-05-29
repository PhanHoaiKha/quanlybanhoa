@extends('admin.layouts.index')

@section('content')
<div class="card mb-4">
  <div class="card-header">
      <i class="fas fa-table mr-1"></i>
      Dữ liệu mã giảm giá
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
                    <th width="30%">Mã giảm giá</th>
                    <th width="40%">Số lượng</th>
                    <th class="text-center" width="15%">Sửa</th>
                    <th class="text-center" width="15%">Xoá</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($magiamgia as $mgg)
                <tr>
                    <td>{{ $mgg->magiamgia }}</td>
                    <td>{{ $mgg->soluong }}</td>
                    <td class="text-center"><a href="#"><i class="fas fa-edit fa-lg"></i></a></td>
                    <td class="text-center"><a href="xoa/{{ $mgg->id }}"><i class="fas fa-trash-alt fa-lg"></i></a></td>
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