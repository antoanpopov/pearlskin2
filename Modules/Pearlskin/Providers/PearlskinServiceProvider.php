<?php

namespace Modules\Pearlskin\Providers;

use Illuminate\Support\ServiceProvider;
use Modules\Core\Traits\CanPublishConfiguration;
use Modules\Blog\Composers\Frontend\LatestPostsComposer;
use Modules\Pearlskin\Composers\AddressesComposer;
use Modules\Pearlskin\Composers\ArticleComposer;
use Modules\Pearlskin\Composers\ContentBlockComposer;
use Modules\Pearlskin\Composers\DoctorComposer;
use Modules\Pearlskin\Composers\HomeComposer;
use Modules\Pearlskin\Composers\ProceduresComposer;
use Modules\Pearlskin\Entities;
use Modules\Pearlskin\Repositories\Cache\CacheAddressDecorator;
use Modules\Pearlskin\Repositories\Cache\CacheArticleDecorator;
use Modules\Pearlskin\Repositories\Cache\CacheCarouselDecorator;
use Modules\Pearlskin\Repositories\Cache\CacheClientDecorator;
use Modules\Pearlskin\Repositories\Cache\CacheContentBlockDecorator;
use Modules\Pearlskin\Repositories\Cache\CacheDoctorDecorator;
use Modules\Pearlskin\Repositories\Cache\CacheEmailMessageDecorator;
use Modules\Pearlskin\Repositories\Cache\CacheManipulationDecorator;
use Modules\Pearlskin\Repositories\Cache\CachePositionsDecorator;
use Modules\Pearlskin\Repositories\Cache\CacheEmailDecorator;
use Modules\Pearlskin\Repositories\Cache\CacheProcedureCategoryDecorator;
use Modules\Pearlskin\Repositories\Cache\CacheProcedureDecorator;
use Modules\Pearlskin\Repositories\Cache\CacheScheduleDecorator;
use Modules\Pearlskin\Repositories\Eloquent\EloquentAddressRepository;
use Modules\Pearlskin\Repositories\Eloquent\EloquentArticleRepository;
use Modules\Pearlskin\Repositories\Eloquent\EloquentCarouselRepository;
use Modules\Pearlskin\Repositories\Eloquent\EloquentClientRepository;
use Modules\Pearlskin\Repositories\Eloquent\EloquentContentBlockRepository;
use Modules\Pearlskin\Repositories\Eloquent\EloquentDoctorRepository;
use Modules\Pearlskin\Repositories\Eloquent\EloquentEmailMessageRepository;
use Modules\Pearlskin\Repositories\Eloquent\EloquentEmailRepository;
use Modules\Pearlskin\Repositories\Eloquent\EloquentManipulationRepository;
use Modules\Pearlskin\Repositories\Eloquent\EloquentPositionRepository;
use Modules\Pearlskin\Repositories\Eloquent\EloquentProcedureCategoryRepository;
use Modules\Pearlskin\Repositories\Eloquent\EloquentProcedureRepository;
use Modules\Pearlskin\Repositories\Eloquent\EloquentScheduleRepository;
use Modules\Pearlskin\Repositories;

