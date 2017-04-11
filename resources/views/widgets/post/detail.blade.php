<div class="product-home chi-tiet-page">
    <div class="wrapper clearfix chi-tiet-tin-pageop">
        <div class="colchitiet1">
            <div class="chitiettin-wrapper">
                <h1 class="title_page">{{ $detail->name }}</h1>
                <div class="chitietin-abc">
                    <div class="textcontent"> <strong>{!! $detail->intro !!}</strong>
                        {!! $detail->content !!}
                </div>
            </div>
        </div>
        </div>
        <div class="colchitiet2">
            <ul class="sidebar-right-news">
            @foreach($news as $new)
                @if($new->id != $detail->id)
                <li class="menu-item "> <a href="/chi-tiet/{{ $new->slug }}.html" rel="category tag">{{ $new->name }}</a> </li>
                @endif
            @endforeach
            </ul>
        </div>
        <div class="col-line"></div>
    </div>
</div>