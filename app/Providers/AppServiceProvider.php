<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Livewire\Component;
use Illuminate\Database\Eloquent\Builder;


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
        Component::macro('emit', function ($event) {
            $this->dispatch($event);
        });
    
        Component::macro('dispatchBrowserEvent', function ($event) {
            $this->dispatch($event);
        });

        Builder::macro('searchByColumns', function (array $columns, string $search) {
            $this->where(function (Builder $query) use ($columns, $search) {
                foreach ($columns as $column) {
                    $query->orWhere($column, 'LIKE', "%{$search}%");
                }
            });
            
            return $this;
        });
    }
}
