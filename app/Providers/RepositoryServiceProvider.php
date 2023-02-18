<?php

namespace App\Providers;

use App\Repositories\CategoryRepository;
use App\Repositories\CommentRepository;
use App\Repositories\Interfaces\CategoryRepositoryInterface;
use App\Repositories\Interfaces\CommentRepositoryInterface;
use App\Repositories\Interfaces\PostRepositoryInterface;
use App\Repositories\Interfaces\TagRepositoryInterface;
use App\Repositories\Interfaces\UnderCategoryRepositoryInterface;
use App\Repositories\Interfaces\UserRepositoryInterface;
use App\Repositories\PostRepository;
use App\Repositories\TagRepository;
use App\Repositories\UnderCategoryRepository;
use App\Repositories\UserRepository;
use App\Services\CategoryService;
use App\Services\Interfaces\CategoryServiceInterface;
use App\Services\Interfaces\PostServiceInterface;
use App\Services\Interfaces\TagServiceInterface;
use App\Services\Interfaces\UnderCategoryServiceInterface;
use App\Services\Interfaces\UserServiceInterface;
use App\Services\PostService;
use App\Services\TagService;
use App\Services\UnderCategoryService;
use App\Services\UserService;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        /**
         * Service
         */
        $this->app->singleton(PostServiceInterface::class, PostService::class);
        $this->app->singleton(CategoryServiceInterface::class, CategoryService::class);
        $this->app->singleton(TagServiceInterface::class, TagService::class);
        $this->app->singleton(UnderCategoryServiceInterface::class, UnderCategoryService::class);
        $this->app->singleton(UserServiceInterface::class, UserService::class);

        /**
         * Repository
         */
        $this->app->singleton(PostRepositoryInterface::class, PostRepository::class);
        $this->app->singleton(CategoryRepositoryInterface::class, CategoryRepository::class);
        $this->app->singleton(TagRepositoryInterface::class, TagRepository::class);
        $this->app->singleton(UnderCategoryRepositoryInterface::class, UnderCategoryRepository::class);
        $this->app->singleton(UserRepositoryInterface::class, UserRepository::class);
        $this->app->singleton(CommentRepositoryInterface::class, CommentRepository::class);
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {

    }
}
