<?php
Event::listen('user.login', function($username)
{
    $user = User::where('username', '=', $username)->first();
    $last_login = new DateTime;
    $user->last_login = $last_login->format('Y-m-d H:i:s');
    $user->save();
});


Event::listen('plan.save', function($plan_id){
    $plan = Plan::where('id', '=', $plan_id)->first();
    $last_update = new DateTime;
    $plan->updated_at = $last_update->format('Y-m-d H:i:s');
    $plan->save();
});
