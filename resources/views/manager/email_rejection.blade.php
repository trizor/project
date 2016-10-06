@extends('manager/manager')
<title>Отправка email</title>

@section('information')
  <div class="container">

       <h2 class="text-center top-space">Отмена заявки</h2>
        		<br>

        </div>
@stop

@section('content')

@if (count($errors) > 0)
						<div class="alert alert-danger">
							<strong></strong> Были выявленны некоторые проблемы с входными данными<br><br>
							<ul>
								@foreach ($errors->all() as $error)
									<li>{{ $error }}</li>
								@endforeach
							</ul>
						</div>
					@endif



<form role="form" class="form_editing" method="POST" enctype="multipart/form-data" action="/manager/email_rejection/{{$contracts->id}}">
<input type="hidden" name="_token" value="{{{ csrf_token() }}}" />
  @foreach($users as $user)
    <div class="form-group" align="center">
              @if($contracts->user_id == $user->id)
               Заказчик:&nbsp&nbsp&nbsp
                 <input class="textfororder" readonly="true" name="name" style="border: none" type="text" value="{{ $user ->name}}"size="26"><br/><br/>
                  Email:&nbsp &nbsp&nbsp
                  <input class="textfororder" readonly="true" name="user_email" style="border: none" type="text" value="{{ $user ->email}}"size="26"><br/><br/>
              @endif
              @endforeach
Причина отказа:
<input type="text" name="rejection_reason" size="30"/>
<br/>
<br/><br/>
<button type="submit" class="btn btn-primary">
									Отправить
								</button><br/><br/>
<a id="service1" class="btn btn-primary" onclick="history.back()">&nbsp&nbsp&nbspНазад&nbsp&nbsp&nbsp&nbsp&nbsp</a>
<br/>
</div>
</form>

 @stop