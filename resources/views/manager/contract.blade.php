@extends('manager/manager')
<title>Контракт на оренду авто</title>


@section('information')
<div class="form-group" align="center">
<br/>
<h3><b>КОНТРАКТ №. {{$contracts->id}}<br/><br/></b></h3>

                 <h4>  на аренду автомобиля
                   &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
                   С  {{date("d/m/Y",strtotime($contracts->start_date))}}  До  {{date("d/m/Y",strtotime($contracts->end_date))}}</h4>
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



<form role="form" class="form_editing" method="POST" enctype="multipart/form-data" action="/manager/contract/{{$contracts->id}}/{{$contracts->car_id}}">
<div class="form-group" align="justify ">
<!-- Договор-->
&nbsp&nbsp&nbsp&nbsp&nbspCar Online, именуемое далее «Арендодатель», в лице @foreach($users as $user)
                                                              @if($contracts->manager_id == $user->id)
                                                              {{ $user ->name}}
                                                               @endif
                                                               @endforeach, действующего на основании заявки на оренду авто, с одной стороны и
                                                               @foreach($users as $user)
                                                               @if($contracts->user_id == $user->id)
                                                               {{ $user ->name}}
                                                               @endif
                                                               @endforeach, именуемый<br/>&nbsp&nbsp&nbsp&nbsp в дальнейшем «Арендатор»,
                                                               с другой стороны заключили настоящий договор о нижеследующем:</div>
                                                               <div id="blank">
<ul id="act_contact">
    <li id="punk_dogovora" style="">
    1.  Предмет договора<br/><br/>
    </li>
    <li id="punk_dogovora">1.1.  Арендодатель предоставляет Арендатору, за обусловленную договором плату, автотранспортное средство согласно характеристикам, указанным в п. 1.2. настоящего договора, именуемое в дальнейшем Автомобиль во временное пользование (прокат). </li>
   <li id="punk_dogovora">1.2.         Автомобиль соответствует следующим характеристикам: <br/>

    Марка автомобиля:   @foreach($cars as $car)
                                 @if($contracts->car_id == $car->id)
                                 {{$car->mark}} <br/>


    Класс автомобиля:    {{$car->car_class}} <br/>

    Государственный номер:   {{$car->car_number}} <br/>

    Цвет автомобиля в день:   {{$car->cost_per_day}}грн. <br/>
     @endif
     @endforeach
    </li><br/>
    <li id="punk_dogovora">2. Условия договора <br/><br/>
                           2.1. Арендодатель предоставляет автомобиль в исправном состоянии по Акту приема-передачи. Акт приема-передачи является неотъемлемой частью настоящего договора. <br/>

                           2.2. Арендатор обязуется по истечение срока действия договора вернуть автомобиль в состоянии соответствующем отраженному в Акте приема-передачи, с учетом нормального износа. <br/>

                           2.3. Арендатор производит ремонт автомобиля за свой счет. <br/>

                           2.4. Автомобилем может управлять только Арендатор лично, исключительно с письменного согласия Арендодателя. Письменным согласием Арендодателя является, настоящий Договор и приложения к данному Договору (акт приема-передачи). <br/>

                           2.5. Риск случайной гибели, повреждения, хищения Автомобиля с момента передачи его Арендатору и до момента принятия от Арендатора Арендодателем несет Арендатор. <br/>

                           2.6. При обнаружении Арендатором недостатков переданного в прокат Автомобиля, полностью или частично препятствующих  пользованию им, Арендодатель обязан в 10-ти дневный срок  со дня заявления Арендатора о недостатках и предоставлении Автомобиля,  безвозмездно устранить  недостатки Автомобиля  либо произвести замену на другой Автомобиль, находящийся в надлежащем состоянии. <br/>

                           2.7. Если недостатки  переданного в прокат Автомобиля явились следствием нарушения Арендатором  правил эксплуатации и содержания Автомобиля, Арендатор оплачивает Арендодателю стоимость ремонта и транспортировки Автомобиля. <br/></li>

                          <br/><li id="punk_dogovora"> 3. Сроки и цели аренды (проката)<br/><br/>
                          3.1. Автомобиль предоставляется на срок c {{$contracts->start_date}} <br/>до {{$contracts->start_date}},<br/>

                          при лимите пробега по маршруту поездки на время использования не более 500 километров в сутки.<br/>

                          Действие настоящий Договора может быть продлено путем оформления  дополнительного соглашения.<br/>

                          3.2.Автомобиль предоставляется Арендодателем Арендатору для использования в личных целях.<br/>

                          3.3.Арендатор не вправе использовать и управлять Автомобилем:<br/>

                          - В состоянии опьянения (алкогольного, токсического, наркотического...);<br/>

                          - При перевозке контрабандных товаров и в других противоречащих закону целях;<br/>

                          - Как средством извлечения прибыли и предпринимательской деятельности;<br/>

                          - Для буксирования другого транспортного средства, легковых и грузовых автомобилей;<br/>

                          - В любых соревнованиях;<br/>

                          - Как средство перевозки посылок и иных крупно- и малогабаритных грузов;<br/>

                          - В том числе передавать право управления и сам Автомобиль третьим лицам, а также иным способом распоряжаться арендованным Автомобилем без письменного разрешения Арендодателя.<br/>


                                </li>

   <br/><li id="punk_dogovora"> 4. Порядок расчетов <br/><br/>
    4.1. Арендатор обязуется заплатить за аренду автомобиля {{$contracts->cost}}грн.,<br/>

    4.2. В целях надлежащего исполнения настоящего Договора  используется Гарантия исполнения Договора, именуемая в
    дальнейшем Обеспечение (залог).<br/>

    4.3. Залог вносится Арендатором в момент заключения настоящего Договора.<br/><br/><br/><br/><br/>


     Арендодатель: ___________________________________________________ <br/>

    (фамилия, имя, отчество)<br/><br/>

    &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp_________________________ <br/>
    &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp(подпись)<br/><br/>

     Арендатор: &nbsp&nbsp&nbsp&nbsp___________________________________________________ <br/>

        (фамилия, имя, отчество)<br/><br/>

        &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp_________________________ <br/>
        &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp(подпись)
</p>

    </li>
</ul>

&nbsp&nbsp &nbsp&nbsp &nbsp&nbsp &nbsp&nbsp <button id="okay_button" type="submit" class="btn btn-primary">
									Отправить
								</button>

</div>
</div>
<!-- конец договора-->
<input type="hidden" name="_token" value="{{{ csrf_token() }}}" />
 @foreach($users as $user)
              @if($contracts->user_id == $user->id)

                 <input class="textfororder" type="hidden" readonly="true" name="name1" type="text" value="{{ $user ->name}}"size="26"><br/>
                                    <input class="textfororder" type="hidden" readonly="true" name="user_email1"  type="text" value="{{ $user ->email}}"size="26">
              @endif
              @endforeach

&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp <a class="btn btn-primary" name="button" id="ok" onclick="print_()"/>&nbsp&nbspПечать&nbsp&nbsp&nbsp&nbsp&nbsp</a>
&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<a id="service1" class="btn btn-primary" onclick="history.back()">&nbsp&nbsp&nbspНазад&nbsp&nbsp&nbsp&nbsp&nbsp</a>
<br/>

</form>

 @stop