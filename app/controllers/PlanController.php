<?php

class PlanController extends BaseController
{
    
    public function __construct()
	{
        $this->beforeFilter('auth');
        $this->beforeFilter('plan_owner');
	}
    
    public function show( $project_number )
    {
        $plan = Plan::getPlan( $project_number );
        
        if( count($plan) )
        {
            $sections = Section::getPlanSections( $plan->template_id );
            $questions = Template::getQuestions( $plan->template_id );

            Session::flash('flash_success', 'Fragen geladen.');
            
            return View::make( 'plan.show', compact('plan','template','sections','questions','question_inputs','answers'));          
        }
        else
        {
            return 'Kann keinen Plan mit dieser Projektnummer finden';                    
        }
    }    
    
    public function edit( $project_number )
    {
        $plan = Plan::where( 'project_number', $project_number )->first();
        if( count($plan) )
        {
            $template = Template::where( 'id', $plan->template_id )->first();
            $sections = Section::where( 'template_id', $template->id )->orderby('order')->get();
            $questions = Question::where( 'template_id', $template->id )->whereNull( 'parent_question_id' )->where( 'text', '!=', '' )->get();
            $question_count = $questions->count();
            $answer_count = QuestionAnswerRel::getAnswerCount( $plan );
            $question_answer_percentage = round( ($answer_count / $question_count) * 100 );
            
            //$filetype_selector = Template::getFileTypes();
            
            Session::flash('flash_success', 'Fragen geladen.');
            return View::make( 'plan.edit', compact('plan','template','sections','questions','answers', 'question_count', 'answer_count', 'question_answer_percentage'));
        }
        else
        {
            Session::flash('flash_error', 'Kein Plan mit Projektnummer ' . $project_number);
            return Redirect::route('dashboard');
        }        
    }    

    public function export( $project_number, $format = null )
    {
        $plan = Plan::where( 'project_number', $project_number )->first();
        if( count($plan) )
        {
            if( !is_null($format) )
            {
                switch( $format )
                {
                    case 'word':
                        return Exporters::getDOCX( $plan );
                        break;
                    case 'openoffice':
                        return Exporters::getOTF( $plan );
                        break;
                    case 'html':
                        return Exporters::getHTML( $plan );
                        break;
                    case 'rtf':
                        return Exporters::getRTF( $plan );
                        break;
                    case 'pdf':
                        return Exporters::getPDF( $plan );
                        break;
                    case 'xml':
                        $document = new PhpWord();
                        break;
                    default:
                        return $format;
                        break;
                }
            }
            else
            {
                return View::make( 'plan.export', compact('plan') );
            }
        }
        else
        {
            return 'Kann keinen Plan mit dieser Projektnummer finden';            
        }
    } 

    public function create()
    {
        $plan = Plan::where( 'project_number', Input::get('project_number') )->first();
        
        if( !count($plan) )
        {
            $new_plan = new Plan;
            // FIX ME with real template values
            $new_plan->template_id = Input::get('plan_template');
            $new_plan->user_id = Auth::user()->id;
            $new_plan->project_number = Input::get('project_number');
            $new_plan->save();
            
            Session::flash('flash_success', 'Plan für Projekt ' . Input::get('project_number') . ' erstellt!');
            return Redirect::route('edit_plan', array( 'project_number' => Input::get('project_number') ));
           
        }
        else
        {
            Session::flash('flash_error', 'Es existiert bereits ein Plan mit Projektnummer ' . Input::get('project_number'));
            return Redirect::route('dashboard');        
        }
        
        
    }

