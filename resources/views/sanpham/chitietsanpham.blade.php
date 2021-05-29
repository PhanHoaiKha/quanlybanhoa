@extends('layouts.index')
@section('content')
<div class="container">

    <ol class="breadcrumb mt-4">
      <li class="breadcrumb-item">
        <a href="index.php">Trang chủ</a>
      </li>
      <li class="breadcrumb-item active">Sản phẩm</li>
      <li class="breadcrumb-item active">Chi tiết</li>
    </ol>

    <!-- Portfolio Item Row -->
    <div class="row">
      <div class="col-md-6">
        <img class="img-fluid" src="{{ asset('../public/images/'.$sanpham->hinhanh) }}" alt="Hình {{ $sanpham->hinhanh }}">
      </div>
      <div class="col-md-6">
        <h3 class="my-3">{{ $sanpham->ten }}</h3>
        <p>{{ $sanpham->mota }}</p>
        <h3 class="my-3 mt-5">{{ number_format($sanpham->gia,'0','','.') }} ₫</h3>
        <form action="{{ url('giohang/chitietthem/'.$sanpham->id) }}" method="post">
          @csrf
          <div class="form-group">
            <input type="hidden" name="id" value="">
            <label class="text-muted">Số lượng</label><br>
            <div class="buttons_added">
              <input class="minus is-form" type="button" value="-">
              <input aria-label="quantity" class="input-qty" max="10" min="1" name="soluong" type="number" value="1">
              <input class="plus is-form" type="button" value="+">
            </div>
          </div>
          <button type="submit" class="btn btn-primary">Thêm vào giỏ hàng</button>
        </form>
      </div>
    </div>
    <!-- /.row -->

    <!-- Related Projects Row -->
    <br>
    <hr>
    <br>
    <h3 class="my-4">Sản phẩm liên quan</h3>

    <!-- 
      $sql_rel="select * from products where id != $id and catid = $catid";
      $res_rel= mysqli_query $connection,$sql_rel;
      while $r_rel=mysqli_fetch_array $res_rel
      
    -->

    <div class="row">
        @foreach ($sanphams as $sp)
        <div class="col-sm-6 col-md-3">
            <div class="card mb-4" style="width: 16rem;">
                <div class="p-2">
                  <a href="chitietsanpham/{{ $sp->id }}">
                      <img src="{{ asset('../public/images/'.$sp->hinhanh) }}" class="card-img-top" height="300" alt="Hình {{ $sp->hinhanh }}">
                  </a>
                </div>
                <div class="card-body d-flex flex-column">
                    <h5 class="card-title" style="height: 4rem">{{ $sp->ten }}</h5>
                    <p class="card-text"><?php echo number_format($sp->gia,'0','','.') ?> ₫ </p>
                    <a href="addtocart.php?id=" class="btn btn-primary">Thêm vào giỏ hàng</a>
                </div>
            </div>
        </div>
        @endforeach
    </div>
  </div>
@endsection