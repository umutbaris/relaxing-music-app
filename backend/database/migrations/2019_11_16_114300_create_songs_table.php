<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSongsTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('songs', function (Blueprint $table) {
			$table->increments('id');
			$table->integer('categories_id')->unsigned();
			$table->string('name');
			$table->string('artist');
			$table->timestamps();

			$table->foreign('categories_id')
			->references('id')
			->on('categories')
			->onDelete('cascade');
		});

	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::dropIfExists('songs');
	}
}
