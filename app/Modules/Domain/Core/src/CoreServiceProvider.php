<?php

namespace Bicycle\Modules\Domain\Core;

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
        // Do nothing
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
