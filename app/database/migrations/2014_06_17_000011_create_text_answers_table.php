<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTextAnswersTable extends Migration {

    public function up()
    {
        Schema::dropIfExists('text_answers');
        
        Schema::create('text_answers', function(Blueprint $table)
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
                    ->text("text")
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
        Schema::dropIfExists("text_answers");
        DB::statement('SET FOREIGN_KEY_CHECKS = 1');
    }
}
