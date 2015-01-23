<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInputTypesTable extends Migration {

    public function up()
    {
        Schema::dropIfExists('input_types');
        
        Schema::create('input_types', function(Blueprint $table)
        {
            $table
                    ->engine = 'InnoDB';
            
            $table
                    ->increments("id");
            
            $table
                    ->string("name");
            
            $table
                    ->string("method");
            
            /*
            $table
                    ->softDeletes();
            */ 
        });
    }
    
    public function down()
    {        
        DB::statement('SET FOREIGN_KEY_CHECKS = 0');
        Schema::dropIfExists("input_types");
        DB::statement('SET FOREIGN_KEY_CHECKS = 1');
    }
}
