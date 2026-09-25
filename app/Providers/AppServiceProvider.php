<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Gate;
use App\Models\User;

class AppServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        //
    }

    public function boot(): void
    {
        // 1. Admin Global Access (Admin ko saare gates pass milenge)
        Gate::before(function (User $user) {
            if (strtolower(trim($user->role)) === 'admin') {
                return true;
            }
        });

        // 2. Budget Branches Gates (b1 se b6)
        foreach (range(1, 6) as $i) {
            Gate::define("isB{$i}", function (User $user) use ($i) {
                return strtolower(trim($user->role)) === "b{$i}";
            });
        }

        // 3. Audit Branches Gates (a1 se a3)
        foreach (range(1, 3) as $i) {
            Gate::define("isA{$i}", function (User $user) use ($i) {
                return strtolower(trim($user->role)) === "a{$i}";
            });
        }
    }
}