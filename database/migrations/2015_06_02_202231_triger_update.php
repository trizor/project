<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class TrigerUpdate extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		        DB::unprepared('
CREATE DEFINER=`root`@`localhost` TRIGGER `contracts_after_update` AFTER UPDATE ON `contracts` FOR EACH ROW BEGIN
insert into audits
        select * from contracts where id = TRIM(OLD.id);
END');

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
