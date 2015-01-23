<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTemplatesTable extends Migration {

    public function up()
    {
        Schema::dropIfExists('templates');
        
        Schema::create('templates', function(Blueprint $table)
        {
            $table
                    ->engine = 'InnoDB';
            
            $table
                    ->increments("id");
            
            $table
                    ->string("name")
                    ->nullable();
            
            $table
                    ->unsignedInteger("institution_id")
                    ->nullable();
            
            $table
                    ->boolean("active")
                    ->default(1);
            
            $table
                    ->nullableTimestamps();
            
            /*
            $table
                    ->softDeletes();
            */ 

        });
    }
    
    public function down()
    {        
        DB::statement('SET FOREIGN_KEY_CHECKS = 0');
        Schema::dropIfExists("templates");
        DB::statement('SET FOREIGN_KEY_CHECKS = 1');
    }
}
