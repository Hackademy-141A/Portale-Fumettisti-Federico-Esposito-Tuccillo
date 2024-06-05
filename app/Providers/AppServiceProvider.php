<?php

namespace App\Providers;

use App\Models\User;
use App\Models\Category;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Schema;
use App\Observers\UserDeletingObserver;
use Illuminate\Support\ServiceProvider;

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
        //ora facciamo in modo che i record salvati nella tabella categories siano a disposizone di tutte le viste del progetto
        if (Schema::hasTable('categories')) {
            $categories = Category::all();
            View::share('categories', $categories);
        };

        User::observe(UserDeletingObserver::class);
        //Adesso è stata fatta la registrazione di una view globale, quindi è possibile utilizzarla in qualsiasi view del progetto
        
    }
}
