@extends('app')


 @section('menu')
             <li><a href="/home" class="active">Главная</a></li>
             <li><a href="/services">Сервисы</a></li>
             <li><a href="/about_us" >О нас</a></li>
             <li><a href="/contact" >Контакты</a></li>
 @stop


@section('information')
	<div class="container text-center">
		<br> <br>
		<h2 class="thin">Регистрация</h2>
		<p class="text-muted">
		</p>
	</div>
@stop


@section('content')

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

					<form class="form-horizontal" role="form" method="POST" action="{{ url('/auth/register') }}">
						<input type="hidden" name="_token" value="{{ csrf_token() }}">

						<div class="form-group">
							<label class="col-md-4 control-label">ФИО</label>
							<div class="col-md-6">
								<input type="text" class="form-control" name="name" value="{{ old('name') }}">
							</div>*
						</div>

						<div class="form-group">
							<label class="col-md-4 control-label">E-Mail</label>
							<div class="col-md-6">
								<input type="email" class="form-control" name="email" value="{{ old('email') }}">
							</div>*
						</div>


                        <div class="form-group">
							<label class="col-md-4 control-label">Страна</label>
							<div class="col-md-6">

                                <select class="form-control" size="1" name="countries[]">
                                   @foreach($countries as $country)
                                   <country>
                                   <option  value="{{$country->id}}">{{$country->country_name}}</option>
                                   </country>
                                   @endforeach
                            </select>

							</div>*
						</div>

                        <div class="form-group">
                        		<label class="col-md-4 control-label">День рождения</label>
               					<div class="col-md-6">
        						<input type="date" class="form-control" name="birthday" value="{{ old('birthday') }}">
            		        	</div>*
            			</div>

                        <div class="form-group">
                            <label class="col-md-4 control-label">Телефон</label>
                        	<div class="col-md-6">
                       		<input type="tel" class="form-control" name="telephone" value="{{ old('telephone') }}">
                           	</div>*
                        </div>

                        <div class="form-group">
                            <label class="col-md-4 control-label">Номер водительского удостоверения</label>
                        	<div class="col-md-6">
                       		<input type="text" class="form-control" name="driver_license" value="">
                           	</div>*
                        </div>
                        <div class="form-group">
                            <label class="col-md-4 control-label">Номер карты</label>
                        	<div class="col-md-6">
                       		<input type="text" class="form-control" name="card_number" value="">
                           	</div>
                        </div>
						<div class="form-group">
							<label class="col-md-4 control-label">Пароль</label>
							<div class="col-md-6">
								<input type="password" class="form-control" name="password">
							</div>*
						</div>

						<div class="form-group">
							<label class="col-md-4 control-label">Подтверждение пароля</label>
							<div class="col-md-6">
								<input type="password" class="form-control" name="password_confirmation">
							</div>*
						</div>
                        <br/>
						<div class="form-group">
							<div class="col-md-6 col-md-offset-4">
								<button type="submit" class="btn btn-primary">
									Регистрация
								</button>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
