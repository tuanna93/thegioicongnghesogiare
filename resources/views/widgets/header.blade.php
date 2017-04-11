<header>
    <div class="topbar">
        <div class="wrapper clearfix">
            <div>
                <ul class="menu-head">
                @foreach(\App\Helpers\Helpers::get_menu(0) as $menu1)
                    <li style="background:url('{{ $menu1->icon }}') no-repeat center left; background-position: 0px 7px;"><a href="{{ $menu1->slug }}">{{ $menu1->name }}</a>
                    @if(\App\Helpers\Helpers::get_menu($menu1->id))
                        <ul class="sub-menu">
                          @foreach(\App\Helpers\Helpers::get_menu($menu1->id) as $menu2)
                            <li class="menu-item"><a href="{{ $menu2->slug }}">{{ $menu2->name }}</a>
                            </li>
                            @endforeach
                        </ul>
                    @endif
                    </li>
                @endforeach
                </ul>
            </div>
            {{--<div class="ajax_user_bar">--}}
                {{--<ul class="quick-head">--}}
                    {{--<li>--}}
                        {{--<p><a href="/login.html">Đăng nhập</a>--}}
                        {{--</p>--}}
                    {{--</li>--}}
                    {{--<li>--}}
                        {{--<p><a href="/dang-ky.html">Đăng ký</a>--}}
                        {{--</p>--}}
                    {{--</li>--}}
                {{--</ul>--}}
            {{--</div>--}}
        </div>
    </div>
    <div class="wrapper toplogo clearfix">
        <div class="logoarea">
            <a href="/"> <img src="{{ \App\Helpers\Helpers::page_get_option('logo') }}"> </a>
        </div>

        <div class="hottline-b">
            <p>
                <a href="tel:{{ \App\Helpers\Helpers::page_get_option('phone') }}"> <span>{{ \App\Helpers\Helpers::page_get_option('phone') }}</span> <b>Di động</b> </a>
            </p>
            <p>
                <a href="tel:{{ \App\Helpers\Helpers::page_get_option('hotline') }}"> <span>{{ \App\Helpers\Helpers::page_get_option('hotline') }}</span> <b>Hotline</b> </a>
            </p>
        </div>
    </div>
</header>