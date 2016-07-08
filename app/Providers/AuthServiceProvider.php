<?php
namespace App\Providers;

use App\User;
use App\Policies\UserPolicy;

use Illuminate\Contracts\Auth\Access\Gate as GateContract;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
     //   'App\Model' => 'App\Policies\ModelPolicy',
        	User::class => UserPolicy::class
    ];

    /**
     * Register any application authentication / authorization services.
     *
     * @param  \Illuminate\Contracts\Auth\Access\Gate  $gate
     * @return void
     */
    public function boot(GateContract $gate)
    {
        $this->registerPolicies($gate);

        //$gate->define('edit-users', function ( $user, $id ) {
         //   return $user->id === $id;
       // });
        $gate->define('update-jobs', function ( $user, $job ) {
            return $user->id === $job->user_id;
        });
        $gate->define('update-skill_list', function ( $user, $skill_list ) {
            return $user->id === $skill_list->user_id;
        });
    }
}
