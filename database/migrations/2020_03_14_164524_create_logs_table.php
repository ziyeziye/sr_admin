<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateLogsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('logs', function(Blueprint $table)
		{
			$table->bigInteger('id', true)->unsigned()->comment('系统日志主键');
			$table->string('user_name', 50)->nullable()->comment('用户名');
			$table->string('operation', 50)->nullable()->comment('用户操作');
			$table->string('method', 10)->nullable()->comment('请求方法');
			$table->string('params', 5000)->nullable()->comment('请求参数');
			$table->string('response', 5000)->nullable()->comment('响应');
			$table->string('ip', 64)->nullable()->comment('IP地址');
			$table->timestamp('create_time')->default(DB::raw('CURRENT_TIMESTAMP'))->comment('创建时间');
			$table->string('old', 5000)->nullable()->comment('旧信息');
			$table->string('url', 1000)->nullable()->comment('请求地址');
			$table->string('action', 200)->nullable();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('logs');
	}

}
