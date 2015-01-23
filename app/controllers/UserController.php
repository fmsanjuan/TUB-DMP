<?php

class UserController extends BaseController {

    // method to valdiate the login (called from post login route)

    public function index( $auth_source ) {
        return View::make('login.' . $auth_source);
    }    
    
    public function loginUser() {
        
        $userCredentials = array(
            'username' => Input::get('username'),
            'password' => Input::get('password'),
            'active' => 1
        );
        
        if ( Auth::attempt($userCredentials, true) ) 
        {
            //$responses = Event::fire('user.login', array( $userCredentials['username'] ));
            return Redirect::route('dashboard')->with('flash_success', 'Anmeldung erfolgreich.');
        }
        else
        {
            return Redirect::route('login.db')->with('flash_error', 'Fehler bei der Anmeldung')->withInput();
        }
        
        // false: redirect back to login form and display error
        /*
        
        */
        //echo $auth_source;
        /*
        switch ( $auth_source ) {
            case 'shibboleth':
                echo 'SHIB!';
                break;
            default:
                return View::make( 'login.db' );
                break;                
        }
        */        
    }
    
    public function logoutUser() {
        Auth::logout();
        return Redirect::route('home')->with('flash_success', 'Abmeldung erfolgreich.');
    }
    
    function shibbLogin() {
        
        $auth = new SimpleSAML_Auth_Simple('default-sp');
        
        $user_attributes = $auth->getAttributes();
        
        if (!$auth->isAuthenticated()) {
            $auth->login(array(        
                'ReturnTo' => '/dmp/',
            ));
        } else {
            if (Auth::attempt(array('email' => $user_attributes['mail'][0]))) {
                echo "LOGGED IN!";
            } else {
                echo "NOT LOGGED IN!";
            }
            //echo '<pre>';
            //print_r($auth->getAttributes());
            //echo '</pre>';       
        }
        
        $user_uid = $user_attributes['uid'][0];
        $user_givenname = $user_attributes['givenName'][0];
        $user_sn = $user_attributes['sn'][0];
        $user_mail = $user_attributes['mail'][0];
        
        /*
        echo 'uid = ' . $user_uid . '<br/>';
        echo 'givenName = ' . $user_givenname . '<br/>';
        echo 'sn = ' . $user_sn . '<br/>';
        echo 'mail = ' . $user_mail . '<br/>';
        echo $auth->isAuthenticated();
        */
        //$auth->logout();
        
        //$auth2 = new Saitswebuwm\Shibboleth\ShibbolethServiceProvider;
        
    }
    
    
}