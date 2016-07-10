<?php
namespace App\Providers;

use App\User;
use App\Policies\UserPolicy;
use App\SkillList;
use App\Policies\SkillListPolicy;
use App\Jobs;
use App\Policies\JobsPolicy;
use App\Cvs;
use App\Policies\CvsPolicy;

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
        'App\Model' => 'App\Policies\ModelPolicy',
        	User::class => UserPolicy::class,
        	SkillList::class => SkillListPolicy::class,
       	Jobs::class => JobsPolicy::class,
        	Cvs::class => CvsPolicy::class
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
	}
}
