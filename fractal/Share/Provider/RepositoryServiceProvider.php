<?php
namespace Fractal\Share\Provider;

use Illuminate\Contracts\Foundation\Application;
use Illuminate\Support\ServiceProvider;

use Doctrine\ORM\EntityManager;
use Doctrine\ORM\EntityManagerInterface;

// Repository
use Fractal\Article\Domain\Model\Article\ArticleRepository;
use Fractal\Article\Domain\Model\Article\Article;
use Fractal\User\Domain\Model\User\User;
use Fractal\User\Domain\Model\User\UserRepository;


class RepositoryServiceProvider extends ServiceProvider{
    private function repositories()
    {
        return [
            ArticleRepository::class => Article::class,
            UserRepository::class => User::class
        ];
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(EntityManagerInterface::class, EntityManager::class);

        foreach ($this->repositories() as $repository => $entity) {
            $this->app->singleton($repository, function (Application $app) use ($entity) {
                return  $app->make( EntityManagerInterface::class )->getRepository($entity);
            });
        }
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {

    }
}