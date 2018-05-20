<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateTarifsTable extends Migration {

	public function up()
	{
		Schema::create('tarifs', function(Blueprint $table) {
			$table->increments('id');
			$table->string('uuid', 191)->unique();
			$table->string('uraian', 191)->unique();
			$table->boolean('tarif')->default(0);
			$table->double('jasa_pelayanan');
			$table->double('jasa_sarana');
			$table->string('satuan', 191)->index();
			$table->timestamps();
			$table->softDeletes();
			$table->integer('master_tarif_id')->unsigned()->nullable()->index();
			$table->integer('user_id')->unsigned()->nullable()->index();
			$table->integer('user_update')->unsigned()->nullable()->index();
		});
	}

	public function down()
	{
		Schema::drop('tarifs');
	}
}