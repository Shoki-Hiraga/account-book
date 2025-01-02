<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\pagination\Paginator;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Schema;
use App\Models\Category;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Paginator::useBootstrapFive();
        Paginator::useBootstrapFour();
        if (Schema::hasTable('categories')) {
            View::share('categories', $this->shareCategories());
        } else {
            View::share('categories', collect()); // 空のコレクションを共有
        }
    }
    private function shareCategories(){
        return Category::all();
    }
}
