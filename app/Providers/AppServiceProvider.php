<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Validation\Rules\Password;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
        Password::defaults(function () {
            return Password::min(10) // Mínimo de 10 caracteres
                ->mixedCase() // Exige maiúsculas e minúsculas
                ->numbers() // Exige números
                ->symbols(); // Exige símbolos
        });
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
