<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Blade;

class AppServiceProvider extends ServiceProvider {

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register() {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot() {
        Schema::defaultStringLength(191);

        Blade::if('valiProgram104600', function ($value) {
            if ($value == 104600) {
                return 1;
            } else {
                return 0;
            }
        });
        
        Blade::if('valiTypeFormNuevo', function ($value) {
            if ($value != '1') {
                return 1;
            } else {
                return 0;
            }
        });
        Blade::if('valiTypeProfileEstudiante', function ($value) {
            if ($value == '1') {
                return 1;
            } else {
                return 0;
            }
        });
        Blade::if('valiTypeProfileAdmisiones', function ($value) {
            if ($value == '2') {
                return 1;
            } else {
                return 0;
            }
        });
        Blade::if('valiTypeProfileAcademico', function ($value) {
            if ($value == '3') {
                return 1;
            } else {
                return 0;
            }
        });
        Blade::if('valiTypeProfileFinanciero', function ($value) {
            if ($value == '4') {
                return 1;
            } else {
                return 0;
            }
        });
    }

}
