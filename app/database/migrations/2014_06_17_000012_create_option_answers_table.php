<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOptionAnswersTable extends Migration {

    public function up()
    {
        Schema::dropIfExists('option_answers');
        
        Schema::create('option_answers', function(Blueprint $table)
        {
            $table
                    ->engine = 'InnoDB';
            
            $table
                    ->increments("id");
            
            $table
                    ->unsignedInteger("plan_id");
            
            $table
                    ->unsignedInteger("question_id");
            
            $table
                    ->unsignedInteger("question_option_id")
                    ->nullable();
  
            $table
                    ->timestamps();
            
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
        Schema::dropIfExists("option_answers");
        DB::statement('SET FOREIGN_KEY_CHECKS = 1');
    }
}
