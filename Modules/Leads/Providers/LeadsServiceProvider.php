<?php

namespace Modules\Leads\Providers;

use Illuminate\Support\ServiceProvider;

class LeadsServiceProvider extends ServiceProvider
{
    public function register()
    {
        //
    }

    public function boot()
    {
        $this->loadRoutesFrom(module_path('Leads', '/Routes/web.php'));
        $this->loadViewsFrom(module_path('Leads', '/Resources/views'), 'leads');
    }
}
