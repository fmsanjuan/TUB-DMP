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
            'external' => 0
        ));

        Institution::create(array(
            'name' => 'innoCampus',
            'url' => 'http://innocampus.tu-berlin.de',
            'logo' => 'logo-innocampus.png',
            'external' => 0
        ));
        
        
        Institution::create(array(
            'name' => 'DFG',
            'url' => 'http://www.dfg.de',
            'logo' => 'logo-dfg.png',
            'external' => 1
        ));

        Institution::create(array(
            'name' => 'BMBF',
            'url' => 'http://www.bmbf.de',
            'logo' => 'logo-bmbf.png',
            'external' => 1
        ));
        
    }
}