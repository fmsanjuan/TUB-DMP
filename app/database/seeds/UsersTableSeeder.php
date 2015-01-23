<?php

class UsersTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('users')->delete();
        
        User::create(array(
            'username' => 'fab',
            'password' => Hash::make('arnez0'),
            'email' => 'fabian.fuerste@gmx.net',            
            'realname' => 'Fab Ian Fuerste',
            'institution_id' => 1,
            //'roles' =>  null,
            'admin' => 1,
            'active' => 1,
            'last_login' => DB::raw('NOW()')
        ));
        
        User::create(array(
            'username' => 'demo',
            'password' => Hash::make('demo123'),
            'email' => 'fab@schalljugend.net',            
            'realname' => 'Demo McTest',
            'institution_id' => 1,
            'admin' => 0,
            'active' => 1
        ));        
    }
}