<?php

namespace Simplysamin\LaravelPermissionEditor;

use Illuminate\Routing\Router;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Route;
use Simplysamin\LaravelPermissionEditor\Http\Middleware\SpatiePermissionMiddleware;

class PermissionEditorServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {   

        Route::prefix('permission-editor')
            ->as('permission-editor.')
            ->middleware(config('permission_editor.middleware', ['web', 'spatie.permission']))
            ->group(fn () => $this->loadRoutesFrom($this->convertToAbsolutePath('/../routes/web.php')));

        $router = $this->app->make(Router::class);

        $router->aliasMiddleware('spatie.permission', SpatiePermissionMiddleware::class);

        $this->loadViewsFrom($this->convertToAbsolutePath('/../resources/views'), 'permission-editor');

        if ($this->app->runningInConsole()) {
            
            $this->publishes(
                [
                    $this->convertToAbsolutePath('/../config/permission_editor.php') => config_path('permission_editor.php'),
                ],
                'permission_editor_config'
            );
        }

    }

    /**
     * Convert a relative path to an absolute path using DIRECTORY_SEPARATOR and __DIR__.
     *
     * @param string $relativePath The relative path to convert.
     * @return string The absolute path.
     */
    function convertToAbsolutePath(string $relativePath): string
    {
        return __DIR__ . implode(DIRECTORY_SEPARATOR, explode('/', $relativePath));
    }

}
