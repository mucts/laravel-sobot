<?php
/**
 * This file is part of the mucts.com.
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 *
 * @version 1.0
 * @author herry<yuandeng@aliyun.com>
 * @copyright © 2020  MuCTS.com All Rights Reserved.
 */

namespace MuCTS\Laravel\Sobot\Providers;

use Illuminate\Contracts\Support\DeferrableProvider;
use Illuminate\Support\ServiceProvider as Provider;
use MuCTS\Laravel\Sobot\Sobot;

class ServiceProvider extends Provider implements DeferrableProvider
{
    public function register()
    {
        $this->mergeConfigFrom(
            dirname(__DIR__) . '/../config/sobot.php', 'sobot'
        );
        $this->app->singleton(Sobot::class, function ($app) {
            return new Sobot($app);
        });
        $this->app->alias(Sobot::class, 'sobot');
    }

    public function boot()
    {
        if (!file_exists(config_path('sobot.php'))) {
            $this->publishes([
                dirname(__DIR__) . '/../config/sobot.php' => config_path('sobot.php'),
            ], 'config');
        }
    }

    public function provides()
    {
        return [Sobot::class, 'sobot'];
    }
}