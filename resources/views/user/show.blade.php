@extends('app')




@section('information')
	<div class="container text-center">
		<br> <br>


	</div>
@stop

@section('content')

<div class="container">


</div>	<!-- /container -->

<div class="form-horizontal">

<div class="container">


<h2 class="text-center top-space">Подробная информация</h2>
 		<br>



 </div>


 <div class="form-group">
   							<div class="col-md-4">

                                                        </div>
							<div class="col-md-3">
							<img class="img_all" src="{{$cars -> car_image}}">
                            </div>
							<div class="col-md-2">
							<b>Автомобиль: </b> {{ $cars -> mark }} {{$cars -> model}}
							 <br/>
							 <b>Класс:</b> {{$cars -> car_class}}
							 <br/>
							<b>Тип:</b> {{$cars -> car_type}}
		                    <br/>
		                    <b>Номер автомобиля:</b> {{$cars->car_number}}
                            <br/>
                            <b>Цена в сутки:</b> {{$cars -> cost_per_day}} грн.
                            <br/>
                             <br/>


                            @if(Auth::check()&& ($cars->car_status == 'Свободен'))

                               <a class="btn btn-primary" href="/orders/{{$cars->id}}">Арендовать</a>

                               @else
                               @if(($cars->car_status != 'Свободен'))
                               <p class="p">Автомобиль уже занят.</p>
                               @endif
                               <br>

                                @if(Auth::check())
                                @else
                                <br>
                                <p class="p">Для резервирования автомобиля авторизируйтесь</p>
                                @endif


                               @endif


                            </div>
                            <div class="col-md-3">

                             </div>
						</div>



</div>

@stop

 @section('menufoot')
              <a href="/home" class="current">Главная</a>|
              <a href="/services">Сервисы</a>|
              <a href="/about_us" >О нас</a>|
              <a href="/contact" >Контакты</a>|
              @stop