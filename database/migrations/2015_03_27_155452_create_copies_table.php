<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCopiesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('copies', function(Blueprint $table)
		{
            $table->increments('id');
            $table->integer('biblio_id')->unsigned();
            $table->foreign('biblio_id')->references('id')->on('biblios')->onDelete('cascade');
            $table->integer('barcode')->unique();
            $table->integer('user_id')->nullable();
            $table->integer('status_id')->default(1);
            $table->timestamps();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('copies');
	}

}
