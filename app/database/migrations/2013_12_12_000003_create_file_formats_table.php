<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFileFormatsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::dropIfExists('file_formats');
        
        Schema::create('file_formats', function(Blueprint $table)
        {
            $table
                    ->engine = 'InnoDB';            
            
            $table
                    ->increments('id');            
            
            $table
                    ->string('name',25);           
            
            $table
                    ->nullableTimestamps();
            
            /*
            $table
                    ->softDeletes();
            */ 
        });
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
        DB::statement('SET FOREIGN_KEY_CHECKS = 0');
		Schema::dropIfExists('file_formats');
        DB::statement('SET FOREIGN_KEY_CHECKS = 1');
	}

}