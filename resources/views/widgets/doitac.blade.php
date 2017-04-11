<div class="list-doitac-logo">
    <div class="wrapper clearfix">
        <div class="doitaclogo">
             <maquee>
             @foreach(\App\Helpers\Helpers::get_adv_doitac() as $doitac)
                <div class="item">
                     <a href="{{ $doitac->slug }}" title="{{ $doitac->name }}"><img src="{{ $doitac->image }}" alt="{{ $doitac->image }}">
                     </a>
                 </div>
             @endforeach
             </maquee>
        </div>
    </div>
</div>