<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateManagersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('managers', function(Blueprint $table)
		{
			$table->bigInteger('id', true)->unsigned()->comment('系统用户主键');
			$table->string('name', 50)->comment('用户名');
			$table->string('password', 100)->nullable()->comment('密码');
			$table->boolean('sex')->nullable()->default(1)->comment('性别0女1男');
			$table->string('email', 100)->nullable()->comment('邮箱');
			$table->string('mobile', 100)->nullable()->comment('手机号');
			$table->boolean('status')->nullable()->comment('状态  0：禁用   1：正常');
			$table->bigInteger('create_admin_id')->nullable()->comment('创建者ID');
			$table->timestamp('create_time')->default(DB::raw('CURRENT_TIMESTAMP'))->comment('创建时间');
			$table->timestamp('update_time')->default(DB::raw('CURRENT_TIMESTAMP'))->comment('更新时间');
			$table->string('remake', 100)->nullable()->comment('备注');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('managers');
	}

}
