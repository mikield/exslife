<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class FillTasksTableLikesReposts extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('tasks', function($t){
            $t->integer('likeUserID')->default(0);
            $t->integer('likeObjectID')->default(0);
            $t->string('likeType');
            $t->integer('repostUserID')->default(0);
            $t->integer('repostObjectID')->default(0);
            $t->string('repostType');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('tasks', function($t){
		  $t->dropColumn('likeUserID');
          $t->dropColumn('likeObjectID');
          $t->dropColumn('likeType');
          $t->dropColumn('repostUserID');
          $t->dropColumn('repostObjectID');
          $t->dropColumn('repostType');
		});
	}

}
