@extends('app')

      @section('content')

      <div class="content_title_01">Сервисы</div>

       @stop

       @section('buttons')
       @stop

       @section('menu')
                   <li><a href="/home" >Главная</a></li>
                   <li><a href="/services" class="current">Сервисы</a></li>
                   <li><a href="/about_us" >О нас</a></li>
                   <li><a href="/contact" >Контакты</a></li>
                    @if(Auth::check())
                   <li><a href="/user">ЛК</a></li>
                   @endif
       @stop