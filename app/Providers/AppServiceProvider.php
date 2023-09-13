<?php

namespace App\Providers;

use App\Models\Tipo;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\DB;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        
        view()->composer('layouts.template', function($view){
            $tipos = DB::table('Tipos')->count();
            $view->with(['tipos'=>$tipos]);
        });
    }
}
