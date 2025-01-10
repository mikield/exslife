<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddAvaToUsers extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('users', function(Blueprint $table)
		{
			$table->string('originPassword')->after('password');
			$table->integer('rate')->default('0');
            $table->integer('activeAccountID')->default(0);
			$table->string('inviteCode')->after('activeAccountID');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('users', function(Blueprint $table)
		{
			$table->dropColumn('rate');
			$table->dropColumn('activeAccountID');
		});
	}

}
