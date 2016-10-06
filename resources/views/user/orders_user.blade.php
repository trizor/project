@extends('app')



       @section('information')

 <div class="container" xmlns="http://www.w3.org/1999/html">
              <h2 class="text-center top-space">Активные Заявки</h2>


               </div>

       	<div class="container text-center">
       	<br>
       		<a class="btn btn-primary" href="/user/">Назад</a>
       	</div>
       @stop
     @section('content')
     <br>
    <form class="form-horizontal" role="form" method="POST">

	  <input type="hidden" name="id_user" value="{{Auth::user()->id}}">
<div id="type_table">
  </div>
     @foreach ($contracts as $contract)
     <div class="container-fluid">
     	<div class="row">
     		<div class="col-md-8 col-md-offset-2">
     			<div class="panel panel-default">
     				<div class="panel-body">
     <contract>


         @foreach($cars as $car)
         @if($contract->car_id == $car->id)
         Марка:&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
         <input class="textfororder" readonly="true" style="border-style: none" type="text" value="{{ $car ->mark}}"size="10">
         &nbsp&nbspМодель:&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
         <input class="textfororder" readonly="true" style="border-style: none" type="text" value="{{ $car ->model}}"size="5">
        &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp Класс:&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
         <input class="textfororder" readonly="true" style="border-style: none" type="text" value=" {{ $car ->car_class}}"size="10">
         &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
          Наличие водителя:
                      @if($contract -> driver==1)
                      <input class="textfororder" readonly="true" style="border-style: none" type="text" value=" С водителем"size="10"><br/>
                             @else
                             <input class="textfororder" readonly="true" style="border-style: none" type="text" value="Без водителя" size="10"><br/>

               <br>                     @endif
         Цена в день:
         <input class="textfororder" readonly="true" style="border-style: none" type="text" value="{{ $car ->cost_per_day}}"size="10">
         @endif
         @endforeach

                 &nbsp&nbsp&nbspДата начала:
   <input class="textfororder" type="text" readonly="true" style="border-style: none"  value=" {{$contract -> start_date}}" size="10">
    &nbsp&nbsp&nbsp &nbsp Дата возврата:
       <input class="textfororder" type="text" style="border-style: none" readonly="true"  value="  {{$contract -> end_date}}"size="10">
             <input class="textfororder" readonly="true"  type="hidden" {{$iResult=floor((strtotime($contract -> end_date)-strtotime($contract -> start_date))/(3600*24))}}>

             &nbspЦена заказа:
             <input class="textfororder" readonly="true" style="border-style: none"  type="text" value="   {{$contract -> cost}} грн." size="10">
<br>
<br>
 Статус заявки:
             <input class="textfororder" readonly="true" style="border-style: none"  type="text" value="   {{$contract ->contract_status}}" size="10">
</contract>



</div>


    <div class="buttons_on_off">
  &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
    &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
        &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
  &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp  &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
    <a class="btn btn-primary"  href="/cancel/{{$contract->id}}" >Отказать</a><br>
    </div>
  </div>
    </div>
    </div>
    </div>
    </form>

 </div>




@endforeach

       @stop
        @section('menufoot')
                     <a href="/home" class="current">Главная</a> |
                     <a href="/services">Сервисы</a> |
                     <a href="/about_us" >О нас</a> |
                     <a href="/contact" >Контакты</a> |
                     @stop



       @section('buttons')
         @endsection
