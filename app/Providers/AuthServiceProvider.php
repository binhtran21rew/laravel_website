<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;

use App\Models\User;
use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
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
        Gate::define('category-list', 'App\Policies\CatelogyPolicy@view');
        Gate::define('category-add', 'App\Policies\CatelogyPolicy@create');
        Gate::define('category-edit', 'App\Policies\CatelogyPolicy@update');
        Gate::define('category-delete', 'App\Policies\CatelogyPolicy@delete');


        Gate::define('menu-list', 'App\Policies\CatelogyPolicy@view');
        Gate::define('menu-add', 'App\Policies\CatelogyPolicy@create');
        Gate::define('menu-edit', 'App\Policies\CatelogyPolicy@update');
        Gate::define('menu-delete', 'App\Policies\CatelogyPolicy@delete');


        Gate::define('slider-list', 'App\Policies\CatelogyPolicy@view');
        Gate::define('slider-add', 'App\Policies\CatelogyPolicy@create');
        Gate::define('slider-edit', 'App\Policies\CatelogyPolicy@update');
        Gate::define('slider-delete', 'App\Policies\CatelogyPolicy@delete');



        Gate::define('product-list', 'App\Policies\CatelogyPolicy@view');
        Gate::define('product-add', 'App\Policies\CatelogyPolicy@create');
        Gate::define('product-edit', 'App\Policies\CatelogyPolicy@update');
        Gate::define('product-delete', 'App\Policies\CatelogyPolicy@delete');


        Gate::define('account-list', 'App\Policies\CatelogyPolicy@view');
        Gate::define('account-add', 'App\Policies\CatelogyPolicy@create');
        Gate::define('account-edit', 'App\Policies\CatelogyPolicy@update');
        Gate::define('account-delete', 'App\Policies\CatelogyPolicy@delete');

        Gate::define('role-list', 'App\Policies\CatelogyPolicy@view');
        Gate::define('role-add', 'App\Policies\CatelogyPolicy@create');
        Gate::define('role-edit', 'App\Policies\CatelogyPolicy@update');
        Gate::define('role-delete', 'App\Policies\CatelogyPolicy@delete');

    }
}
