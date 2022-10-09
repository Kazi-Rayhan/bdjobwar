<?php

namespace App\Providers;

use App\Actions\AcceptOrderAction;
use App\Actions\CreateQuestionAction;
use App\Actions\DeclineOrderAction;
use App\Actions\SubjectAction;
use Illuminate\Support\ServiceProvider;
use TCG\Voyager\Facades\Voyager;
use Illuminate\Pagination\Paginator;

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
        Voyager::addAction(CreateQuestionAction::class);
        Voyager::addAction(AcceptOrderAction::class);
        Voyager::addAction(DeclineOrderAction::class);
        Voyager::addAction(SubjectAction::class);
        Paginator::useBootstrap();
    }
}
