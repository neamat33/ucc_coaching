<?php

namespace App\Providers;

use Illuminate\Pagination\Paginator;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Session;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Paginator::useBootstrap();

        View::composer('*', function ($view) {
            if (Auth::user()) {
                $login_role_id = Auth::user()->role_id;
                $user_id = Auth::user()->id;

                $menus = DB::table('acl_modules')->where('parent_id', '0')->where('status_id', 1)->orderBy('sort', 'ASC')->get();
                $submenus = DB::table('acl_modules')->where('parent_id', '!=', 0)->where('status_id', 1)->orderBy('sort', 'ASC')->get();

                $roleModules = DB::table('acl_module_users')->where('status_id', 1)->where('user_id', $user_id)->get();
                $userModuleIds = $roleModules->pluck('acl_module_id')->toArray();

                $view->with([
                    'login_role_id' => $login_role_id,
                    'menus' => $menus,
                    'submenus' => $submenus,
                    'userModuleIds' => $userModuleIds,
                ]);
            }
        });
    }
}
