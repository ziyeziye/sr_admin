<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateOssTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('oss', function(Blueprint $table)
		{
			$table->bigInteger('id', true)->unsigned()->comment('文件上传主键');
			$table->string('url', 500)->nullable()->comment('URL地址');
			$table->timestamp('create_time')->default(DB::raw('CURRENT_TIMESTAMP'))->comment('创建时间');
			$table->boolean('document_type')->nullable()->comment('文档类型');
			$table->boolean('type')->nullable()->comment('状态');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('oss');
	}

}
