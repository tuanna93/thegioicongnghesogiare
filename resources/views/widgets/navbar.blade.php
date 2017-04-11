<div class="navbar">
    <div class="wrapper clearfix">
        <div class="menunav">
            <div class="danhmucsp-header"> <i class="toggle-header"></i> <span>DANH MỤC SẢN PHẨM</span> <i class="play-icon"></i>
                <div class="menudanhmuc">
                    <div class="slidemenu">
                        <ul class="menuleft">
                           @foreach(\App\Helpers\Helpers::get_cate_sub(0) as $cate1)
                                <li><a href="/chuyen-muc/{{ $cate1->slug }}.html">{{ $cate1->name }}</a>
                                @if(\App\Helpers\Helpers::get_cate_sub($cate1->id))
                                    <ul class="sub-menu">
                                        @foreach(\App\Helpers\Helpers::get_cate_sub($cate1->id) as $cate2)
                                        <li>
                                            <a href="/chuyen-muc/{{ $cate2->slug }}.html" rel="category tag">
                                                <div><img src="{{ $cate2->icon }}">
                                                </div><span>{{ $cate2->name }}</span>
                                            </a>
                                        </li>
                                        @endforeach
                                    </ul>
                                @endif
                                </li>
                            @endforeach
                            </ul>
                        <script type="text/javascript">
                            $(document).ready(function() {
                                $('.slidemenu ul ul > li > a').click(function() {
                                    var parent_li = $(this).parent();
                                    if ($(parent_li).find('.sub-menu').length > 0) {
                                        $($(parent_li).find('.sub-menu')[0]).toggle();
                                        return false;
                                    } else {
                                        window.location.href = this.attr('href');
                                    }
                                })
                                $('.slidemenu ul ul ul').hover(function() {
                                    //console.log('over');
                                }, function() {
                                    $(this).hide();
                                });
                            })
                        </script>
                    </div>
                </div>
            </div>
            <?php
                $cate_search = \App\Category::get();
             ?>
            <div class="searchbar">
                <form method="get" action="/search.html">
                    <select class="cat_search" name="id">
                        <option value="">Tất cả</option>
                        {!! \App\Helpers\Helpers::cate_parent($cate_search,0,'--',(isset($id_search) ? $id_search : 0)) !!}
                    </select>
                    <input name="key" type="text" class="input_search" autocomplete="off" placeholder="Nhập từ khóa hoặc mã hàng" value="{{ isset($key_search) ? $key_search : '' }}">
                    <input type="submit" class="submit_search" value="Tìm kiếm"> </form>
                <div class="auto_suggest"></div>
            </div>
            <div class="cart-homearea">
                <a href="/dat-mua.html">
                    <div class="total_item"><i class="cart-icontop"></i> <span class="cart-label-arrow">&nbsp;</span><span class="cart-label cart_count">{{ \App\Helpers\Helpers::get_cart_count() }}</span>
                    </div>
                    <div class="total_price"><span class="tongdonhang">{{ \App\Helpers\Helpers::get_cart_total() }}</span> VND</div>
                </a>
            </div>
        </div>
    </div>
</div>