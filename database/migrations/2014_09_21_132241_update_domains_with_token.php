<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class UpdateDomainsWithToken extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('domains', function(Blueprint $table)
		{
			$table->string('token', 72)->nullable()->before('created_at');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('domains', function(Blueprint $table)
		{
			$table->dropColumn('token');
		});
	}

}
