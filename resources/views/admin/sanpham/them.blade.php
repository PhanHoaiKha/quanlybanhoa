<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    @extends('admin.layouts.index')
    @section('content') 
    <div class="row mt-2">
        <div class="col-3"></div>
        
        <div class="col-6">
            <div class="card mb-4">
                <div class="card-header text-center font-weight-bold">
                    Thêm sản phẩm
               </div>
               <div class="card-body">
                <form action="them  " method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label>Mã sản phẩm</label>
                        <input type="text" class="form-control" name="masanpham">
                    </div>
                    <div class="form-group">
                        <label>Tên</label>
                        <input type="text" class="form-control" name="ten">
                    </div>
                    <div class="form-group">
                        <label>Quy cách</label>
                        <select class="form-control" name="quycach">
                            <option selected>Chọn</option>
                            <option value="Bình">Bình</option>
                            <option value="Lọ">Lọ</option>
                            <option value="Bó">Bó</option>
                            <option value="Khác">Khác</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Giá</label>
                        <input type="text" class="form-control" name="gia">
                    </div>
                    <div class="form-group">
                        <label>Số lượng</label>
                        <input type="number" class="form-control" name="soluong">
                    </div>
                    <div class="form-group">
                        <label>Loại</label>
                        <select class="form-control" name="loai">
                            @foreach ($loai as $l)
                            <option value="{{ $l->id }}">{{ $l->tenloai }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Mô tả</label>
                        <textarea class="form-control" rows="3" name="mota"></textarea>
                    </div>
                    <div class="form-group">
                        <label>Hình ảnh</label>
                        <input class="form-control" type="file" name="hinh">
                    </div>
                    <button type="submit" class="btn btn-primary">Thêm</button>
                  </form>
               </div>
            </div>
        </div>
        <div class="col-3"></div>
    </div>
    @endsection
</body>
</html>