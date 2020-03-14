<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateRoleMenusTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('role_menus', function(Blueprint $table)
		{
			$table->bigInteger('id', true)->unsigned()->comment('角色与菜单对应关系主键');
			$table->bigInteger('role_id')->nullable()->comment('角色ID');
			$table->bigInteger('menu_id')->nullable()->comment('菜单ID');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('role_menus');
	}

}
