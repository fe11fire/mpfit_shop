<?php

namespace App\Providers;

use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class ViewServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        View::composer('*', function ($view) {
            $view->with(
                'menu',
                [
                    [
                        'title' => 'Каталог',
                        'link' => route('catalog')
                    ],
                    [
                        'title' => 'Заказы',
                        'link' => route('orders')
                    ],
                    [
                        'title' => 'Создать товар',
                        'link' => route('product.change.new')
                    ],
                ]
            );
        });
    }
}
