<div class="product-home">
    <div class="wrapper clearfix">
        <div class="title-block">
            <h3 class="saleb-icon">Siêu khuyến mại</h3> </div>
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
        @foreach($cate as $cate)
        <div class="title-block">
            <h3 class="hotb-icon">{{ $cate->name }}</h3>
            @if(\App\Helpers\Helpers::get_cate_sub($cate->id))
            <ul>
                @foreach(\App\Helpers\Helpers::get_cate_sub($cate->id) as $pro)
                    <li>
                        <a href="/san-pham/{{ $pro->slug }}.html">{{ $pro->name }}</a>
                    </li>
                @endforeach
            </ul>
            @endif
        </div>
        <div class="wrapper-pro clearfix">
            @foreach(\App\Helpers\Helpers::get_product_cate($cate->id) as $pro)
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
        @endforeach
    </div>
</div>