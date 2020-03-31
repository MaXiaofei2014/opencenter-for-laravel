<?php

namespace MaXiaofei\OpencenterForLaravel;

use Illuminate\Support\ServiceProvider;
use MaXiaofei\OpencenterForLaravel\Middleware\ApiAuthMiddleware;

class OpencenterForLaravelServiceProvider extends ServiceProvider
{
    /**
     * 服务提供者加是否延迟加载.
     * @var bool
     */
//    protected $defer = true; // 延迟加载服务

    /**
     * Register services.
     * packages/maxiaofei/opencenter-for-laravel/src/OpencenterForLaravelServiceProvider.php
     * @return void
     */
    public function register()
    {
        //register controller
        $this->app->make('MaXiaofei\OpencenterForLaravel\Controllers\HelloWorldController');
        //register view
        $this->loadViewsFrom(__DIR__.'/views', 'maxiaofei');

        // 单例绑定服务
//        $this->app->singleton('packagetest', function($app){
//            return new Packagetest($app['session'], $app['config']);
//        });
    }

    /**
     * Bootstrap services.
     * @file packages/maxiaofei/opencenter-for-laravel/src/OpencenterForLaravelServiceProvider.php
     * @return void
     */
    public function boot()
    {
        //添加中间件的调用
        $this->addMiddlewareAlias('maxiaofei.api', ApiAuthMiddleware::class);

        $this->loadRoutesFrom(__DIR__ . '/routes.php');

        // 发布css静态文件到根目录的public目录下
        // 把静态资源发布到laravel public/xingfupeng 目录下
        $this->publishes([
            __DIR__ . DIRECTORY_SEPARATOR . 'public' => public_path('maxiaofei'),
        ], 'public');
        // 发布config文件到根目录的config目录下
        $this->publishes([
            __DIR__ . DIRECTORY_SEPARATOR . 'config' . DIRECTORY_SEPARATOR . 'maxiaofei.php' => config_path('maxiaofei.php')
        ], 'config');
    }

    # 添加中间件的别名方法
    protected function addMiddlewareAlias($name, $class)
    {
        $router = $this->app['router'];

        if (method_exists($router, 'aliasMiddleware')) {
            return $router->aliasMiddleware($name, $class);
        }

        return $router->middleware($name, $class);
    }

//    public function provides()
//    {
//        return ['OpencenterForLaravelServiceProvider'];
//    }
}
