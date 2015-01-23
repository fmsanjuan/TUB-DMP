<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateQuestionsTable extends Migration {

    public function up()
    {
        Schema::dropIfExists('questions');
        
        Schema::create('questions', function(Blueprint $table)
        {
            $table->engine = 'InnoDB';
            $table->increments("id");
            
            $table
                    ->unsignedInteger("template_id")
                    ->nullable();
            
            $table
                    ->unsignedInteger("section_id")
                    ->nullable();
            
            $table
                    ->string("keynumber")
                    ->nullable();
            
            $table
                    ->smallInteger("order")
                    ->unsigned()
                    ->nullable();
            
            $table
                    ->unsignedInteger("parent_question_id")
                    ->nullable();
            
            $table
                    ->text('text')
                    ->nullable();
            
            $table
                    ->unsignedInteger('input_type_id')
                    ->default(1);
            
            $table
                    ->text('value')
                    ->nullable();
            
            $table
                    ->text('prepend')
                    ->nullable();
            
            $table
                    ->text('append')
                    ->nullable();
            
            $table
                    ->text('comment')
                    ->nullable();
            
            $table
                    ->text('reference')
                    ->nullable();
            
            $table
                    ->text('guidance')
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
        Schema::dropIfExists("questions");
        DB::statement('SET FOREIGN_KEY_CHECKS = 1');
    }
}
