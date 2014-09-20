<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateEnvironmentsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('environments', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('key');
			$table->string('value');
			$table->string('environment')->nullable();
			$table->integer('domain_id')->unsigned()->index();
            $table->foreign('domain_id')->references('id')->on('domains')->onDelete('cascade');
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
		Schema::drop('environments');
	}

}
