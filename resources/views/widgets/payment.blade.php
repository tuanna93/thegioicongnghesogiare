<div class="product-home chi-tiet-page">
    <div class="wrapper clearfix" style="margin-bottom:20px">
    @include('block.error')
        <form action="" method="post" class="payment-form">
        {!! csrf_field() !!}
            <div class="payment_col1">
                <div class="payment_box">
                    <div class="payment_title"> <span>Thông tin khách hàng</span> </div>
                    <div class="payment_content">
                        <div class="payment_line">
                            <label>Họ tên Quý khách *</label>
                            <input type="text" name="txthoten" value="" placeholder="Họ tên" id="txthoten" required=""> </div>
                        <div class="payment_line">
                            <label>Địa chỉ Email *</label>
                            <input type="text" name="txtemail" value="" placeholder="Email" id="txtemail"> </div>
                        <div class="payment_line">
                            <label>Số điện thoại *</label>
                            <input type="text" name="txtdienthoai" value="" placeholder="Số điện thoại" id="txtdienthoai" required=""> </div>
                        <div class="payment_line">
                            <label>Địa chỉ (số nhà, đường, tỉnh thành) *</label>
                            <input type="text" name="txtdiachi" value="" placeholder="Địa chỉ" id="txtdiachi" required=""> </div>
                    </div>
                </div>
                </div>
            <div class="payment_col2">
                <table class="tablecart">
                    <tbody>
                        <tr>
                            <td>Ảnh</td>
                            <td>Tên sản phẩm</td>
                            <td>Đơn giá</td>
                            <td>Tổng</td>
                        </tr>
                        @foreach($cart as $c)
                        <tr>
                            <td><img src="{{ $c->options->image }}" alt="{{ $c->name }}" height="50">
                            </td>
                            <td><a href="/san-pham/{{ $c->options->slug }}.html">{{ $c->name }}</a>
                            </td>
                            <td>{{ number_format($c->price,0,",",".") }} x {{ $c->qty }}</td>
                            <td><b>{{ number_format($c->qty*$c->price,0,",",'.') }} VND</b>
                            </td>
                        </tr>
                        @endforeach
                        <tr>
                            <td colspan="4">
                                <p class="cart_tongdonhang">Tổng giá trị đơn hàng : <span class="tongdonhang">{{ $total }}</span> VND
                                </p>
                            </td>
                        </tr>
                    </tbody>
                </table>
                <div class="submit_order_bar"> <a class="paymentbtn backtocart" href="/dat-mua.html">Quay lại giỏ hàng</a>
                    <input type="submit" name="btnup" class="submitorder" value="Gửi đơn hàng"> </div>
            </div>
        </form>
    </div>
</div>