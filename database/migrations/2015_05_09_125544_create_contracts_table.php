<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateContractsTable extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contracts', function(Blueprint $table)
        {
            $table->increments('id');
            $table->enum('contract_status', array('Подтвержден','В обработке','Отменен','Закончен'));
            $table->integer('car_id')->unsigned();
            $table->integer('user_id')->unsigned();
            $table->integer('manager_id')->unsigned();
            $table->date('start_date');
            $table->date('end_date');
            $table->boolean('driver');
            $table->integer('cost');
            $table->timestamps();


            $table->foreign('car_id')
                ->references('id')
                ->on('cars')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('contracts');
    }

}
