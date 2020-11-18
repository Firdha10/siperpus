<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class RepositoryBackendServiceProvider extends ServiceProvider
{

    public function register()
    {
        $this->app->bind(
            /*
            * Register your Repository classes and interface here
            **/
            'App\Repositories\DetailTransaksiRepositoryInterface',
            'App\Repositories\DetailTransaksiRepository'
        );
    }
}
