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
        $router->model('ban_email', \App\BanEmail::class);
        $router->model('ban_ip',    \App\BanIp::class);
        $router->model('comment',   \App\Comment::class);
        $router->model('image',     \App\Image::class);
        $router->model('menu',      \App\Menu::class);
        $router->model('user',      \App\User::class);

        $router->bind('article', function($param) {
            $article = \App\Article::where('slug', $param)->first();

            if (is_null($article)) {
                throw new NotFoundHttpException();
            }

            return $article;
        });
        $router->bind('poll', function($param) {
            $poll = \App\Poll::where('slug', $param)->first();

            if (is_null($poll)) {
                throw new NotFoundHttpException();
            }

            return $poll;
        });
        $router->bind('section', function($param) {
            $section = \App\Section::where('slug', $param)->first();

            if (is_null($section)) {
                throw new NotFoundHttpException();
            }

            return $section;
        });
        $router->bind('tag', function($param) {
            $tag = \App\Tag::where('slug', $param)->first();

            if (is_null($tag)) {
                throw new NotFoundHttpException();
            }

            return $tag;
        });

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
