<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCarsTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cars', function (Blueprint $table) {
            $table->increments('id');
            $table->string('car_number')->unique();
            $table->string('model');
            $table->string('mark');
            $table->enum('car_status', array('Свободен', 'В прокате', 'На ремонте','Забронирован'));
            $table->enum('car_class', array('Премиум-класс','Бизнес-класс', 'Средний-класс', 'Эконом-класс'));
            $table->enum('car_type', array('Внедорожник', 'Седан', 'Универсал', 'Лимузин', 'Кабриолет', 'Кроссовер', 'Хетчбек'));
            $table->double('cost_per_day');
            $table->integer('count');
            $table->string('car_image');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('cars');
    }
}

