@extends('manager/manager')



@section('information')
	<div class="container text-center">
		<br> <br>
	</div>
@stop

@section('content')

<form class="form-horizontal" role="form" method="POST" action="/cost_sort/">
<input type="hidden" name="_token" value="{{{ csrf_token() }}}" />

<div class="container">


		<h2 class="text-center top-space">Список автомобилей</h2>
		<br>



</div>	<!-- /container -->

 @foreach ($cars as $car)
  <div class="form-group" align="center">
   <car>

   							<div class="col-md-4">

                                                        </div>
							<div class="col-md-3">
							<img class="img_all" src="{{$car -> car_image}}">
                            </div>
							<div class="col-md-2">
							{{ $car -> mark }} {{$car -> model}}
							 <br/>
							 <b>Класс:</b>{{$car -> car_class}}
							 <br/>
							 <b>Тип:</b>{{$car -> car_type}}
		                    <br/>
                            <b>Цена в сутки: </b>{{$car -> cost_per_day}} грн.
                            <br/>
                            <b>Статус:</b>{{$car -> car_status}}
                             <br/>

                            </div>
                            <div class="col-md-3">

                                                                                    </div>
                            </car>
						</div>

@endforeach
</form>

 @stop




 @section('menufoot')
              <a href="/home" class="current">Главная</a>|
              <a href="/services">Сервисы</a>|
              <a href="/about_us" >О нас</a>|
              <a href="/contact" >Контакты</a>|
              @stop