<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateRolesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('roles', function(Blueprint $table)
		{
			$table->bigInteger('id', true)->unsigned()->comment('角色主键');
			$table->string('role_name', 100)->nullable()->comment('角色名称');
			$table->string('remark', 100)->nullable()->comment('备注');
			$table->bigInteger('create_admin_id')->nullable()->comment('创建者ID');
			$table->timestamp('create_time')->default(DB::raw('CURRENT_TIMESTAMP'))->comment('创建时间');
			$table->bigInteger('update_admin_id')->nullable()->comment('更新人ID');
			$table->timestamp('update_time')->default(DB::raw('CURRENT_TIMESTAMP'))->comment('更新时间');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('roles');
	}

}
