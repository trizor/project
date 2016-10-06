@extends('app')



@section('information')
	<div class="container text-center">
		<br> <br>
		<h2 class="thin">Вход на сайт</h2>
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
							<strong>Whoops!</strong> There were some problems with your input.<br><br>
							<ul>
								@foreach ($errors->all() as $error)
									<li>{{ $error }}</li>
								@endforeach
							</ul>
						</div>
					@endif

					<form class="form-horizontal" role="form" method="POST" action="{{ url('/auth/login') }}">
						<input type="hidden" name="_token" value="{{ csrf_token() }}">

						<div class="form-group">
							<label class="col-md-4 control-label">E-Mail</label>
							<div class="col-md-6">
								<input type="email" class="form-control" name="email" value="{{ old('email') }}">
							</div>
						</div>

						<div class="form-group">
							<label class="col-md-4 control-label">Пароль</label>
							<div class="col-md-6">
								<input type="password" class="form-control" name="password">
							</div>
						</div>

						<div class="form-group">
							<div class="col-md-6 col-md-offset-4">
								<div class="checkbox">
									<label>
										<input type="checkbox" name="remember"> Запомнить
									</label>
								</div>
							</div>
						</div>

						<div class="form-group">
							<div class="col-md-6 col-md-offset-4">
								<button type="submit" class="btn btn-primary">Войти</button>

							<!--	<a class="btn btn-link" href="{{ url('/password/email') }}">Forgot Your Password?</a>-->
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>

 @stop


 @section('menufoot')
              <a href="/home" class="current">Главная</a> |
              <a href="/services">Сервисы</a> |
              <a href="/about_us" >О нас</a> |
              <a href="/contact" >Контакты</a> |
              @stop




@endsection
