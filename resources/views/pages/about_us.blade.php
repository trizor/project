@extends('app')

@section('information')

<div class="container text-center">
		<h2 class="thin">О нас</h2>
		<br/>
		<p class="text-muted">
		</p>
	</div></div>

 @stop

 @section('content')
 <div class="container">
 <div class="col-md-6" align="justify">
&nbsp&nbsp&nbsp&nbsp<b>Car Online </b> - одна из популярных компаний по прокату автомобилей в Украине. Car Online основана 27 августа 2010 группой из 3 независимых компаний автопроката. В 2011 году Car Online стала одной из самых популярных компаний по прокату автомобилей в г. Харьков. <br/>
<br/>&nbsp&nbsp&nbsp&nbsp<b>Перечень услуг:</b><br/>
&nbsp&nbsp&nbsp&nbsp1)предоставление автомобилей в прокат без водителя или с водителем; <br/>
&nbsp&nbsp&nbsp&nbsp2)организация встреч в аэропорту; <br/>
&nbsp&nbsp&nbsp&nbsp3)предоставление автомобилей в долгосрочный прокат; <br/>
&nbsp&nbsp&nbsp&nbsp4)прокат автомобилей на свадьбу; <br/>
&nbsp&nbsp&nbsp&nbsp5)городские, междугородные и международные поездки; <br/> <br/>
&nbsp&nbsp&nbsp&nbsp<b>Преимущества:</b> <br/>
&nbsp&nbsp&nbsp&nbsp1)самая низкая цена проката и залога за автомобиль; <br/>
&nbsp&nbsp&nbsp&nbsp2)автомобили в отличном состоянии;<br/>
&nbsp&nbsp&nbsp&nbsp3)круглосуточная техническая поддержка клиентов; <br/>
&nbsp&nbsp&nbsp&nbsp4)сотрудничество с гражданами любых стран. <br/>
</div>
<div class="col-md-6">
<img src="images/office.png">
</div>
</div>
 @stop

 @section('menu')
             <li><a href="/home">Главная</a></li>
             <li><a href="/services">Сервисы</a></li>
             <li><a href="/about_us" class="current">О нас</a></li>
             <li><a href="/contact" class="last">Контакты</a></li>
              @if(Auth::check())
             <li><a href="/user">ЛК</a></li>
             @endif
 @stop