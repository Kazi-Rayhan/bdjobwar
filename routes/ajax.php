<?php

use App\Models\Package;
use Illuminate\Support\Facades\Route;

Route::group(['prefix'=>'ajax','as'=>'ajax.'],function(){
    Route::get('/package/{package}',function(Package $package){
        return response($package->toArray());
    })->name('package');

});
