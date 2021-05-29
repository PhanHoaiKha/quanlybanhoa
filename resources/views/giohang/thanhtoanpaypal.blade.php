<form action="https://www.sandbox.paypal.com/cgi-bin/webscr" method="post" name="submit">
    @csrf
    <input type="hidden" name="business" value="sb-owygw6055580@business.example.com">

    <!-- tham số cmd có giá trị _xclick chỉ rõ cho paypal biết là người dùng nhất nút thanh toán -->
    <input type="hidden" name="cmd" value="_xclick">

    <!-- thông tin mua hàng -->
    <input type="hidden" name="item_name" value="HoaDonMuaHang">

    <input type="hidden" name="amount" value="{{ $total }}">

    <!-- loại tiền -->
    <input type="hidden" name="currency_code" value="USD">

    <input type="hidden" name="return" value="http://localhost:8080/phanhoaikha/guimail">

    <input type="hidden" name="cancel_return" value="http://localhost:8080/phanhoaikha/thanhtoanloi">

    <script language="JavaScript">document.submit.submit();</script>
</form>