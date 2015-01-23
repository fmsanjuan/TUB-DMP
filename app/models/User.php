<?php

use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableInterface;

class User extends Eloquent implements UserInterface, RemindableInterface
{    
    /*
	|--------------------------------------------------------------------------
	| Model Options
	|--------------------------------------------------------------------------
	*/
    
    protected $table = 'users';       
    
    /*
	|--------------------------------------------------------------------------
	| Model Relationships
	|--------------------------------------------------------------------------
	*/
    
    // A User belongs to an Institution
    public function institution() {
        return $this->belongsTo('Institution');
    }
    
    // A User has many Plans
    public function plan() {
        return $this->hasMany('Plan');
    }
           
    /*
	|--------------------------------------------------------------------------
	| Model Methods
	|--------------------------------------------------------------------------
	*/
    
	public function getAuthIdentifier()
	{
		return $this->getKey();
	}

	public function getAuthPassword()
	{
		return $this->password;
	}

	public function getReminderEmail()
	{
		return $this->email;
	}
    
    
    
    public function getRememberToken()
    {
        return $this->remember_token;
    }

    public function setRememberToken($value)
    {
        $this->remember_token = $value;
    }

    public function getRememberTokenName()
    {
        return 'remember_token';
    }
    
    

    /*
    protected static function getUserData( $username ) {
       return User::where('username', '=', $username)->firstOrFail();
   }
   */   
}