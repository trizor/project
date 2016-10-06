<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class TrigerInsert extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
        DB::unprepared('
        CREATE DEFINER=`root`@`localhost` TRIGGER `contracts_after_insert` AFTER INSERT ON `contracts` FOR EACH ROW BEGIN
    insert into audits
        select * from contracts where id=NEW.id;
END;');

	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		//
	}

}
