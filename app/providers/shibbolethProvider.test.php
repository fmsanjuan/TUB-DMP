<?php
namespace App\Providers;

use Illuminate\Auth\GenericUser;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\UserProviderInterface;

class ShibbolethProviderTest implements UserProviderInterface
{

    public function retrieveById( $uid )
    {
        //return $this->shibbUser();
    }   

  /**
   * Retrieve a user by the given credentials.
   * DO NOT TEST PASSWORD HERE!
   *
   * @param  array  $credentials
   * @return \Illuminate\Auth\UserInterface|null
   */
    public function retrieveByCredentials( array $credentials )
    {    
        return 'this expects an array with credentials.';
        //return $this->shibbUser();
    }

  /**
   * Validate a user against the given credentials.
   *
   * @param  \Illuminate\Auth\UserInterface  $user
   * @param  array  $credentials
   * @return bool
   */
  public function validateCredentials(UserInterface $user, array $credentials)
  {
    // we'll assume if a user was retrieved, it's good
    return true;
  }

  /**
   * Return a generic fake user
   */
  protected function shibbUser( array $idp_response )
  {
    $user_attributes = array(
        'uid' => $idp_response['uid'][0],
        'givenname' => $idp_response['givenName'][0],
        'sn' => $idp_response['sn'][0],
        'mail' => $idp_response['mail'][0]        
    );
    return new GenericUser( $user_attributes );
  }
}