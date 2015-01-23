<?php

use Carbon\Carbon;
use JMS\Serializer;

class AdminController extends BaseController {

	public function __construct()
	{
        $this->beforeFilter('auth');
	}
    
    public function index()
	{
        $templates = Template::all();
        //$internal_templates = Template::where('institution_id', '=', 1)->lists('name','id');
        //$external_templates = Template::where('institution_id', '!=', 1)->lists('name','id');
        //$template_selector = array('TU Berlin' => $internal_templates) + array('Andere Organisationen' => $external_templates);
        
        //$serializer = JMS\Serializer\SerializerBuilder::create()->build();        
        //$jsonContent = JMS\Serializer\SerializerBuilder::serialize($plans, 'json');        
        
        return View::make('admin.dashboard', compact('templates'));
	}

}