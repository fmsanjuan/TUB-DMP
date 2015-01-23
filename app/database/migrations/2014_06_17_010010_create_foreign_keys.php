<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateForeignKeys extends Migration {

    public function up()
    {
        
        Schema::table('templates', function(Blueprint $table)
        {
            $table
                    ->foreign('institution_id')
                    ->references('id')
                    ->on('institutions')
                    ->onDelete('set null');
        });
        
        Schema::table('sections', function(Blueprint $table)
        {
            $table
                    ->foreign('template_id')
                    ->references('id')
                    ->on('templates');
        });
        
        Schema::table('questions', function(Blueprint $table)
        {
            $table
                    ->foreign('template_id')
                    ->references('id')
                    ->on('templates');
            
            $table
                    ->foreign('section_id')
                    ->references('id')
                    ->on('sections')
                    ->onDelete('set null');
            
            $table
                    ->foreign('input_type_id')
                    ->references('id')
                    ->on('input_types');
        });
        
        Schema::table('question_options', function(Blueprint $table)
        {
            $table
                    ->foreign('question_id')
                    ->references('id')
                    ->on('questions');
            
        });
        
        Schema::table('users', function(Blueprint $table)
        {
            $table
                    ->foreign('institution_id')
                    ->references('id')
                    ->on('institutions');
                 
        });
        
        Schema::table('plans', function(Blueprint $table)
        {
            $table
                    ->foreign('template_id')
                    ->references('id')
                    ->on('institutions');

            $table
                    ->foreign('user_id')
                    ->references('id')
                    ->on('users');
                 
        });
        
        Schema::table('text_answers', function(Blueprint $table)
        {
            $table
                    ->foreign('plan_id')
                    ->references('id')
                    ->on('plans');
            
            $table
                    ->foreign('question_id')
                    ->references('id')
                    ->on('questions');
            
        });
        
        Schema::table('option_answers', function(Blueprint $table)
        {
            $table
                    ->foreign('plan_id')
                    ->references('id')
                    ->on('plans');
            
            $table
                    ->foreign('question_id')
                    ->references('id')
                    ->on('questions');
            
            $table
                    ->foreign('question_option_id')
                    ->references('id')
                    ->on('question_options');
            
        });
        
        Schema::table('range_answers', function(Blueprint $table)
        {
            $table
                    ->foreign('plan_id')
                    ->references('id')
                    ->on('plans');
            
            $table
                    ->foreign('question_id')
                    ->references('id')
                    ->on('questions');
            
        });
        
        Schema::table('list_answers', function(Blueprint $table)
        {
            $table
                    ->foreign('plan_id')
                    ->references('id')
                    ->on('plans');
            
            $table
                    ->foreign('question_id')
                    ->references('id')
                    ->on('questions');            
        });
        
        Schema::table('question_answer_rel', function(Blueprint $table)
        {
            
            $table
                    ->foreign('plan_id')
                    ->references('id')
                    ->on('plans');
            
            $table
                    ->foreign('question_id')
                    ->references('id')
                    ->on('questions');
            
            $table
                    ->foreign('text_answer_id')
                    ->references('id')
                    ->on('text_answers');
            
            $table
                    ->foreign('option_answer_id')
                    ->references('id')
                    ->on('option_answers');
            
            $table
                    ->foreign('range_answer_id')
                    ->references('id')
                    ->on('range_answers');
            
            $table
                    ->foreign('list_answer_id')
                    ->references('id')
                    ->on('list_answers');
            
            $table
                    ->foreign('user_id')
                    ->references('id')
                    ->on('users');
            
        });         
        
        
    }
    
    public function down()
    {        
        Schema::table('sections', function(Blueprint $table)
        {
            $table->dropForeign('sections_template_id_foreign');
        });
        
        Schema::table('questions', function(Blueprint $table)
        {
            $table->dropForeign('questions_template_id_foreign');            
            $table->dropForeign('questions_section_id_foreign');
            $table->dropForeign('questions_input_type_id_foreign');            
        });
        
        Schema::table('question_options', function(Blueprint $table)
        {
            $table->dropForeign('question_options_question_id_foreign');            
        });
        
        Schema::table('templates', function(Blueprint $table)
        {
            $table->dropForeign('templates_institution_id_foreign');
        });
        
        Schema::table('users', function(Blueprint $table)
        {
            $table->dropForeign('users_institution_id_foreign');
        });
        
        Schema::table('plans', function(Blueprint $table)
        {
            $table->dropForeign('plans_template_id_foreign');
            $table->dropForeign('plans_user_id_foreign');            
        });
        
        Schema::table('text_answers', function(Blueprint $table)
        {
            $table->dropForeign('text_answers_plan_id_foreign');
            $table->dropForeign('text_answers_question_id_foreign');
        });
        
        Schema::table('option_answers', function(Blueprint $table)
        {
            $table->dropForeign('option_answers_plan_id_foreign');
            $table->dropForeign('option_answers_question_id_foreign');
            $table->dropForeign('option_answers_question_option_id_foreign');            
        });
        
        Schema::table('range_answers', function(Blueprint $table)
        {
            $table->dropForeign('range_answers_plan_id_foreign');
            $table->dropForeign('range_answers_question_id_foreign');
        });
        
        Schema::table('list_answers', function(Blueprint $table)
        {
            $table->dropForeign('list_answers_plan_id_foreign');
            $table->dropForeign('list_answers_question_id_foreign');
        });
        
        Schema::table('question_answer_rel', function(Blueprint $table)
        {
            $table->dropForeign('question_answer_rel_plan_id_foreign');
            $table->dropForeign('question_answer_rel_question_id_foreign');
            $table->dropForeign('question_answer_rel_text_answer_id_foreign');
            $table->dropForeign('question_answer_rel_option_answer_id_foreign');
            $table->dropForeign('question_answer_rel_range_answer_id_foreign');
            $table->dropForeign('question_answer_rel_list_answer_id_foreign');
            $table->dropForeign('question_answer_rel_user_id_foreign');            
        });
        
        
        
        
    }
}
