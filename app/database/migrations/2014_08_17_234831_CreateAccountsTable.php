<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAccountsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		//
        Schema::create('accounts', function($t){
           $t->increments('id');
           $t->integer('accountID');
           $t->string('accessToken');
           $t->integer('ownerID');
           $t->integer('lastTaskID')->default(0);
           $t->string('userFirstName');
           $t->string('userLastName');
           $t->integer('country');
           $t->integer('city');
           $t->integer('sex');
           $t->string('ava');
           $t->timestamps(); 
        });
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		//
        Schema::dropIfExists('accounts');
	}

}
