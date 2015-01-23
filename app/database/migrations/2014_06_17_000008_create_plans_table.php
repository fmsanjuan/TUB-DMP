<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePlansTable extends Migration {

    public function up()
    {
        Schema::dropIfExists('plans');
        
        Schema::create('plans', function(Blueprint $table)
        {
            $table
                    ->engine = 'InnoDB';
            
            $table
                    ->increments("id");

            $table
                    ->string("name");

            $table
                    ->string("project_number")
                    ->nullable();            
            
            $table
                    ->unsignedInteger("template_id");

            $table
                    ->unsignedInteger("user_id");
                        
            $table
                    ->boolean("active")
                    ->default(1);

            $table
                    ->timestamps();
            
            /*
            $table
                    ->softDeletes();
            */ 
        });
    }
    
    public function down()
    {        
        DB::statement('SET FOREIGN_KEY_CHECKS = 0');
        Schema::dropIfExists("plans");
        DB::statement('SET FOREIGN_KEY_CHECKS = 1');
    }
}
