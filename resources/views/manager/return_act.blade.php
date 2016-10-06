@extends('manager/manager')
<title>Акт возврата автомобиля</title>

@section('information')

<div class="form-group" align="center">
<br/>
<h3><b>Акт № {{$contracts->id}}<br/><br/></b></h3>

                  <h4>  возврата транспортного средства арендодателю
                   &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
                    {{date("d/m/Y",strtotime($contracts->end_date))}} </h4>
                    </div>
@stop

@section('content')

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



<form role="form" class="form_editing" method="POST" enctype="multipart/form-data" action="/manager/return_act/{{$contracts->id}}">

<!-- Договор-->
<div class="form-group" align="justify ">&nbsp&nbsp&nbsp&nbsp&nbspCar Online, именуемое далее «Арендодатель», в лице @foreach($users as $user)
                                                              @if($contracts->manager_id == $user->id)
                                                              {{ $user ->name}}
                                                               @endif
                                                               @endforeach, с одной стороны и
                                                               @foreach($users as $user)
                                                               @if($contracts->user_id == $user->id)
                                                               {{ $user ->name}}
                                                               @endif
                                                               @endforeach, именуемый в дальнейшем «Арендатор»,
                                                               с другой стороны составили &nbsp&nbsp&nbsp акт возврата транспортного средства о нижеследующем:</div>
                                                               <div id="blank">
<ul id="act_contact">
    <li id="punk_dogovora" style="" >
    В связи с окончанием срока действия Договора аренды транспортного средства № {{$contracts->id}}
    от {{$contracts->end_date}} Арендатор возвращает, а Арендодатель принимает следующее транспортное средство: <br/><br/>



    Марка автомобиля:&nbsp&nbsp   @foreach($cars as $car)
                                 @if($contracts->car_id == $car->id)
                                 {{$car->mark}} <br/>
    Модель автомобиля:          {{$car->model}}<br/>

    Класс автомобиля:    {{$car->car_class}} <br/>

    Государственный номер:   {{$car->car_number}} <br/>

         @endif
     @endforeach
    </li><br/>
    Стороны подтверждают, что транспортное средство находится в технически исправном состоянии, явных повреждений нет. <br/> <br/>
    Подписи сторон:     <br/> <br/>

    Арендодатель: ____________/____________/<br/> <br/>
    <br/> <br/>
    Арендатор:&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp ____________/____________/

</ul>
 <div class="buttons_on_off">
&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<a id="return_accept1" class="btn btn-primary" href="/manager/accept_return/{{$contracts -> id}}/{{$contracts->car_id}}">Возврат</a> <br/> <br/>
</div>
&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<a class="btn btn-primary" name="button" id="ok" onclick="print_()"/>Печать&nbsp&nbsp </a>&nbsp&nbsp
<a id="service1" class="btn btn-primary" onclick="history.back()">Назад&nbsp&nbsp </a>

</div>
</div>
<!-- конец договора-->
<input type="hidden" name="_token" value="{{{ csrf_token() }}}" />
 @foreach($users as $user)
              @if($contracts->user_id == $user->id)

                 <input class="textfororder" type="hidden" readonly="true" name="name1" type="text" value="{{ $user ->name}}"size="26"><br/>
                                    <input class="textfororder" type="hidden" readonly="true" name="user_email1"  type="text" value="{{ $user ->email}}"size="26"><br/>
              @endif
              @endforeach

<br/>

</form>

 @stop