    public function getPDF( $project_number )
    {
        $download = Input::get('download');
        $plan = Plan::where( 'project_number', $project_number )->first();
        
        if( count($plan) )
        {
            $plan_date = $plan->updated_at->format('d.m.Y');
            $plan_author = $plan->user->realname;
            $plan_institution = $plan->user->institution->name;
            $plan_filename = 'DMP-' . $project_number . '_' . $plan->updated_at->format('Ymd') . '.pdf';
            $template = Template::where( 'id', $plan->template_id )->first();
            $sections = Section::where( 'template_id', $template->id )->orderby('order')->get();
            $questions = Question::where( 'template_id', $template->id )->whereNull( 'parent_question_id' )->where( 'text', '!=', '' )->get();
            
            $pdf = PDF::loadView( 'plan.pdf', compact('plan', 'template', 'sections', 'questions', 'plan_date', 'plan_author', 'plan_institution') );            
            if( $download == 1 ) {
                return $pdf->download( $plan_filename );                
            } else {
                return $pdf->stream( $plan_filename );                 
            }
        }
        else
        {
            return 'Kann keinen Plan mit dieser Projektnummer finden';            
        }            
    } 
    
    // FIXME: XML-Response has no XML-header
    public function getXML( $project_number ) {        
        $plan = Plan::where( 'project_number', $project_number )->first();
        if( count($plan) )
        {
            $plan_date = $plan->updated_at->format('d.m.Y');
            $plan_filename = 'DMP-' . $project_number . '_' . $plan->updated_at->format('Ymd') . '.pdf';
            $template = Template::where( 'id', $plan->template_id )->first();
            $institution = Institution::where( 'id', $template->institution_id )->first();            
            $sections = Section::where( 'template_id', $template->id )->orderby('order')->get();
            $questions = Question::where( 'template_id', $template->id )->where( 'text', '!=', '' )->get();            
            $xml = View::make( 'plan.xml', compact('plan','template','institution','sections','questions','answers'));
            return Response::make($xml, 200, array('content-type' => 'application/xml'));

        }
        else
        {
            return 'Kann keinen Plan mit dieser Projektnummer finden';            
        }            
    }
    
    public function emailPDF( $project_number ) {
        
        //$attachment = Swift_Attachment::fromPath(URL::to_asset('pdf/test.pdf'));
        //$attachment = Swift_Attachment::newInstance( 'doobeedoo' , 'my-file.pdf', 'application/pdf');
        
        //$pdf_attachment = getPDF( $project_number );
        //File::put('')
        // write pdf file á la DMP-PROJECTNUMBER-DATETIMESTAMP.pdf
        File::put('/srv/dmp/files/DMP-' . $project_number . '.txt', 'Hello');
        
        Mail::send('plan.email', array( $project_number ), function($message) {
            $message->from('team@dmp.tu-berlin.de', 'DMP');
            $message->to('fabian.fuerste@tu-berlin.de', 'Fabian Fürste');
            //$message->cc('fabian.fuerste@tu-berlin.de', 'Fabian Fürste');
            $message->subject('Ihr Datenmanagementplan');
            //$message->to('foo@example.com')->cc('bar@example.com');
            //$message->attach( Swift_Attachment::newInstance( 'doobeedoo' , 'my-file.pdf', 'application/pdf') );
        });
        
        Session::flash('flash_success', 'Plan erfolgreich an ' . Auth::user()->email . ' versandt.');
        return Redirect::route('export_plan', array( 'project_number' => $project_number ));
    }

    
    
    public function ajaxTest() {
        $flash_title = Input::get('flash_title');        
        $flash_type = Input::get('flash_type');
        return 'Link clicked. Ajax works with: ' . $flash_title . ' ( ' . $flash_type .  ' ) ';                    
    }
    
