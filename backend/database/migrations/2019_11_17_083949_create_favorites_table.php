<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFavoritesTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('favorites', function (Blueprint $table) {
			$table->bigIncrements('id');
			$table->integer('category_id')->unsigned();
			$table->string('name');
			$table->string('artist');
			$table->timestamps();

			$table->foreign('category_id')
			->references('id')
			->on('categories')
			->onDelete('cascade');        });
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::dropIfExists('favorites');
	}
}
