<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Blade;
use Validator;
use View;

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
        app()->setLocale(request()->segment(1));
        Schema::defaultStringLength(191);
        Validator::extend('image64', function ($attribute, $value, $parameters, $validator) {
              $type = explode('/', explode(':', substr($value, 0, strpos($value, ';')))[1])[1];
                      if (in_array($type, $parameters)) {
                                  return true;
                                                        }
                            return false;
                                                                                        });
        Validator::replacer('image64', function($message, $attribute, $rule, $parameters) {
            return str_replace(':values',join(",",$parameters),$message);
                                                                                        });
        Validator::extend('without_spaces', function($attr, $value){
                    return preg_match('/^\S*$/u', $value);
        });
														
		Blade::directive('convert', function ($money) {
			return "<?php echo number_format($money, 2); ?>";
		});		
    }
}
