<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFileTypesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
        Schema::dropIfExists('file_types');
        
		Schema::create('file_types', function(Blueprint $table)
        {
            $table
                    ->engine = 'InnoDB';            
            
            $table
                    ->increments('id');            
            
            $table
                    ->string('name');  
            
            $table
                    ->string('extension')
                    ->nullable();  
            
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
		Schema::dropIfExists('file_types');
        DB::statement('SET FOREIGN_KEY_CHECKS = 1');
	}

}