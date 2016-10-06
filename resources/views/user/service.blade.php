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

 </div>


 <div class="form-group">
   							<div class="col-md-4">

                                                        </div>
							<div class="col-md-6">
							@foreach($contracts as $contract)
							@endforeach
                                      <h2>Мы скоро с вами свяжемся</h2>
                                  <h3>Сума к оплате = {{$contract->cost}}. грн</h3>

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