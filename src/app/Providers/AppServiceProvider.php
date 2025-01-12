<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Blade;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Blade::directive('errorany', function($keys) {
            return "<?php 
                foreach(explode(',', str_replace(' ', '', {$keys})) as \$key) {
                    if(\$errors->has(\$key)) {
                        echo '<div style=\"color: red; \">' . \$errors->first(\$key).'</div>';
                        break;
                    }
                }
            ?>";
        });
    }
}
