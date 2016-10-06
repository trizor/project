@extends('app')

@section('content')
<div class="content_title_01">Список доступных автомобилей!</div>
@stop

@section('buttons')
<img class="img_all" src="{{$cars -> car_image}}">
<h1>{{$cars -> mark}}</h1>

<car>
{{$cars -> car_status}}
</car>

 @stop