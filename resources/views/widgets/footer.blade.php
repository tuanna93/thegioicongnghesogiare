<footer>
    <div class="footer_top">
        <div class="wrapper clearfix">
            <div class="footer_logo">
                <div class="fb-page" data-href="{{ \App\Helpers\Helpers::page_get_option('link_facebook') }}" data-tabs="timeline" data-width="290" data-height="210" data-small-header="false" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true"><blockquote cite="https://www.facebook.com/Moingay4tuvungtienganh" class="fb-xfbml-parse-ignore"><a href="https://www.facebook.com/Moingay4tuvungtienganh">Mỗi Ngày 4 Từ Vựng Tiếng Anh</a></blockquote></div>
            </div>
            <div class="footer_info">
                <div class="menufooter">
                    <ul class="menu-footer">
                    @foreach(\App\Helpers\Helpers::get_menu_bottom() as $menu)
                        <li><a href="/{{ $menu->slug }}.html">{{ $menu->name }}</a></li>
                    @endforeach
                    </ul>
                </div>
                <div class="clear"></div>
                <div class="menulist-wrap">
                        @foreach(\App\Helpers\Helpers::get_menu_bottom_cate(0) as $menu)
                    <div class="menulist">
                        <h3>{{ $menu->name }}</h3>
                            @if(\App\Helpers\Helpers::get_menu_bottom_cate($menu->id))
                        <ul>
                            @foreach(\App\Helpers\Helpers::get_menu_bottom_cate_post($menu->id) as $menu1)
                                <li class="menu-item"><a href="/chi-tiet/{{ $menu1->slug }}.html">{{ $menu1->name }}</a></li>
                            @endforeach
                        </ul>
                        @endif
                    </div>
                        @endforeach
                </div>
            </div>
        </div>
    </div>
    <div class="footer_map">
        <div class="wrapper clearfix">
            <ul>
                <li>
                    {!! \App\Helpers\Helpers::page_get_option('footer_left') !!}
                </li>
                <li>
                    {!! \App\Helpers\Helpers::page_get_option('footer_right') !!}
                </li>
            </ul>
        </div>
    </div>
</footer>