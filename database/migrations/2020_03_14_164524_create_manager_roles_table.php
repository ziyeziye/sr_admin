<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateManagerRolesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('manager_roles', function(Blueprint $table)
		{
			$table->integer('id', true)->comment('用户与角色对应关系主键');
			$table->integer('admin_id')->unsigned()->nullable()->comment('用户ID');
			$table->integer('role_id')->nullable()->comment('角色ID');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('manager_roles');
	}

}
