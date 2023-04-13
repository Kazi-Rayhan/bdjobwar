<?php

namespace App\Providers;

use App\Actions\AcceptOrderAction;
use App\Actions\BatchMessageAction;
use App\Actions\CreateQuestionAction;
use App\Actions\DeclineOrderAction;
use App\Actions\DuplicateBatchAction;
use App\Actions\ExamResultsAction;
use App\Actions\RevaluateAction;
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
        Voyager::addAction(DuplicateBatchAction::class);
        Voyager::addAction(AcceptOrderAction::class);
        Voyager::addAction(DeclineOrderAction::class);
        Voyager::addAction(SubjectAction::class);
        Voyager::addAction(RevaluateAction::class);
        Voyager::addAction(ExamResultsAction::class);
        Voyager::addAction(BatchMessageAction::class);
        Paginator::useBootstrap();
    }
}
