<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateConfigsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('configs', function(Blueprint $table)
		{
			$table->bigInteger('id', true)->unsigned()->comment('系统配置信息主键');
			$table->string('param_key', 50)->nullable()->unique('param_key')->comment('key');
			$table->string('param_value', 2000)->nullable()->comment('value');
			$table->boolean('status')->nullable()->default(1)->comment('状态   0：隐藏   1：显示');
			$table->string('remark', 500)->nullable()->comment('备注');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('configs');
	}

}
