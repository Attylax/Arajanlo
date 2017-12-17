<?php
/**
 * Created by PhpStorm.
 * User: Pista
 * Date: 2017.12.16.
 * Time: 23:24
 */

namespace App\Providers;

use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class ComposerServiceProvider extends ServiceProvider
{
    /**
     * Register bindings in the container.
     *
     * @return void
     */
    public function boot()
    {
        // Using class based composers...
        View::composer(
            'furniture_items.furniture_items', 'App\Http\ViewComposers\FurnitureItemComposer'
        );
    }

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {

    }
}