@extends('layouts.index')
@include('layouts.header')
@section('content')
<div class="container">

    <ol class="breadcrumb mt-4">
      <li class="breadcrumb-item">
        <a href="index">Trang chủ</a>
      </li>
      <li class="breadcrumb-item active">Sản phẩm</li>
    </ol>

    <!-- Content Row -->
    <div class="row">
      <!-- Sidebar Column -->
      <div class="col-lg-3 mb-4">
      <div class="card">
      <div class="card-header">
        Danh mục
      </div>
        <ul class="list-group list-group-flush">
          <a href="index" class="list-group-item">Trang chủ</a>
          <a href="index" class="list-group-item">Sản phẩm</a>
          <a href="#" class="list-group-item">Phụ Kiện</a>
        </ul>
      </div>
      </div>
      <!-- Content Column -->
      <div class="col-lg-9 mb-4">
            <div class="row">
                @foreach ($sanpham as $sp)
                <div class="col-sm-6 col-md-4">
                    <div class="card mb-4" style="width: 16rem;">
                        <div class="p-2">
                          <a href="chitietsanpham/{{ $sp->id }}">
                              <img src="{{ asset('../public/images/'.$sp->hinhanh) }}" class="card-img-top" height="300" alt="Hình {{ $sp->hinhanh }}">
                          </a>
                        </div>
                        <div class="card-body d-flex flex-column">
                            <h5 class="card-title" style="height: 4rem">{{ $sp->ten }}</h5>
                            <p class="card-text"><?php echo number_format($sp->gia,'0','','.') ?> ₫ </p>
                            <a href="{{ url('giohang/them/'.$sp->id) }}" class="btn btn-primary">Thêm vào giỏ hàng</a>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            {{ $sanpham->onEachSide(1)->links('vendor.pagination.bootstrap-4') }}
      </div>
    </div>
    <!-- /.row -->

  </div>
@endsection