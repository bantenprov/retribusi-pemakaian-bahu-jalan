<?php namespace Bantenprov\PemakaianBahuJalan;

use Illuminate\Support\ServiceProvider;
use Bantenprov\PemakaianBahuJalan\Console\Commands\PemakaianBahuJalanCommand;

/**
 * The PemakaianBahuJalanServiceProvider class
 *
 * @package Bantenprov\PemakaianBahuJalan
 * @author  bantenprov <developer.bantenprov@gmail.com>
 */
class PemakaianBahuJalanServiceProvider extends ServiceProvider
{

    /**
     * Indicates if loading of the provider is deferred.
     *
     * @var bool
     */
    protected $defer = false;

    /**
     * Bootstrap the application events.
     *
     * @return void
     */
    public function boot()
    {
        // Bootstrap handles
        $this->routeHandle();
        $this->configHandle();
        $this->langHandle();
        $this->viewHandle();
        $this->assetHandle();
        $this->migrationHandle();
    }

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton('pemakaian-bahu-jalan', function ($app) {
            return new PemakaianBahuJalan;
        });

        $this->app->singleton('command.pemakaian-bahu-jalan', function ($app) {
            return new PemakaianBahuJalanCommand;
        });

        $this->commands('command.pemakaian-bahu-jalan');
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return [
            'pemakaian-bahu-jalan',
            'command.pemakaian-bahu-jalan',
        ];
    }

    /**
     * Loading package routes
     *
     * @return void
     */
    protected function routeHandle()
    {
        $this->loadRoutesFrom(__DIR__.'/routes/routes.php');
    }

    /**
     * Loading and publishing package's config
     *
     * @return void
     */
    protected function configHandle()
    {
        $packageConfigPath = __DIR__.'/config/config.php';
        $appConfigPath     = config_path('pemakaian-bahu-jalan.php');

        $this->mergeConfigFrom($packageConfigPath, 'pemakaian-bahu-jalan');

        $this->publishes([
            $packageConfigPath => $appConfigPath,
        ], 'config');
    }

    /**
     * Loading and publishing package's translations
     *
     * @return void
     */
    protected function langHandle()
    {
        $packageTranslationsPath = __DIR__.'/resources/lang';

        $this->loadTranslationsFrom($packageTranslationsPath, 'pemakaian-bahu-jalan');

        $this->publishes([
            $packageTranslationsPath => resource_path('lang/vendor/pemakaian-bahu-jalan'),
        ], 'lang');
    }

    /**
     * Loading and publishing package's views
     *
     * @return void
     */
    protected function viewHandle()
    {
        $packageViewsPath = __DIR__.'/resources/views';

        $this->loadViewsFrom($packageViewsPath, 'pemakaian-bahu-jalan');

        $this->publishes([
            $packageViewsPath => resource_path('views/vendor/pemakaian-bahu-jalan'),
        ], 'views');
    }

    /**
     * Publishing package's assets (JavaScript, CSS, images...)
     *
     * @return void
     */
    protected function assetHandle()
    {
        $packageAssetsPath = __DIR__.'/resources/assets';

        $this->publishes([
            $packageAssetsPath => public_path('vendor/pemakaian-bahu-jalan'),
        ], 'public');
    }

    /**
     * Publishing package's migrations
     *
     * @return void
     */
    protected function migrationHandle()
    {
        $packageMigrationsPath = __DIR__.'/database/migrations';

        $this->loadMigrationsFrom($packageMigrationsPath);

        $this->publishes([
            $packageMigrationsPath => database_path('migrations')
        ], 'migrations');
    }
}
