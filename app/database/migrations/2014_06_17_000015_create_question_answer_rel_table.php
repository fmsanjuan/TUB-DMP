<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateQuestionAnswerRelTable extends Migration {

    public function up()
    {
        Schema::dropIfExists('question_answer_rel');
        
        Schema::create('question_answer_rel', function(Blueprint $table)
        {
            $table
                    ->engine = 'InnoDB';
            
            $table
                    ->unsignedInteger("plan_id");     
            
            $table
                    ->unsignedInteger("question_id");
            
            $table
                    ->unsignedInteger("user_id");        
            
            $table
                    ->unsignedInteger("text_answer_id")
                    ->nullable();                    

            $table
                    ->unsignedInteger("option_answer_id")
                    ->nullable();  
            
            $table
                    ->unsignedInteger("range_answer_id")
                    ->nullable();
            
            $table
                    ->unsignedInteger("list_answer_id")
                    ->nullable();
            
            $table
                    ->nullableTimestamps();
            
            /*
            $table
                    ->softDeletes();
            */ 
         
        });
        
        //DB::unprepared();
    }
    
    public function down()
    {        
        DB::statement('SET FOREIGN_KEY_CHECKS = 0');
        Schema::dropIfExists("question_answer_rel");
        DB::statement('SET FOREIGN_KEY_CHECKS = 1');
    }
}
