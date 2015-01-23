<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration {

    public function up()
    {
        Schema::dropIfExists('users');
        
        Schema::create('users', function(Blueprint $table)
        {
            $table->engine = 'InnoDB';
            $table->increments("id");
            $table->string("username");
            $table->string("password");
            $table->string("remember_token",100)->nullable();
            $table->string("email")->nullable();
            $table->string("realname")->nullable();
            $table->unsignedInteger("institution_id");
            $table->boolean("admin")->default(0);
            $table->boolean("active")->default(1);
            $table->dateTime('last_login')->nullable();
            $table->nullableTimestamps();
        });
    }
    
    public function down()
    {        
        DB::statement('SET FOREIGN_KEY_CHECKS = 0');
        Schema::dropIfExists("users");
        DB::statement('SET FOREIGN_KEY_CHECKS = 1');
    }
}
