<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateRepositoriesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('repositories', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('url');
			$table->string('branch');
			$table->boolean('run_composer')->default(1);
			$table->boolean('run_migrations')->default(0);
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
		Schema::drop('repositories');
	}

}
