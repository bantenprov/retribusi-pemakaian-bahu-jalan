<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Kalnoy\Nestedset\NestedSet;

class CreatePbjTarifsTable extends Migration {

	public function up()
	{
		Schema::create('pbj_tarifs', function(Blueprint $table) {
			$table->increments('id');
			$table->string('uuid', 191)->unique();
			$table->string('uraian', 191)->unique();
			$table->boolean('tarif')->default(0);
			$table->double('wilayah_kota');
			$table->double('wilayah_kabupaten');
            NestedSet::columns($table);			
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
		Schema::drop('pbj_tarifs');
	}
}