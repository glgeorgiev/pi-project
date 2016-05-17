<?php

namespace App\Providers;

use Illuminate\Routing\Router;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class RouteServiceProvider extends ServiceProvider
{
    /**
     * This namespace is applied to the controller routes in your routes file.
     *
     * In addition, it is set as the URL generator's root namespace.
     *
     * @var string
     */
    protected $namespace = 'App\Http\Controllers';

    /**
     * Define your route model bindings, pattern filters, etc.
     *
     * @param  \Illuminate\Routing\Router  $router
     * @return void
     */
    public function boot(Router $router)
    {
        $router->model('article',   \App\Article::class);
        $router->model('ban_ip',    \App\BanIp::class);
        $router->model('ban_user',  \App\BanUser::class);
        $router->model('comment',   \App\Comment::class);
        $router->model('image',     \App\Image::class);
        $router->model('menu',      \App\Menu::class);
        $router->model('poll',      \App\Poll::class);
        $router->model('section',   \App\Section::class);
        $router->model('tag',       \App\Tag::class);
        $router->model('user',      \App\User::class);
        $router->model('page',      \App\Page::class);
        $router->model('language',  \App\Language::class);

        parent::boot($router);
    }

    /**
     * Define the routes for the application.
     *
     * @param  \Illuminate\Routing\Router  $router
     * @return void
     */
    public function map(Router $router)
    {
        $router->group(['namespace' => $this->namespace], function ($router) {
            require app_path('Http/routes.php');
        });
    }
}
