<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Blade;

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
        Blade::directive('datetime', function ($expression) {
            $expression = explode(', ', $expression);
            $date = $expression[0];
            $day_name = $expression[1] ?? false;
            $format = 'jS F, Y h:i a';
            if ($day_name == 'true') {
                $format = 'l ' . $format;
            }
            return "<?php echo strtotime($date) < 2 ? 'Not available' : date('$format', strtotime($date)) ?>";
        });
        Blade::directive('time', function ($expression) {
            return "<?php echo date('h:i a', strtotime($expression)) ?>";
        });
        Blade::directive('date', function ($expression,  $day_name = false) {
            $expression = explode(', ', $expression);
            $date = $expression[0];
            $day_name = $expression[1] ?? false;
            $format = 'jS F, Y';
            if ($day_name == 'true') {
                $format = 'l ' . $format;
            }
            return "<?php echo strtotime($date) < 2 ? 'Not available' : date('$format', strtotime($date)) ?>";
        });

        Blade::directive('money', function ($value) {
            return "<?= numfmt_format_currency(numfmt_create(Auth::user()->church->locale ?? 'en-NG', NumberFormatter::CURRENCY), $value, numfmt_create(Auth::user()->church->locale ?? 'en-NG', NumberFormatter::CURRENCY)->getSymbol(NumberFormatter::INTL_CURRENCY_SYMBOL) ?? 'NGN') ?>";
        });
        Blade::directive('currency', function ($value) {
            return "<?= number_format($value, 2); ?>";
        });
    }
}
