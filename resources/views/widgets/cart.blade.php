<div class="product-home chi-tiet-page">
    <div class="wrapper clearfix">
    @include('block.message')
        @if($cart->count())
        <form action="/dat-mua.html" method="post">
        {!! csrf_field() !!}
            <table class="tablecart">
                <tbody>
                    <tr>
                        <td>STT</td>
                        <td>Ảnh</td>
                        <td>Tên sản phẩm</td>
                        <td>Đơn giá</td>
                        <td>Số lượng</td>
                        <td>Tổng</td>
                        <td>Xóa</td>
                    </tr>
                    @foreach($cart as $c)
                                <tr class="cart_line">
                                    <td>1</td>
                                    <td><img src="{{ $c->options->image }}" alt="{{ $c->name }}" height="100">
                                    </td>
                                    <td>
                                        <p class="cart_ten"><a href="/san-pham/{{ $c->options->slug }}.html">{{ $c->name }}</a>
                                        </p>
                                        <p>{!! $c->options->intro !!}</p>
                                    </td>
                                    <td>{{ $c->price }}</td>
                                    <td>
                                        <input class="input_number_cart" type="number" value="{{ $c->qty }}" name="qty" rowId="{{ $c->rowId }}">
                                    </td>
                                    <td><b><span class="cart_tong">{{ number_format($c->qty*$c->price,0,",",'.') }}</span> VND</b>
                                    </td>
                                    <td><span class="cart_remove"><a href="/huy-hang/{{ $c->rowId }}" title="Xóa khỏi giỏ hàng"><img src="/images/images_icon/icon_trash.png"></a> </span>
                                    </td>
                                </tr>
                    @endforeach
                    <tr>
                        <td colspan="3">
                            <span class="next_payment"><a class="paymentbtn" href="/thanh-toan.html">Thanh toán</a></span>
                            <span class="next_payment"><input type="submit" class="paymentbtn" name="btnup" value="Cập nhật số lượng" style="cursor:pointer"></span> </td>
                        <td colspan="4">
                            <p class="cart_tongdonhang">Tổng giá trị đơn hàng : <span class="tongdonhang">{{ $total }}</span> VND</p>
                        </td>
                    </tr>
                </tbody>
            </table>
                    </form>
        @else
            <p style="margin:20px 0;">Không có sản phẩm nào trong giỏ hàng của bạn!</p>
        @endif
    </div>
</div>