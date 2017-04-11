@if(count($error)>0)
<div class="alert alert-danger">
{!! $errors->first('f_name'); !!}
</div>
@endif