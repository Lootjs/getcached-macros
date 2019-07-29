<?php
namespace App\Providers;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\View\View;
use Closure;
class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Builder::macro('getCached', function () {
            /**
            * @var @cacheKey string Название кеша
            * Добавьте сюда какие то ваши параметры, например, app()->getLocale()
            */
            $cacheKey = sha1($this->toSql() . implode($this->getBindings()));

            return Cache::remember($cacheKey, 64800, function () {
                    return $this->get();
                }
            );
        });
    }
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
    }
    public function provides()
    {
        return ['filesystem'];
    }
}