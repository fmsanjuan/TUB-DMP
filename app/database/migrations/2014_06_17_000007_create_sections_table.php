<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSectionsTable extends Migration {

    public function up()
    {
        Schema::dropIfExists('sections');
        
        Schema::create('sections', function(Blueprint $table)
        {
            $table
                    ->engine = 'InnoDB';
            
            $table
                    ->increments("id");
            
            $table
                    ->unsignedInteger("template_id")
                    ->nullable();
            
            $table
                    ->string("keynumber")
                    ->nullable();
            
            $table
                    ->smallInteger("order")
                    ->unsigned()
                    ->nullable();
            
            $table
                    ->string("name")
                    ->nullable();
            
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
        Schema::dropIfExists("sections");
        DB::statement('SET FOREIGN_KEY_CHECKS = 1');
    }
}
