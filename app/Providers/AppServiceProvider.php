<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator;
class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        view()->composer('admin.content.sidebar',function($view){
                            $leads_no       = \App\Models\Lead::where(function($query){
                                                if (auth()->guard('agent')->check()) {
                                                    $query->where('agent_id',auth()->guard('agent')->id());
                                                }
                                            })->count();
                            $rent_leads_no  = \App\Models\Lead::where(function($query){
                                                    if (auth()->guard('agent')->check()) {
                                                        $query->where('agent_id',auth()->guard('agent')->id());
                                                    }
                                                })->where('type',1)->count();
                            $sales_leads_no  = \App\Models\Lead::where(function($query){
                                                    if (auth()->guard('agent')->check()) {
                                                        $query->where('agent_id',auth()->guard('agent')->id());
                                                    }
                                                })->where('type',0)->count();
                            $view->with('leads_no',$leads_no)
                                 ->with('rent_leads_no',$rent_leads_no)
                                 ->with('sales_leads_no',$sales_leads_no)
                                      ;
                        });
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Paginator::useBootstrapFive();
    }
}
