<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class FillTaskTableFriendsClubs extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
        Schema::table('tasks', function($t){
            $t->integer('friendID')->default(0);
            $t->string('friendName');
            $t->integer('clubID')->default(0);
            $t->string('clubName');
        });
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
        Schema::table('tasks', function($table)
        {
            $table->dropColumn('friendID');
            $table->dropColumn('friendName');
            $table->dropColumn('clubID');
            $table->dropColumn('clubName');
        });
	}

}
