<label class="control-label col-md-3 col-sm-3 col-xs-12">{{ $name }}</label>
<div class="col-md-3 col-sm-9 col-xs-12">
    <select class="form-control" name="loadkieutrang" id="loadkieutrang">
        {!! \App\Helpers\Helpers::menu_parent($data,0) !!}
    </select>
</div>