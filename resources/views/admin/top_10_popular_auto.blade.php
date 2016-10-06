@extends('admin/admin')


@section('information')
	<div class="container text-center">
	<br/>
	<a class="btn btn-primary" href="/admin/register_rent_period">Реестр арендованых автомобилей за период</a>
                    <a class="btn btn-primary" href="/admin/rent_period">Отчет о стоимости аренды за период</a>
                    <a class="btn btn-primary" href="/admin/top_10_popular_auto">Топ 10 популярних автомобилей</a>
    <br/>
	</div>
@stop


@section('content')


<div class="container">


		<h2 class="text-center top-space">Топ 10 популярних автомобилей</h2>
		<br>

</div>	<!-- /container -->




<div class="form-horizontal">
<input type="hidden" value="{{$cout = 0}}"/>
 @foreach ($cars as $car)

  <div class="form-group" align="center">
   							<div class="col-md-3">

                                                        </div>
                             <div class="col-md-1">
<h1>{{$cout=$cout+1}}</h1>
                            </div>
							<div class="col-md-3">
							<img class="img_all" src="{{$car->car_image}}">
                            </div>
							<div class="col-md-3">
							 {{ $car -> mark }} {{$car -> model}}
							 <br/>
							 {{$car -> car_class}}
							 <br/>
							 {{$car -> car_type}}
		                      <br/>
                                  {{$car -> car_number}}
                                  <br/>



                             <br/>
                            </div>
                            <div class="col-md-2">
                                </div>
						</div>

@endforeach
 <div class="form-group" align="center">
 <div class="col-md-4 col-md-offset-7" >
 @if(Session('summ') != null)
                      <h1> <p id="cost_period_all">Стоимость оренды за период составляет {{Session('summ')}} грн.</p></h1>
                       @endif

                                 </div>


</div>

</div>
@stop

