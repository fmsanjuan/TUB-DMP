<?php

class SiteHelpers {

    public static function getUserSessionData( $user_id ) {
        
        $user_data = User::where('id','=',$user_id)->first();
        $institution = Institution::getInstitutionName( $user_data->institution_id );

        $html = '';
        $html .= Auth::user()->username;
        //$html .= 'ID: ' . Auth::user()->id . '<br/>';        
        //$html .= $institution . '<br/>';        
        //$html .= 'Letzter Login: ' . $user_data->last_login;        
        return $html;
    }
    
    
    
}