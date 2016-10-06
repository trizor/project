<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAuditsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('audits', function(Blueprint $table)
		{
            $table->integer('contract_id');
            $table->enum('contract_status', array('Подтвержден','В обработке','Отменен','Закончен'));
            $table->integer('car_id')->unsigned();
            $table->integer('user_id')->unsigned();
            $table->integer('manager_id')->unsigned();
            $table->date('start_date');
            $table->date('end_date');
            $table->boolean('driver');
            $table->integer('cost');
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
		Schema::drop('audits');
	}

}
