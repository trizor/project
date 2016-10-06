@extends('admin/admin')






@section('information')
	<div class="container text-center">
		<br> <br>
	</div>
@stop


@section('content')


<div class="container">


		<h2 class="text-center top-space">Управление пользователями</h2>
		<br>

</div>	<!-- /container -->


<div class="form-horizontal">
 @foreach ($users as $user)

<div class="form-group" align="center">
   							<div class="col-md-2">
                            </div>

                            <div class="col-md-2">
                            ID: {{ $user -> id }}
                            <br/>
                            ФИО: {{ $user -> name }}
                            <br/>
                            E-mail: {{ $user -> email }}
                            <br/>
                            </div>

                            <div class="col-md-2">
                            @foreach($countries as $country)
    @if($user->country_id == $country -> id)
    Страна: {{ $country -> country_name }}
    @endif
    @endforeach
    <br/>
    День рождения: {{ $user -> birthday }}
    <br/>
    Телефон: {{ $user -> telephone }}
</div>
                            		 <div class="col-md-2">
                                     </div>


                                     <div class="col-md-3">
    <a class="btn btn-primary" href="/admin/audit/{{$user -> id}}">Аудит</a>
    @if($user -> status == '1')
    <a class="btn btn-primary" href="/admin/edit_status_block/{{$user -> id}}">Заблокировать</a>
    @else
    <a class="btn btn-primary" href="/admin/edit_status_unblock/{{$user -> id}}">Разблокировать</a>
    @endif

                                               </div>
                                             <div class="col-md-1">

                                             </div>
                            </div>



@endforeach
  </div>

@stop
