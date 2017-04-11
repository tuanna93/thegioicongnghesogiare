<div class="category_title">
    <div class="wrapper clearfix">
        <h1>Sản phẩm</h1> </div>
</div>
<div class="product-home danh-muc-page">
    <div class="wrapper clearfix">
        <div class="wrapper-pro clearfix">
             @foreach($product as $pro)
                <div class="pro-item">
                    @if($pro->getPercent())<div class="per-sale">{{ $pro->getPercent() }}</div>@endif
                    <div class="pro-img">
                        <a href="/san-pham/{{ $pro->slug }}.html"> <img src="{{ $pro->image }}"> </a>
                    </div>
                    <div class="light-bottom"></div>
                    <h2><a href="/san-pham/{{ $pro->slug }}.html" title="{{ $pro->name }}" rel="bookmark">{{ $pro->name }}</a></h2>
                    <p class="pro-price"> {{ $pro->price_new }} VND @if($pro->price_old)<strike>{{ $pro->price_old }} VND</strike> @endif</p>
                    <div class="act-pro">
                        <a> <i class="iconcart"></i> <span></span> </a><a href="/dat-mua.html/{{ $pro->id }}">Thêm vào giỏ hàng</a> </div>
                    <!-- tooltip -->
                    <div class="info-tooltippro tooltip" style="left: 217.5px; top: 190px; display: none;">
                        <div class="headertooltip">
                            <p class="titles">{{ $pro->name }}</p>
                            <p class="prices"> {{ $pro->price_new }} VND @if($pro->price_old)<strike>{{ $pro->price_old }} VND</strike> @endif</p>
                        </div>
                        <div class="bodytooltip">
                            <p>{!! $pro->intro !!}</p>
                        </div>
                        <div class="footertooltip"></div>
                    </div>
                    <!-- tooltip -->
                </div>
            @endforeach
        </div>
        {!! $product->links('block.pagination') !!}
    </div>
</div>