    public function savePlan() {
        $plan = Plan::where( 'project_number', Input::get('project_number') )->first();
        if( count($plan) ) {
            
            // get only the question/answer params from the Input::get-Params
            $params = array_intersect_key( Input::get(), array_flip(preg_grep('/[0-9]+\-[0-9]+/', array_keys( Input::get() ), 0)));

            // convert multi-fields like checkboxes, radio buttons (and dateranges!) to "|"-separated strings            
            foreach( $params as $question_alias => $answer_text ) {
                if( is_array($answer_text) ) {
                    $answer_text = implode( '|', $answer_text );
                }
                
                // [0] => plan_id
                // [1] => question_input_id                
                $question_alias = explode('-', $question_alias);

                $this_answer = TextAnswer::where('plan_id', '=', $plan->id)
                                     ->where('question_input_id', '=', $question_alias[1])
                                     ->where('user_id', '=', Auth::user()->id)->first();

                if( count($this_answer) > 0 ) {
                    $this_answer->update(array( 'text'=> $answer_text ));
                } else {
                    $this_answer = new TextAnswer;
                    $this_answer->plan_id = $plan->id;
                    $this_answer->question_input_id = $question_alias[1];
                    $this_answer->user_id = Auth::user()->id;
                    $this_answer->text = $answer_text;
                    $this_answer->save();                    
                }                
            }
            
            Session::flash('flash_success', 'Plan erfolgreich gespeichert.');
            return Redirect::route('edit_plan', array( 'project_number' => $plan->project_number ));
        } else {
            // Session::flash('flash_error', 'Kein Plan mit Projektnummer ' . $project_number);
            return Redirect::route('dashboard', array( 'project_number' => $plan->project_number ));
        }
    }    
    
