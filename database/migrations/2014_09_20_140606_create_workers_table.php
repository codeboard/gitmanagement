<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateWorkersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('workers', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('connection');
			$table->string('queue');
			$table->integer('maximum_seconds_per_job');
			$table->integer('rest_when_empty');
			$table->integer('maximum_tries')->nullable();
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
		Schema::drop('workers');
	}

}