class PearlskinServiceProvider extends ServiceProvider
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
        view()->composer('procedures', ProceduresComposer::class);
        view()->composer('procedures', ContentBlockComposer::class);
        view()->composer('home', HomeComposer::class);
        view()->composer('home', ContentBlockComposer::class);
        view()->composer('home', ArticleComposer::class);
        view()->composer('about-us', ContentBlockComposer::class);
        view()->composer('about-us', DoctorComposer::class);
        view()->composer('contact-us', AddressesComposer::class);
        view()->composer('partials.footer', AddressesComposer::class);

        /**
         * Widgets providers
         */

        view()->composer('widgets.doctors', DoctorComposer::class);
        view()->composer('widgets.procedures', ProceduresComposer::class);
        view()->composer('widgets.blog.posts', LatestPostsComposer::class);
    }

    public function boot()
    {
        $this->publishConfig('pearlskin', 'settings');
        $this->publishConfig('pearlskin', 'permissions');
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
        $this->app->bind(
            'Modules\Pearlskin\Repositories\ClientRepository',
            function () {
                $repository = new EloquentClientRepository(new Entities\Client());

                if (!config('app.cache')) {
                    return $repository;
                }

                return new CacheClientDecorator($repository);
            }
        );
        $this->app->bind(
            'Modules\Pearlskin\Repositories\DoctorRepository',
            function () {
                $repository = new EloquentDoctorRepository(new Entities\Doctor());

                if (!config('app.cache')) {
                    return $repository;
                }

                return new CacheDoctorDecorator($repository);
            }
        );
        $this->app->bind(
            'Modules\Pearlskin\Repositories\ProcedureRepository',
            function () {
                $repository = new EloquentProcedureRepository(new Entities\Procedure());

                if (!config('app.cache')) {
                    return $repository;
                }

                return new CacheProcedureDecorator($repository);
            }
        );
        $this->app->bind(
            'Modules\Pearlskin\Repositories\ManipulationRepository',
            function () {
                $repository = new EloquentManipulationRepository(new Entities\Manipulation());

                if (!config('app.cache')) {
                    return $repository;
                }

                return new CacheManipulationDecorator($repository);
            }
        );
        $this->app->bind(
            'Modules\Pearlskin\Repositories\ScheduleRepository',
            function () {
                $repository = new EloquentScheduleRepository(new Entities\Schedule());

                if (!config('app.cache')) {
                    return $repository;
                }

                return new CacheScheduleDecorator($repository);
            }
        );
        $this->app->bind(
            'Modules\Pearlskin\Repositories\AddressRepository',
            function () {
                $repository = new EloquentAddressRepository(new Entities\Address());

                if (!config('app.cache')) {
                    return $repository;
                }

                return new CacheAddressDecorator($repository);
            }
        );
        $this->app->bind(
            'Modules\Pearlskin\Repositories\CarouselRepository',
            function () {
                $repository = new EloquentCarouselRepository(new Entities\Carousel());

                if (!config('app.cache')) {
                    return $repository;
                }

                return new CacheCarouselDecorator($repository);
            }
        );
        $this->app->bind(
            'Modules\Pearlskin\Repositories\AddressRepository',
            function () {
                $repository = new EloquentAddressRepository(new Entities\Address());

                if (!config('app.cache')) {
                    return $repository;
                }

                return new CacheAddressDecorator($repository);
            }
        );
        $this->app->bind(
            'Modules\Pearlskin\Repositories\PositionRepository',
            function () {
                $repository = new EloquentPositionRepository(new Entities\Position());

                if (!config('app.cache')) {
                    return $repository;
                }

                return new CachePositionsDecorator($repository);
            }
        );
        $this->app->bind(
            'Modules\Pearlskin\Repositories\ContentBlockRepository',
            function () {
                $repository = new EloquentContentBlockRepository(new Entities\ContentBlock());

                if (!config('app.cache')) {
                    return $repository;
                }

                return new CacheContentBlockDecorator($repository);
            }
        );
        $this->app->bind(
            'Modules\Pearlskin\Repositories\ArticleRepository',
            function () {
                $repository = new EloquentArticleRepository(new Entities\Article\Article());

                if (!config('app.cache')) {
                    return $repository;
                }

                return new CacheArticleDecorator($repository);
            }
        );

        $this->app->bind(Repositories\EmailMessageRepository::class, function () {
            $repository = new Repositories\Eloquent\EloquentEmailMessageRepository(new Entities\EmailMessage());

            if (config('app.cache') === false) {
                return $repository;
            }

            return new CacheEmailMessageDecorator($repository);
        });

        $this->app->bind(Repositories\ProcedureCategoryRepository::class, function () {
            $repository = new Repositories\Eloquent\EloquentProcedureCategoryRepository(new Entities\ProcedureCategory());

            if (config('app.cache') === false) {
                return $repository;
            }

            return new CacheProcedureCategoryDecorator($repository);
        });
    }
}
