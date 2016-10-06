@extends('admin/admin')


@section('information')
	<div class="container text-center">
	<br/>
	 <div class="form-group" align="center">
       							<div class="col-md-7">
                                                            </div>
    							<div class="col-md-3">
                                </div>
    							<div class="col-md-1">
    							 <a class="btn btn-primary" href="/admin/create/">Добавить автомобиль</a>
                                </div>
                                <div class="col-md-1">

                                                                                        </div>
    						</div>
    <br/>
	</div>
@stop





@section('content')


<div class="container">


		<h2 class="text-center top-space">Список автомобилей</h2>
		<br>

</div>	<!-- /container -->

<div class="form-horizontal">
 @foreach ($cars as $car)
  <div class="form-group" align="center">
   							<div class="col-md-4">

                                                        </div>
							<div class="col-md-3">
							<img class="img_all" src="{{$car -> car_image}}">
                            </div>
							<div class="col-md-3">
							 {{ $car -> mark }} {{$car -> model}}
							 <br/>
							 {{$car -> car_class}}
							 <br/>
							 {{$car -> car_type}}
		                    <br/>
                            <b>Цена в сутки: {{$car -> cost_per_day}} грн.</b>
                            <br/>
                             <br/>
                                <a class="btn btn-primary" href="/admin/delete/{{$car->id}}">Удалить</a>
                                <a class="btn btn-primary" href="/admin/cars/{{$car->id}}">Редактировать</a>
                            </div>
                            <div class="col-md-2">

                                                                                    </div>
						</div>

@endforeach
</div>

@stop
