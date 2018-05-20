<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateTransaksiesTable extends Migration {

	public function up()
	{
		Schema::create('transaksies', function(Blueprint $table) {
			$table->increments('id');
			$table->string('uuid', 191)->unique();
			$table->string('nomor', 191)->unique();
			$table->double('total');
			$table->double('grandtotal')->nullable();
			$table->double('denda')->default('0.00');
			$table->double('potongan');
			$table->timestamps();
			$table->softDeletes();
			$table->integer('admin_id')->unsigned()->nullable()->index();
			$table->integer('customer_transaksi_id')->unsigned()->nullable()->index();
			$table->integer('tarif_id')->unsigned()->nullable();
			$table->string('admin_uuid', 191)->index();
			$table->string('customer_transaksi_uuid', 191)->index();
			$table->string('tarif_uuid')->index();
		});
	}

	public function down()
	{
		Schema::drop('transaksies');
	}
}