<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBibliosTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
    {
        Schema::create('biblios', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            $table->string('subTitle');
            $table->integer('isbn');
            $table->string('publisher');
            $table->date('publishedDate');
            $table->string('author');
            $table->string('thumbnail');
            $table->string('description');
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
		Schema::drop('biblios');
	}

}
