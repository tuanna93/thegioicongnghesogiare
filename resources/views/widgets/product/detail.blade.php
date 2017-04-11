<div class="product-home chi-tiet-page">
<div class="wrapper clearfix">
    <!-- main info ( image and info )-->
    <div class="maininfo clearfix">
        <div class="blockcol1">
            <div class="main-img"> <img src="{{ $detail->image }}"> </div>
            <div class="tiny-img">
                <div class="tiny-img-wrapper clearfix">
                    <ul>
                        <li class="citem active"><img src="{{ $detail->image }}" alt="{{ $detail->name }}">
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="blockcol2">
            <h1>{{ $detail->name }}</h1>
            <div class="price">
                <p> {{ $detail->price_new }} VND
                    @if($detail->price_old)<br/><strike>{{ $detail->price_old }} VND</strike> @endif </p>
            </div>

            <div class="thongtinsanpham clearfix">
                <p class="desc-title"><span><strong>Mã sản phẩm: </strong>{{ $detail->code }}</span>
                </p>
                <p class="desc-title"><span><strong>Mô tả sản phẩm</strong></span>
                </p>
                <div class="desc-info">
                    <!-- descrition box html content -->
                    <p>{!! $detail->intro !!}</p>
                    <!-- descrition box html content -->
                </div>
                <!--
					<p class="desc-title"><span><strong>Mô tả sản phẩm</strong></span></p>
					<div class="desc-fulltext textcontent"> </div>
					-->
            </div>
            <!--
				<div class="diachimuahang clearfix">
					<h3>Quà tặng</h3>
					<div class="single_quatang"> </div>
				</div>
				-->
            <div class="quickcart-area clearfix">
                <button class="themvaogiohang-btn quick-buy" onclick="window.location.href='/dat-mua.html/{{ $detail->id }}'">Thêm vào giỏ hàng</button>
                <!--
					<button class="themvaogiohang-btn quick-buy" data-id="493">Thêm vào giỏ hàng</button>
					<button class="dathang-btn" data-id="493">Đặt hàng</button>
					-->
            </div>
        </div>
    </div>
    <!-- content and other -->
    <div class="contentinfo clearfix">
        <div class="main-b1 clearfix">
            <div class="item-tab active" contentid="1">CHI TIẾT SẢN PHẨM</div>
        </div>
        <div class="main-b2">
            <div class="main-content" contentid="1">
                <article class="textcontent clearfix">
                    <strong>{{ $detail->name }}</strong>
                    {!! $detail->content !!}
                    <div style="clear:both;">&nbsp;</div>
                    <div class="clear"></div>
                </article>
            </div>
        </div>
    </div>
    <script>
        window.onload = function() {
            $($('.tiny-img .citem')[0]).addClass('active');
            $('.citem').click(function() {
                var thisimg = $(this).find('img').attr('src');
                $('.citem.active').removeClass('active');
                $(this).addClass('active');
                $(".main-img img").stop().fadeOut(100, function() {
                    this.src = thisimg;
                    this.onload = function() {
                        $(this).fadeIn(200);
                    };
                });
            });
            $('.item-tab').click(function() {
                $('.item-tab.active').removeClass('active');
                $(this).addClass('active');
                var thiscontentid = $(this).attr('contentid');
                $('.main-content').hide();
                $('.main-content[contentid=' + thiscontentid + ']').show();
            });
        };
    </script>
    <div class="title-block">
        <h3>Sản phẩm liên quan</h3> </div>
    <div class="wrapper-pro clearfix">
@foreach($product as $pro)
@if($pro->id != $detail->id)
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
            @endif
            @endforeach
    </div>
</div>
</div>