@extends('manager/manager')
<title>Контракты</title>

@section('information')


@stop

@section('content')
  <div class="container">

       <h2 class="text-center top-space">Список заявок на прокат</h2>
        		<br>

        </div>

@stop
    <form class="form-horizontal" role="form" method="POST" action="{{ url('/manager/unaccept_order') }}">
            <div class="form-group">
         <div class="col-md-6">
         </div>
            </div>
            	</form>

 @section('content1')
  <div class="panel-body">
  </div>
     @foreach ($contracts as $contract)
     <div class="container-fluid">
     	<div class="row">
     		<div class="col-md-8 col-md-offset-2">
     			<div class="panel panel-default">
     				<div class="panel-body">
     <contract>

        <h2> Номер заявки:
         <input class="textfororder" readonly="true" style="border: none" type="text" value="{{ $contract ->id}}"size="10"></h2>
         @foreach($cars as $car)
         @if($contract->car_id == $car->id)
         <b>Марка:</b>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
         <input class="textfororder" readonly="true" style="border: none" type="text" value="{{ $car ->mark}}"size="10">
        &nbsp <b>Модель:</b>&nbsp&nbsp&nbsp&nbsp&nbsp
         <input class="textfororder" readonly="true" style="border: none" type="text" value="{{ $car ->model}}"size="10">
      &nbsp&nbsp&nbsp&nbsp   <b>Класс:</b>&nbsp&nbsp&nbsp&nbsp&nbsp
         <input class="textfororder" readonly="true" style="border: none" type="text" value=" {{ $car ->car_class}}"size="13">
         <br/> <b>Водитель:</b>&nbsp&nbsp&nbsp&nbsp
                      @if($contract -> driver==1)
                      <input class="textfororder" readonly="true" style="border: none" type="text" value=" С водителем"size="10"><br/>
                             @else
                             <input class="textfororder" readonly="true" style="border: none" type="text" value="Без водителя" size="10"><br/>
                                    @endif
         <b>Цена в день:</b>
         <input class="textfororder" readonly="true" style="border: none" type="text" value="{{ $car ->cost_per_day}} грн."size="10">
         @endif
         @endforeach

        @foreach($users as $user)
              @if($contract->user_id == $user->id)
               &nbsp&nbsp<b>Заказчик:</b>&nbsp&nbsp&nbsp&nbsp&nbsp
                 <input class="textfororder" readonly="true" style="border: none" type="text" value="{{ $user ->name}}"size="25"><br/>
                <b>Телефон:</b>&nbsp&nbsp&nbsp&nbsp&nbsp
                 <input class="textfororder" readonly="true" style="border: none" type="text" value="{{ $user ->telephone}}"size="10"><br/>
              @endif
              @endforeach

              <b>Дата начала:</b>
   <input class="textfororder" type="text" readonly="true" style="border: none"  value="  {{date("d/m/Y",strtotime($contract->start_date))}}" size="10">
    &nbsp<b>Дата возврата:</b>
       <input class="textfororder" type="text" readonly="true" style="border: none" value="   {{date("d/m/Y",strtotime($contract->end_date))}}"size="10">
             <input class="textfororder" readonly="true" style="border: none" type="hidden" {{$iResult=floor((strtotime($contract -> end_date)-strtotime($contract -> start_date))/(3600*24))}}>
           <b> Цена заказа:</b>
             <input class="textfororder" readonly="true" style="border: none" type="text" value="   {{$contract -> cost}} грн." size="10">


  </contract>


    <div class="buttons_on_off">
    <br/>
    <a id="offContract"class="btn btn-primary" href="/manager/show_rejection_order/{{$contract->id}}">Отказать</a>
    <a id="onContract" class="btn btn-primary" href="/manager/create_contract/{{$contract->id}}"> Создать контракт</a>

    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
@endforeach
@stop
