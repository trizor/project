@extends('admin/admin')

@section('information')
	<div class="container text-center">
		<br> <br>
	</div>
@stop

@section('content')

<div class="container">


		<h2 class="text-center top-space">ДОбавление информации об автомобиле</h2>
		<br>

</div>



@if(Session::has('success'))
          <div class="alert-box success">
          <h2>{!! Session::get('success') !!}</h2>
          </div>
        @endif
<div class="container-fluid">
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
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


<form class="form-horizontal" method="POST" enctype="multipart/form-data" action="{{url ('admin/create')}}" >
<img class="img_all" id="car_img" src="">
<input type="hidden" name="_token" value="{{{ csrf_token() }}}" />

<div class="form-group">
<label class="col-md-4 control-label">Номер автомомбиля:</label>
<div class="col-md-6">
	<input type="text" class="form-control" name="car_number" value=""/>
</div>*
</div>


<div class="form-group">
<label class="col-md-4 control-label">Марка:</label>
<div class="col-md-6">
	<input type="text" class="form-control" name="mark" value=""/>
</div>*
</div>

<div class="form-group">
<label class="col-md-4 control-label">Модель:</label>
<div class="col-md-6">
	<input type="text" class="form-control" name="model" value=""/>
</div>*
</div>

<?php
use App\cars;
$car_statuses = cars::get_enum('cars','car_status');
$car_classes = cars::get_enum('cars','car_class');
$car_types = cars::get_enum('cars','car_type');
?>


<div class="form-group">
<label class="col-md-4 control-label">Статус:</label>
<div class="col-md-6">
	<select size="1" class="form-control" name="car_status[]">
    @foreach($car_statuses as $car_status)
                  <option value="{{$car_status}}">{{$car_status}}</option>
                  @endforeach
    </select>
</div>*
</div>


<div class="form-group">
<label class="col-md-4 control-label">Класс автомобиля:</label>
<div class="col-md-6">
<select size="1" class="form-control" name="car_class[]">
@foreach($car_classes as $car_class)
              <option value="{{$car_class}}">{{$car_class}}</option>
              @endforeach
</select>
</div>*
</div>

<div class="form-group">
<label class="col-md-4 control-label">Класс автомобиля:</label>
<div class="col-md-6">
<select size="1"  class="form-control" name="car_type[]">
@foreach($car_types as $car_type)
              <option value="{{$car_type}}">{{$car_type}}</option>
              @endforeach
</select>
</div>*
</div>

<div class="form-group">
<label class="col-md-4 control-label">Стоимость за день:</label>
<div class="col-md-6">
	<input type="text" class="form-control" name="cost_per_day" value=""/> грн.
</div>*
</div>


<div class="form-group">
<label class="col-md-4 control-label">Изображение:</label>
<div class="col-md-6">
	<input type="file" class="form-control" id="car_image" name="car_image" accept="image/jpeg" value=""/>
</div>*
</div>


<div class="form-group">
<label class="col-md-4 control-label"></label>
<div class="col-md-6">
<button type="submit" class="btn btn-primary">Добавить!
</button>
</div>
</div>


</form>
</div>
</div>
</div>
</div>
</div>

@stop


