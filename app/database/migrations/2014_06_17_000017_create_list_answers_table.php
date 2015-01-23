<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateListAnswersTable extends Migration {

    public function up()
    {
        Schema::dropIfExists('list_answers');
        
        Schema::create('list_answers', function(Blueprint $table)
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
                    ->string("text", 255)
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
        Schema::dropIfExists("list_answers");
        DB::statement('SET FOREIGN_KEY_CHECKS = 1');
    }
}
