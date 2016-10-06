 @extends('app')
       @section('information')
       	<div class="container text-center">
       		<br> <br>
       	</div>
       @stop

       @section('content')



       <div class="container">

       <h2 class="text-center top-space">Подробная информация</h2>
        		<br>

        </div>

<div class="form-horizontal">
<div class="form-group">
<div class="col-md-4">
                                 </div>
                     <div class="col-md-4">
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
                              </div>

              	<div class="col-md-4">
                         </div>
</div>

        <div class="form-group">
          							<div class="col-md-4">
                                                               </div>
       							<div class="col-md-3">
       							<img class="img_all" src="{{$cars -> car_image}}">
                                   </div>
       							<div class="col-md-2">
                                   <h3>Модель авто: {{$cars -> model}}
                                   <br/>
                                   Марка авто: {{$cars -> mark}}</h3>
       							 <br/>
                                   </div>
                                   <div class="col-md-3">

                                    </div>
       						</div>

       <form  role="form" class="form-horizontal" method="POST" action="/orders/">
              	 <input type="hidden" name="id_car" value="{{$cars->id}}">
              	  <input type="hidden" name="id_user" value="{{Auth::user()->id}}">
              	    <input type="hidden" name="costs" value="{{$cars -> cost_per_day}}">
              	     <input type="hidden" name="car_status" value="{{$cars -> car_status}}">
                       	<input type="hidden" name="_token" value="{{ csrf_token() }}">
                <div class="form-group">
                              <div class="col-md-4">
                              </div>
                              <label class="col-md-2">Период аренды </label>
                               <div class="col-md-4">
                               </div>
                </div>



                <div class="form-group">
                              <div class="col-md-4">
                              </div>
                              <label class="col-md-1">C </label>
                               <div class="col-md-3">
                               <input type="date" class="form-control" name="start_date" value="">
                               </div>
                               <div class="col-md-4">
                               </div>
                </div>
                <div class="form-group">
                              <div class="col-md-4">
                              </div>
                              <label class="col-md-1">По</label>
                               <div class="col-md-3">
                               <input type="date" class="form-control" name="end_date"  value="" size="">
                               </div>
                               <div class="col-md-4">
                               </div>
                </div>



                <div class="form-group">
                                              <div class="col-md-4">
                                              </div>
                                              <div class="col-md-1"></div>
                                               <div class="col-md-3">
                                               <input id="driverr"  type="checkbox" onclick="showhideandrey()" name="driver"> Водитель
                                               </div>
                                               <div class="col-md-4">
                                               </div>
                </div>


                     <div class="form-group">
                                                                       <div class="col-md-4">
                                                                         </div>
                                                                             <div class="col-md-1"></div>
                                                                             <lable id="service" style="display: none" class="col-md-3">
                Услуга с водителем будет стоить дополнительно 100гр в день
                                                                             </lable>
                                                                               <div class="col-md-4">
                                                                                         </div>
                                                                                </div>



                  <div class="form-group">
                                                              <div class="col-md-4">
                                                              </div>
                                                              <div class="col-md-1"></div>
                                                               <div class="col-md-3">
                                                               <input id="driverr"  type="checkbox" onclick="showhideandrey1()"   name="usl_contract"> Я согласен с<a href="/usl_contracta"> условием контракта</a>
                                                               </div>
                                                               <div class="col-md-4">
                                                               </div>
                                </div>




                                <div class="form-group">
                                                              <div class="col-md-4">
                                                              </div>
                                                              <div class="col-md-1"></div>
                                                               <div class="col-md-3">
                                                               <button type="submit" class="btn btn-primary" id="order" style="display: none" >
                                                               Забронировать
                                                               </button>
                                                               </div>
                                                               <div class="col-md-4">
                                                               </div>
                                </div>
       </form>
</div>

       @stop

@section('menufoot')
                     <a href="/home" class="current">Главная</a>|
                     <a href="/services">Сервисы</a>|
                     <a href="/about_us" >О нас</a>|
                     <a href="/contact" >Контакты</a>|
 @stop