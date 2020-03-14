<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateFdfsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('fdfs', function(Blueprint $table)
		{
			$table->bigInteger('id', true)->comment('主键');
			$table->string('name', 100)->nullable()->comment('名称');
			$table->string('size', 50)->nullable()->comment('大小');
			$table->string('group_name', 50)->comment('组名');
			$table->string('fast_file_id')->comment('fdfs_id');
			$table->boolean('type')->nullable()->comment('状态');
			$table->boolean('document_type')->nullable()->comment('文档类型');
			$table->bigInteger('create_id')->nullable()->comment('创建人id');
			$table->timestamp('create_time')->default(DB::raw('CURRENT_TIMESTAMP'))->comment('创建时间');
			$table->string('url')->nullable()->comment('地址');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('fdfs');
	}

}
