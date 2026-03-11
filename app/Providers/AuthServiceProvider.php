<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\Cliente;
use App\Policies\ClientePolicy;
use App\Models\User;
use App\Policies\ColaboradorPolicy;
use App\Models\Empresa;
use App\Policies\EmpresaPolicy;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    protected $policies = [
        Cliente::class => ClientePolicy::class,
        User::class => ColaboradorPolicy::class,
        Empresa::class => EmpresaPolicy::class,
    ];
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
