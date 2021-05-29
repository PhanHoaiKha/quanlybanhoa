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
                    Thêm mã giảm giá
               </div>
               <div class="card-body">
                <form action="them" method="post">
                    @csrf
                    <div class="form-group">
                        <label for="formGroupExampleInput">Mã giảm giá</label>
                        <input type="text" class="form-control" id="formGroupExampleInput" name="magiamgia">
                    </div>
                    <div class="form-group">
                        <label for="formGroupExampleInput">Số lượng</label>
                        <input type="number" class="form-control" id="formGroupExampleInput" name="soluong">
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