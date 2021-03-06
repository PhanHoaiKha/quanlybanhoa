@extends('layouts.index')
@section('content')
<link href="{{ asset('css/styles.css') }}" rel="stylesheet" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/js/all.min.js" crossorigin="anonymous"></script>
<div id="layoutAuthentication">
    <div id="layoutAuthentication_content">
        <main>
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-5">
                        <div class="card shadow-lg border-0 rounded-lg mt-5">
                            <div class="card-header"><h3 class="text-center font-weight-light my-4">Đăng nhập</h3></div>
                            <div class="card-body">
                                <form action="dangnhap" method="post">
                                    @csrf
                                    @if (count($errors)>0)
                                        <div class="alert alert-danger">
                                            @foreach ($errors->all() as $err)
                                                {{ $err }}<br>
                                            @endforeach
                                        </div>
                                    @endif
                                    <div class="form-group">
                                        <label class="small mb-1" for="inputEmailAddress">Tài khoản</label>
                                        <input class="form-control py-4" id="inputEmailAddress" type="email" placeholder="Nhập Email" name="email"/>
                                    </div>
                                    <div class="form-group">
                                        <label class="small mb-1" for="inputPassword">Mật khẩu</label>
                                        <input class="form-control py-4" id="inputPassword" type="password" placeholder="Nhập mật khẩu" name="password"/>
                                    </div>
                                    <div class="form-group">
                                        <div class="custom-control custom-checkbox">
                                            <input class="custom-control-input" id="rememberPasswordCheck" type="checkbox" />
                                            <label class="custom-control-label" for="rememberPasswordCheck">Lưu mật khẩu</label>
                                        </div>
                                    </div>
                                    <div class="form-group d-flex align-items-center justify-content-between mt-4 mb-0">
                                        <a class="small" href="password.html">Quên mật khẩu?</a>
                                        <button class="btn btn-primary">Đăng nhập</button>
                                    </div>
                                </form>
                            </div>  
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="{{ asset('js/scripts.js') }}"></script>
@endsection
