<?php

App::error(function(Exception $exception, $code)
{
	Log::error($exception);
    Session::put('exception_url', URL::current());
    
    if( isset(Auth::user()->username) ) {
        $user = Auth::user()->username;
    } else {
        $user = 'Unbekannt';
    }
    
    Mail::send('admin.exception_email', array(
        'exception' => $exception,
        'code' => $code,
        'page' => Session::get('exception_url'),
        'user' => $user
    ), function($message) {
        $message->from('dmp@dmp.tu-berlin.de', 'DMP');
        $message->to('fabian.fuerste@tu-berlin.de', 'Fabian Fürste');
        //$message->to('dmp@dmp.tu-berlin.de', 'OTRS Ticket System');
        $message->subject('[DMP] Fehler durch Exception');
        //$message->to('foo@example.com')->cc('bar@example.com');
        //$message->attach( Swift_Attachment::newInstance( 'doobeedoo' , 'my-file.pdf', 'application/pdf') );
    });
    
    
    $popup_text = '<h3>Oops, da ist etwas schiefgelaufen!</h3><p>Unsere Administratoren wurden informiert.</p>';
    $popup_text .= '<p>Bitte überprüfen Sie auch noch einmal Ihre Eingabe.</p>';
    $popup_text .= '<p>(Fehler-URL: ' . Session::get('exception_url') . ')</p>';
    
    return Redirect::route('home')
        ->with('flash_general_error', $popup_text);
});