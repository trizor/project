 @extends('app')

       @section('information')

 <div class="container" xmlns="http://www.w3.org/1999/html">
              <h2 class="text-center top-space">Добро пожаловать в Личный кабинет</h2>


               </div>

       	<div class="container text-center">
       	<br>
       		<a class="btn btn-primary" href="/orders_user/">Мои заявки</a> &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
       		<a class="btn btn-primary"href="/orders_his/">История Заказов</a><br>
       	</div>
       @stop
     @section('content')
<br>
<br>

	<form class="form-horizontal" role="form" method="POST" action="{{ url('/user') }}">
						<input type="hidden" name="_token" value="{{ csrf_token() }}">

						<div class="form-group">
						<label class="col-md-4 control-label">ФИО пользователя:</label>
						<div class="col-md-4">
						<input type="text" class="form-control"  name="user_name" value="{{Auth::user()->name}}">
		                </div>
						</div>


						<div class="form-group">
						<label class="col-md-4 control-label">Почта:</label>
						<div class="col-md-4">
						<input type="text" class="form-control" name="use_email" value="{{Auth::user()->email}}"/>
		                </div>
						</div>


						<div class="form-group">
						<label class="col-md-4 control-label">Телефон:</label>
						<div class="col-md-4">
					    <input type="text" class="form-control" name="use_telephone" value="{{Auth::user()->telephone}}"/>
		                </div>
						</div>


						<div class="form-group">
						<label class="col-md-4 control-label">Лицензия водителя:</label>
						<div class="col-md-4">
				        <input type="text" class="form-control" name="use_driver_license" value="{{Auth::user()->driver_license}}"/>
		                </div>
						</div>


                                <div class="form-group">
							<div class="col-md-6 col-md-offset-4">
<button type="submit" class="btn btn-primary">
									Редактировать!
								</button>
<br/>
</div>

</div>
</form>
       @stop

@section('menufoot')
                     <a href="/home" class="current">Главная</a>|
                     <a href="/services">Сервисы</a>|
                     <a href="/about_us" >О нас</a>|
                     <a href="/contact" >Контакты</a>|
 @stop