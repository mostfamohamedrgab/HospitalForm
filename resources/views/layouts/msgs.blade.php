@if($errors->any())
  @foreach($errors->all() as $e)
    <div class="alert text-r alert-danger text-center">{{$e}}</div>
  @endforeach
@endif

@if( session()->has('success') )
  <div class="alert text-r alert-success">{{ session()->get('success') }}</div>
@endif

@if( session()->has('msg') )
  <div class="alert text-r alert-info">{{ session()->get('msg') }}</div>
@endif
