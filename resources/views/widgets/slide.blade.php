<div class="slidemenu-wrapper">
    <div class="wrapper clearfix">
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
            <div class="block-slide">
                <div class="boxslide">
                    <!-- Slideshow -->
                    <div class="nivoSlider">
                    @foreach($slide as $slide)
                        <div>
                            <a href="{{ $slide->slug }}" tabindex="-1">
                                <img src="{{ $slide->image }}" alt="{{ $slide->name }}"  width="{{ $slide->width }}" height="{{ $slide->height }}">
                            </a>
                        </div>
                    @endforeach
                    </div>
                    <script type="text/javascript">
                        $(document).ready(function(e) {
                            $('.nivoSlider').slick({
                                autoplay: true,
                                dots: false,
                                infinite: true,
                                speed: 300,
                                slidesToShow: 1,
                                adaptiveHeight: true
                            });
                        });
                    </script>
                    <!-- Slideshow -->
                </div>
                <div class="other-image">
                @foreach($slide_bottom as $slide)
                    <div class="other-image-item">
                        <a href="{{ $slide->slug }}" title="{{ $slide->name }}">
                        <img src="{{ $slide->image }}" alt="{{ $slide->name }}" width="{{ $slide->width }}" height="{{ $slide->height }}">
                        </a>
                    </div>
                @endforeach
                </div>
            </div>
        </div>
    </div>
</div>