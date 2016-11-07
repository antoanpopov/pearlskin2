<?php

namespace Modules\BlogExtension\Providers;

use Illuminate\Support\ServiceProvider;
use Modules\BlogExtension\Entities\Comment;
use Modules\BlogExtension\Repositories\Cache\CacheCommentDecorator;
use Modules\BlogExtension\Repositories\CommentRepository;
use Modules\BlogExtension\Repositories\Eloquent\EloquentCommentRepository;
use Modules\Core\Traits\CanPublishConfiguration;

class BlogExtensionServiceProvider extends ServiceProvider
{
    use CanPublishConfiguration;
    /**
     * Indicates if loading of the provider is deferred.
     *
     * @var bool
     */
    protected $defer = false;

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->registerBindings();
    }

    public function boot()
    {
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return array();
    }

    private function registerBindings()
    {
        $this->app->bind(CommentRepository::class, function () {
            $repository = new EloquentCommentRepository(new Comment());

            if (config('app.cache') === false) {
                return $repository;
            }

            return new CacheCommentDecorator($repository);
        });
    }
}