    public function saveAjaxPlan()
    {
        $plan = Plan::where( 'project_number', Input::get('project_number') )->first();
        
        if( count($plan) )
        {
            // Delete all existing answers for the plan since they are replaced
            $existing_answer_relation = QuestionAnswerRel::where('plan_id', '=', $plan->id)->delete();
            $existing_text_answer = TextAnswer::where('plan_id', '=', $plan->id)->delete();            
            $existing_option_answers = OptionAnswer::where('plan_id', '=', $plan->id)->delete();
            $existing_range_answers = RangeAnswer::where('plan_id', '=', $plan->id)->delete();
            $existing_list_answers = ListAnswer::where('plan_id', '=', $plan->id)->delete();
            
            foreach( Input::get() as $question_id => $input_answer )
            {
                //Debugbar::info( $question_id . ' => ');
                //Debugbar::info( $input_answer );
                
                if( $question_id != '_token' && $question_id != 'project_number' )
                {
                    // every input_answer is an array
                    if( is_array( $input_answer ) && count( $input_answer ) > 1 )
                    {
                        // FIX ME LATER:
                        // Input Type is specified in array field 0
                        $save_method = $input_answer[0];
                        array_splice( $input_answer, 0, 1 );
                        
                        switch( $save_method )
                        {
                            case 'option':
                                if( count( $input_answer ) > 0 )
                                {
                                    foreach( $input_answer as $answer_option )
                                    {    
                                        $question_options = QuestionOption::where('question_id', '=', $question_id)->where('id', '=', $answer_option)->count();
                                        if( $question_options > 0 )
                                        {
                                            $new_option_answer = new OptionAnswer;
                                            $new_option_answer->plan_id = $plan->id;
                                            $new_option_answer->question_id = $question_id;
                                            $new_option_answer->question_option_id = $answer_option;
                                            $new_option_answer->save();
                                            
                                            $new_question_answer_rel = new QuestionAnswerRel;
                                            $new_question_answer_rel->plan_id = $plan->id;
                                            $new_question_answer_rel->question_id = $question_id;
                                            $new_question_answer_rel->user_id = Auth::user()->id;
                                            $new_question_answer_rel->option_answer_id = $new_option_answer->id;
                                            $new_question_answer_rel->save();
                                            //Debugbar::info( $new_option_answer );
                                        }
                                    }
                                }
                                break;
                                
                            case 'range':
                                if( !in_array( '',$input_answer ) )
                                {
                                    $new_range_answer = new RangeAnswer;
                                    $new_range_answer->plan_id = $plan->id;
                                    $new_range_answer->question_id = $question_id;
                                    $new_range_answer->alpha = $input_answer[0];
                                    $new_range_answer->omega = $input_answer[1];                                        
                                    $new_range_answer->save();

                                    $new_question_answer_rel = new QuestionAnswerRel;
                                    $new_question_answer_rel->plan_id = $plan->id;
                                    $new_question_answer_rel->question_id = $question_id;
                                    $new_question_answer_rel->user_id = Auth::user()->id;
                                    $new_question_answer_rel->range_answer_id = $new_range_answer->id;
                                    $new_question_answer_rel->save();
                                }
                                break;
                            
                            case 'list':
                                //Debugbar::info( $input_answer );
                                if( count( $input_answer ) > 0 )
                                {
                                    if( !in_array( '',$input_answer ) )
                                    {
                                        $answer_list_item_array = explode(',', $input_answer[0]);

                                        foreach( $answer_list_item_array as $answer_list_item )
                                        {
                                            $new_list_answer = new ListAnswer;
                                            $new_list_answer->plan_id = $plan->id;
                                            $new_list_answer->question_id = $question_id;
                                            $new_list_answer->text = $answer_list_item;
                                            $new_list_answer->save();

                                            $new_question_answer_rel = new QuestionAnswerRel;
                                            $new_question_answer_rel->plan_id = $plan->id;
                                            $new_question_answer_rel->question_id = $question_id;
                                            $new_question_answer_rel->user_id = Auth::user()->id;
                                            $new_question_answer_rel->list_answer_id = $new_list_answer->id;
                                            $new_question_answer_rel->save();  
                                        }
                                    }
                                }
                                break;    
                            
                            default:
                                if( $input_answer[0] != '' )
                                {
                                    $new_text_answer = new TextAnswer;
                                    $new_text_answer->plan_id = $plan->id;
                                    $new_text_answer->question_id = $question_id;
                                    $new_text_answer->text = $input_answer[0];
                                    $new_text_answer->save();
                                    
                                    $new_question_answer_rel = new QuestionAnswerRel;
                                    $new_question_answer_rel->plan_id = $plan->id;
                                    $new_question_answer_rel->question_id = $question_id;
                                    $new_question_answer_rel->user_id = Auth::user()->id;
                                    $new_question_answer_rel->text_answer_id = $new_text_answer->id;
                                    $new_question_answer_rel->save();                                    
                                    break;
                                }
                        }
                        
                        /*
                        $new_question_answer_rel = new QuestionAnswerRel;
                        $new_question_answer_rel->plan_id = $plan->id;
                        $new_question_answer_rel->question_id = $question_id;
                        $new_question_answer_rel->user_id = Auth::user()->id;
                        if( isset( $new_text_answer ) && !is_null( $new_text_answer ) ) $new_question_answer_rel->text_answer_id = $new_text_answer->id;
                        if( isset( $new_option_answer ) && !is_null( $new_option_answer ) ) $new_question_answer_rel->option_answer_id = $new_option_answer->id;                                
                        if( isset( $new_range_answer ) && !is_null( $new_range_answer ) ) $new_question_answer_rel->range_answer_id = $new_range_answer->id;
                        $new_question_answer_rel->save();
                        
                        unset( $new_text_answer );
                        unset( $new_option_answer );
                        unset( $new_range_answer );
                        */
                        
                    } // if( is_array( $input_answer ) && count( $input_answer ) > 1 )
                } // if( $question_id != '_token' && $question_id != 'project_number' )
            } // foreach( Input::get() as $question_id => $input_answer )
        } // if( count($plan) )
        else
        {
            return null;
        }
                    
        $responses = Event::fire('plan.save', array( $plan->id ));
        // TODO: Mail an Admin            
        Session::flash('flash_success', 'Plan für Projektnummer ' . $plan->project_number . ' erfolgreich gespeichert.');
        return View::make('plan.partials.plan_save_status', array( 'project_number' => $plan->project_number ));            
        
        // TODO: Mail an Admin
        //Session::flash('flash_error', 'Beim Speichern des Plans für Projektnummer ' . $plan->project_number . ' ist ein Fehler aufgetreten.');
        //return View::make('plan.partials.plan_save_status', array( 'project_number' => $plan->project_number ));            
    }   
}
