<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInstitutionsTable extends Migration {

    public function up()
    {
        Schema::dropIfExists('institutions');
        
        Schema::create('institutions', function(Blueprint $table)
        {
            $table->engine = 'InnoDB';
            $table->increments("id");
            
            $table
                    ->string("name")
                    ->nullable();
            
            $table
                    ->string("url")
                    ->nullable();
            
            $table
                    ->string("logo")
                    ->nullable();
            
            $table
                    ->boolean("external")
                    ->default(0);
            
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
        Schema::dropIfExists("institutions");
        DB::statement('SET FOREIGN_KEY_CHECKS = 1');
    }
}
