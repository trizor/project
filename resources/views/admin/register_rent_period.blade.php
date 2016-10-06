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


		<h2 class="text-center top-space">Реестр арендованых автомобилей за период</h2>
		<br>

</div>	<!-- /container -->


<div class="container-fluid">
	<div class="row">
		<div class="col-md-4 col-md-offset-4">
			<div class="panel panel-default">
				<div class="panel-body">
					@if (count($errors) > 0)
						<div class="alert alert-danger">
							<strong>Упс!</strong> Были выявленны некоторые проблемы с входными данными<br><br>
							<ul>
								@foreach ($errors->all() as $error)
									<li>{{ $error }}</li>
								@endforeach
							</ul>
						</div>
					@endif

					<form class="form-horizontal" role="form" method="POST" action="/admin/register_rent_period/">
<input type="hidden" name="_token" value="{{{ csrf_token() }}}" />


Период:
<br/>
<br/>
с: <input class="form-control" name="start_date" type="date" value="{{Session('start_date')}}"/>
<br/>
<br/>
по:<input class="form-control" name="end_date" type="date" value="{{Session('end_date')}}"/>
<br/>
<button class="btn btn-primary" type="submit">Выбрать</button>
<br/>
</form>
</div>
</div>
</div>
</div>
</div>

<div class="form-horizontal">
  @foreach ($contracts as $contract)
    @foreach($cars as $car)
    @if($contract->car_id == $car->id)
  <div class="form-group" align="center">
   							<div class="col-md-4">

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

                                  Дата начала: {{$contract -> start_date}}
                                            <br/>
                                           Дата окончания: {{$contract -> end_date}}
                                               <br/>

                                    @if($contract -> driver=='1')
                                        С водителем
                                      <br/>
                                 @else
                                         Без водителя
                                         <br/>
                                                   @endif
                            <b>Цена в сутки: {{$car -> cost_per_day}} грн.</b>
                            <br/>
                             <br/>
                            </div>
                            <div class="col-md-2">
                                </div>
						</div>
@endif
@endforeach
@endforeach
</div>
@stop
