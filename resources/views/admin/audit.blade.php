@extends('admin/admin')


@section('information')
	<div class="container text-center">
	<br/>

    <br/>
	</div>
@stop





@section('content')


<div class="container">


		<h2 class="text-center top-space">Аудит контрактов по пользователю</h2>
		<br>

</div>	<!-- /container -->

<div class="form-horizontal">
@foreach($contracts as $contract)
@endforeach
<div class="form-group" align="center">
   							<div class="col-md-8">
                            </div>

						<div class="col-md-4">
						 @foreach($users as $user)
                                                             @if($contract->user_id == $user->id)
                                                            <h1>{{$user->name}}</h1>
                                                             @endif
                                                             @endforeach
                        </div>
</div>

<div class="form-group" align="center">
   							<div class="col-md-2">
                            </div>
					<div class="col-md-1">
					Код контракта
                                            </div>
				<div class="col-md-1">
				Статус
                                </div>
                                	<div class="col-md-2">
                                	Автомобиль
                                         </div>

                                     <div class="col-md-2">
                                     Водитель
                                   </div>
                            <div class="col-md-1">
                            Дата создания
                                           </div>
                                           <div class="col-md-1">
                               Дата изменения
                            </div>
						<div class="col-md-2">
                        </div>
</div>





@foreach($contracts as $contract)
<div class="form-group" align="center">
   							<div class="col-md-2">
                            </div>
					<div class="col-md-1">
					{{$contract->contract_id}}
                                            </div>
				<div class="col-md-1">
				{{$contract->contract_status}}
                                </div>
                                	<div class="col-md-2">
                                	@foreach($cars as $car)
                                    @if($contract->car_id == $car->id)
                                    {{$car->mark}} {{$car->model}}
                                    @endif
                                    @endforeach
                                         </div>

                                     <div class="col-md-2">
                                     @if($contract->driver == 1)
                                     С водителем
                                     @else
                                     Без водителя
                                     @endif
                                   </div>
                            <div class="col-md-1">
                            {{$contract->created_at}}
                                           </div>
                                           <div class="col-md-1">
                               {{$contract->updated_at}}
                            </div>
						<div class="col-md-2">
                        </div>
</div>
@endforeach

</div>
@stop
