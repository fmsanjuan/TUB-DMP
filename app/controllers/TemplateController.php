<?php

class TemplateController extends BaseController {
    
    public function __construct()
	{
        $this->beforeFilter('auth');
	}
    
    public function editTemplate( $template_id ) {
        $template = Template::where( 'id', $template_id )->first();
        if( count( $template ) ) {
            //$template = Template::where( 'id', $plan->template_id )->first();
            $sections = Section::where( 'template_id', $template->id )->orderby('order')->get();
            $questions = Question::where( 'template_id', $template->id )->where( 'text', '!=', '' )->get();
            //$filetype_selector = Template::getFileTypes();
            
            Debugbar::info($sections);
            
            Session::flash('flash_success', 'Template geladen.');
            return View::make( 'admin.template.edit', compact('template','sections','questions'));
        } else {
            Session::flash('flash_error', 'Kein Template mit ID ' . $project_number);
            return Redirect::route('admin.dashboard');
        }        
    }    

    
    public function createPlan() {
        $plan = Plan::where( 'project_number', Input::get('project_number') )->first();
        
        if( !count($plan) ) {
            $new_plan = new Plan;
            // FIX ME with real template values
            $new_plan->template_id = Input::get('plan_template');
            $new_plan->user_id = Auth::user()->id;
            $new_plan->project_number = Input::get('project_number');
            $new_plan->save();
            
            Session::flash('flash_success', 'Plan für Projekt ' . Input::get('project_number') . ' erstellt!');
            return Redirect::route('edit_plan', array( 'project_number' => Input::get('project_number') ));
           
        } else {
            Session::flash('flash_error', 'Es existiert bereits ein Plan mit Projektnummer ' . Input::get('project_number'));
            return Redirect::route('dashboard');        
        }
        
        
    }

    public function saveTemplate() {
        $template = Template::where( 'template_id', Input::get('template_id') )->first();
        if( count( $template ) ) {
            Session::flash('flash_success', 'Template erfolgreich gespeichert.');
            return Redirect::route('edit_template', array( 'template_id' => $template->id ));
        } else {
            // Session::flash('flash_error', 'Kein Plan mit Projektnummer ' . $project_number);
            return Redirect::route('dashboard', array( 'template_id' => $template->id ));
        }
    }    
    
    public function saveAjaxPlan() {
        $plan = Plan::where( 'project_number', Input::get('project_number') )->first();
        
        if( count($plan) )
        {
            foreach( Input::get() as $question_alias => $input_answer )
            {  
                if( $question_alias != '_token' && $question_alias != 'project_number' )
                {
                    // [0] => section_id
                    // [1] => question_id
                    $question_alias = explode('-', $question_alias);
                    
                    $existing_answer_relation = QuestionAnswerRel
                        ::where('question_id', '=', $question_alias[1])
                        ->where('plan_id', '=', $plan->id)
                        ->delete();
                    
                    if( is_array( $input_answer ) )
                    {   
                        // does this question has question options?
                        $question_options = QuestionOption
                            ::where('question_id', '=', $question_alias[1])
                            ->count();
                        
                        if( $question_options > 0 )
                        {
                            $existing_option_answers = OptionAnswer
                                ::where('question_id', '=', $question_alias[1])
                                ->delete();

                            foreach( $input_answer as $answer_option )
                            {
                                $new_option_answer = new OptionAnswer;
                                $new_option_answer->plan_id = $plan->id;
                                $new_option_answer->question_id = $question_alias[1];
                                $new_option_answer->question_option_id = $answer_option;
                                $new_option_answer->save();

                                $new_question_answer_rel = new QuestionAnswerRel;
                                $new_question_answer_rel->plan_id = $plan->id;
                                $new_question_answer_rel->question_id = $question_alias[1];
                                $new_question_answer_rel->user_id = Auth::user()->id;
                                $new_question_answer_rel->option_answer_id = $new_option_answer->id;
                                $new_question_answer_rel->save();
                            }    
                        }
                        else
                        {
                            if( count( $input_answer ) > 0 )
                            {
                                $compiled_input_answer = $input_answer[0] . '|' . $input_answer[1];
                                                            
                                $new_answer = new TextAnswer;
                                $new_answer->plan_id = $plan->id;
                                $new_answer->question_id = $question_alias[1];
                                $new_answer->text = $compiled_input_answer;
                                $new_answer->save();
                                
                                $new_question_answer_rel = new QuestionAnswerRel;
                                $new_question_answer_rel->plan_id = $plan->id;
                                $new_question_answer_rel->question_id = $question_alias[1];
                                $new_question_answer_rel->user_id = Auth::user()->id;
                                $new_question_answer_rel->answer_id = $new_answer->id;
                                $new_question_answer_rel->save();                                
                            }
                            
                        }
                    }
                    else
                    {
                        if( $input_answer != '' )
                        {
                            $existing_answer = TextAnswer
                                ::where('question_id', '=', $question_alias[1])
                                ->delete();
                        
                            $new_answer = new TextAnswer;
                            $new_answer->plan_id = $plan->id;
                            $new_answer->question_id = $question_alias[1];
                            $new_answer->text = $input_answer;
                            $new_answer->save();

                            $new_question_answer_rel = new QuestionAnswerRel;
                            $new_question_answer_rel->plan_id = $plan->id;
                            $new_question_answer_rel->question_id = $question_alias[1];
                            $new_question_answer_rel->user_id = Auth::user()->id;
                            $new_question_answer_rel->answer_id = $new_answer->id;
                            $new_question_answer_rel->save();
                        }
                        
                    }                        

                    
                }
            }
            /*
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
                    $this_answer->update(array( 'text' => $answer_text ));
                } else {
                    $this_answer = new TextAnswer;
                    $this_answer->plan_id = $plan->id;
                    $this_answer->question_input_id = $question_alias[1];
                    $this_answer->user_id = Auth::user()->id;
                    $this_answer->text = $answer_text;
                    $this_answer->save();                    
                }                
            }
            */
            
            $responses = Event::fire('plan.save', array( $plan->id ));

            // TODO: Mail an Admin            
            Session::flash('flash_success', 'Plan für Projektnummer ' . $plan->project_number . ' erfolgreich gespeichert.');
            return View::make('plan.partials.plan_save_status', array( 'project_number' => $plan->project_number ));            
        }
        else
        {
            // TODO: Mail an Admin
            Session::flash('flash_error', 'Beim Speichern des Plans für Projektnummer ' . $plan->project_number . ' ist ein Fehler aufgetreten.');
            return View::make('plan.partials.plan_save_status', array( 'project_number' => $plan->project_number ));            
        }
    }

    
    
}
