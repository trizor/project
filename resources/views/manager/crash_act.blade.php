@extends('manager/manager')

@section('content')
<div class="content_title_01">Отмена возврата</div>
@stop

@section('buttons')

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



<form role="form" class="form_editing" method="POST" enctype="multipart/form-data" action="/manager/crash_act">
<input type="hidden" name="_token" value="{{{ csrf_token() }}}" />
  @foreach($users as $user)
              @if($contracts->user_id == $user->id)
               Заказчик:&nbsp
                 <input class="textfororder" readonly="true" name="name" type="text" value="{{ $user ->name}}"size="26"><br/>
              @endif
              @endforeach
  @foreach($cars as $car)
                @if($contracts->car_id == $cars->id)
                    Автомобиль:&nbsp
                    <input class="textfororder" readonly="true" name="user_email"  type="text" value="{{ $cars ->mark}}"size="26"><br/>
                @endif
                @endforeach
Причина:
<input type="text" name="rejection_reason" size="30"/>
<br/>
<br/><br/>
<button type="submit" class="btn btn-primary">
									Отправить
								</button>
<br/>
</form>

 @stop