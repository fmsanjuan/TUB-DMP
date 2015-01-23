<?php

use Carbon\Carbon;
use JMS\Serializer;

class DashboardController extends BaseController {

	public function __construct()
	{
        //$this->beforeFilter('auth');
	}
    
    public function index()
	{
        $templatesArr = Template::all()->toArray();
        $internal_templates = Template::where('institution_id', '=', 1)->lists('name','id');
        $external_templates = Template::where('institution_id', '!=', 1)->lists('name','id');
        $template_selector = array('TU Berlin' => $internal_templates) + array('Andere Organisationen' => $external_templates);
        $plans = Plan::where('user_id', '=', Auth::user()->id)->get();
        //$serializer = JMS\Serializer\SerializerBuilder::create()->build();        
        //$jsonContent = JMS\Serializer\SerializerBuilder::serialize($plans, 'json');        
        
        return View::make('dashboard', compact('plans','templatesArr', 'template_selector'));
	}

}