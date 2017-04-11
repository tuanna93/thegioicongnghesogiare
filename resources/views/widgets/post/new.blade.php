<div class="product-home danh-muc-tin-page">
    <div class="wrapper clearfix">
        <div class="news-cat clearfix">
            <div class="colbig">
                <div class="title-block">
                    <h1>Tin tức</h1> </div>
                @foreach($news as $new)
                <div class="anewss">
                    <a href="/chi-tiet/{{ $new->slug }}.html"> <img src="{{ $new->image }}" alt="{{ $new->name }}" width="200" height="160" style="max-width:200px; max-height:160px;"> </a>
                    <h2><a href="/chi-tiet/{{ $new->slug }}.html">{{ $new->name }}</a></h2>
                    <p class="tgtin">{{ $new->getDate() }}</p>
                    <div class="desctin">{!! $new->intro !!}</div>
                </div>
                @endforeach
            </div>
            <div class="colother">
                <ul>
                @foreach($news_all as $new)
                    <li>
                        <a href="/chi-tiet/{{ $new->slug }}.html"> <img src="{{ $new->image }}" alt="{{ $new->name }}" width="93" height="58"> </a>
                        <h2><a href="/chi-tiet/{{ $new->slug }}.html">{{ $new->name }}</a></h2>
                        <p>{{ $new->getDate() }}</p>
                    </li>
                @endforeach
                </ul>
            </div>
        </div>
    </div>
</div>