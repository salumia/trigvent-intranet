<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {                                                       
        $this->registerPolicies();
        
        gate::define('isAdmin',function($user){
            if($user->role === 0 ){
                return true;
            }else{
                return false;
            }
        });
        gate::define('isHr',function($user){
            if($user->role === 1 ){
                return true;
            }else{
                return false;
            }
        });
        gate::define('isEmployee',function($user){
            if($user->role === 2 ){
                return true;
            }else{
                return false;
            }
        });



        //
    }
}
