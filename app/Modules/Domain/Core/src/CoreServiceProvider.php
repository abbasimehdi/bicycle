<?php

namespace Bicycle\Modules\Domain\Core;

use Bicycle\Modules\Domain\Core\Exceptions\CustomException;
use Illuminate\Support\ServiceProvider;

class CoreServiceProvider extends ServiceProvider
{

    /**
     * Make config punishment optional by merging the config from the package.
     *
     * @return  void
     */
    public function register(): void
    {
//        $this->app->bind('HelpSpot\API', function ($app) {
//            return new HelpSpot\API($app->make('HttpClient'));
//        });
    }

    /**
     * Publishes configuration file.
     *
     * @return  void
     */
    public function boot(): void
    {
        // Do nothing
    }
}
