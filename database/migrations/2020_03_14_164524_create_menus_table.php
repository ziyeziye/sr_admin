<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateMenusTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('menus', function(Blueprint $table)
		{
			$table->bigInteger('id', true)->unsigned()->comment('菜单主键');
			$table->bigInteger('parent_id')->nullable()->comment('父菜单ID，一级菜单为0');
			$table->string('name', 50)->nullable()->comment('菜单名称');
			$table->string('url', 200)->nullable()->comment('菜单URL');
			$table->string('perms', 2000)->nullable()->comment('授权(多个用逗号分隔，如：user:list,user:create)');
			$table->boolean('type')->nullable()->comment('类型   0：目录   1：菜单   2：按钮');
			$table->string('icon', 50)->nullable()->comment('菜单图标');
			$table->integer('orders')->nullable()->comment('排序');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('menus');
	}

}
