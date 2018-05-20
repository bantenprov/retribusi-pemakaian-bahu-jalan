<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePbjCustomerRetribusiesTable extends Migration {

	public function up()
	{
		Schema::create('pbj_customer_retribusies', function(Blueprint $table) {
			$table->increments('id');
			$table->string('uuid', 191)->unique();
			$table->timestamps();
			$table->softDeletes();
			$table->integer('customers_id')->unsigned()->nullable();
			$table->integer('daftar_retribusi_id')->unsigned()->nullable()->index();
			$table->integer('user_id')->unsigned()->nullable()->index();
			$table->integer('user_update')->unsigned()->nullable()->index();
		});
	}

	public function down()
	{
		Schema::drop('pbj_customer_retribusies');
	}
}