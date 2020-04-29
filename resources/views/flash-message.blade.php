@if($message = Session::get('sucesso'))
<div class="alert alert-success alert-block">
  <button type="button" class="close" data-dismiss="alert" name="button">x</button>
  <strong>{{$message}}</strong>
</div>
@endif

@if($message = Session::get('erro'))
<div class="alert alert-success alert-block">
  <button type="button" class="close" data-dismiss="alert" name="button">x</button>
  <strong>{{$message}}</strong>
</div>
@endif

@if($message = Session::get('atencao'))
<div class="alert alert-success alert-block">
  <button type="button" class="close" data-dismiss="alert" name="button">x</button>
  <strong>{{$message}}</strong>
</div>
@endif
