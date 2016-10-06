@extends('app')



@section('information')
	<div class="container text-center">
		<br> <br>
	</div>
@stop

@section('content')

<form class="form-horizontal" role="form" method="POST" action="/cost_sort/">
<input type="hidden" name="_token" value="{{{ csrf_token() }}}" />

                              <?php
                              use App\cars;
                              //$car_statuses = cars::get_enum('cars','car_status');
                              $car_classes = cars::get_enum('cars','car_class');
                              //$car_types = cars::get_enum('cars','car_type');
                              ?>
@foreach ($cars as $car)
@endforeach

                            <div class="form-group">
                            <div class="col-md-4">

                            							</div>
							<label class="col-md-1">Введите марку авто:</label>
							<div class="col-md-2">
							<input id="bloc1" class="form-control" onchange="transmit()" type="text" name="search" value=""/>
							</div>
							<div class="col-md-2">
							<a id="search_button" class="btn btn-primary" href="#" >Поиск</a>
							</div>
						</div>

        <div class="form-group">
         <div class="col-md-4">

                                    							</div>
							<label class="col-md-1 ">Сортировка по классам и Цене</label>
							<div class="col-md-2">
							 <select size="1"  class="form-control" name="car_class[Выберите класс]">
                                                            @foreach($car_classes as $car_class)
                                                                          <option value="{{$car_class}}">{{$car_class}}</option>

                             @endforeach
                                                            </select>
							</div>
							<div class="col-md-2">
							<button type="submit"  class="btn btn-primary" id="sort_button">
                                              Сортировать
                                              </button>
							</div>
						</div>


<div class="container">


		<h2 class="text-center top-space">Список свободных автомобилей</h2>
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
							 {{$car -> car_class}}
							 <br/>
							 {{$car -> car_type}}
		                    <br/>
                            <b>Цена в сутки: {{$car -> cost_per_day}} грн.</b>
                            <br/>
                             <br/>
                            <a  class="btn btn-primary"  href="/auto/{{$car->id}}">Просмотреть</a>
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