<?php

class DatabaseSeeder extends Seeder
{
	public function run()
	{
		Eloquent::unguard();

        // Seed static data
        $this->command->info('SEEDING STATIC DATA ...');  
        $this->call('InstitutionsTableSeeder');       
		$this->call('TemplatesTableSeeder');
		$this->call('SectionsTableSeeder');
		$this->call('InputTypesTableSeeder');
        $this->call('FileTypesTableSeeder');
        $this->call('FileFormatsTableSeeder');
        
        $this->command->info('STATIC DATA COMPLETELY SEEDED!');        

        // Seed fake data
        $this->command->info('SEEDING FAKE DATA ...');  
		$this->call('UsersTableSeeder');
		$this->call('PlansTableSeeder');        
        $this->call('QuestionsTableSeeder');
        $this->call('QuestionOptionsTableSeeder');
        $this->call('TextAnswersTableSeeder');
        $this->call('OptionAnswersTableSeeder');
        $this->call('RangeAnswersTableSeeder');
        $this->call('ListAnswersTableSeeder');
        $this->call('QuestionAnswerRelTableSeeder');
        $this->command->info('FAKE DATA COMPLETELY SEEDED!'); 
	}
}