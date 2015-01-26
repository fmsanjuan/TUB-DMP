<?php

class InstitutionsTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('institutions')->delete();
        
        Institution::create(array(
            'name' => 'Technische Universität zu Berlin',
            'url' => 'http://www.tu-berlin.de',
            'logo' => 'logo-tu.png',
            'external' => 0,
            'active' => 1
        ));

        Institution::create(array(
            'name' => 'DCC',
            'url' => 'http://www.dcc.ac.uk',
            'logo' => 'logo-dcc.png',
            'external' => 1,
            'active' => 1
        ));
        
        
        Institution::create(array(
            'name' => 'DFG',
            'url' => 'http://www.dfg.de',
            'logo' => 'logo-dfg.png',
            'external' => 1,
            'active' => 0
        ));

        Institution::create(array(
            'name' => 'BMBF',
            'url' => 'http://www.bmbf.de',
            'logo' => 'logo-bmbf.png',
            'external' => 1,
            'active' => 0
        ));
        
    }
}