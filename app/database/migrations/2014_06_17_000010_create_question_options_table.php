<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateQuestionOptionsTable extends Migration {

    public function up()
    {
        Schema::dropIfExists('question_options');
        
        Schema::create('question_options', function(Blueprint $table)
        {
            $table->engine = 'InnoDB';
            $table->increments("id");
            
            $table->unsignedInteger("question_id");
            
            $table
                    ->text("text");

            $table
                    ->text("value")
                    ->nullable();

            $table
                    ->boolean('default')
                    ->nullable();
            
            $table
                    ->unsignedInteger("parent_id")
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
        Schema::dropIfExists("question_options");
        DB::statement('SET FOREIGN_KEY_CHECKS = 1');
    }
}
