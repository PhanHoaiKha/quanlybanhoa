<!-- Navigation -->
<nav class="navbar fixed-top navbar-expand-lg navbar-dark bg-dark fixed-top">
    <div class="container">
      <a class="navbar-brand" href="{{ url('index') }}">CookooHouse</a>
      <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto">
          <form class="form-inline mt-1">
            <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-primary my-2 my-sm-0" type="submit">Search</button>
          </form>
          <li class="nav-item" id="ex4">
            <a href="{{ url('giohang/danhsach') }}">
              <span class="p1 fa-stack fa-lg" data-count="{{ Cart::count() }}">
                <i class="p3 fa fa-shopping-cart fa-lg fa-stack-1x xfa-inverse" data-count="4b"></i>
              </span>
            </a>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" id="userDropdown" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-user fa-fw"></i>Tài khoản</a>
            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
                @if (Auth::check())
                
                  <a class="dropdown-item" href="#">{{ Auth::user()->name }}</a>
                  <a class="dropdown-item" href="{{ url('donhangcuatoi') }}">Đơn hàng</a>
                  <div class="dropdown-divider"></div>
                  <a class="dropdown-item" href="{{ route('dangxuat') }}">Đăng xuất</a>

                @else
                  <a class="dropdown-item" href="{{ route('dangnhap') }}">Đăng nhập</a>
                  <a class="dropdown-item" href="#">Đăng ký</a>
                @endif
            </div>
          </li>
        </ul>
      </div>
    </div>
  </nav>