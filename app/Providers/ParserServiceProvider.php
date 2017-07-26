<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Helpers\Contracts\ParserContract;
use App\Helpers\CsvParser;
use App\Helpers\DepotParser;
use \Excel;

class ParserServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        app()->bind('CsvParser', function(){
            return new CsvParser();
        });

        app()->bind('DepotParser', function(){
            return new DepotParser();
        });
    }
}