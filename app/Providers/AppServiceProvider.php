<?php

namespace App\Providers;

use App\Models\Product;
use App\Models\EquityTransaction;
use App\Models\IncomeTransaction;
use App\Models\ExpenseTransaction;
use App\Observers\ProductObserver;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Foundation\AliasLoader;
use Illuminate\Support\ServiceProvider;
use App\Observers\EquityTransactionObserver;
use App\Observers\IncomeTransactionObserver;
use App\Observers\ExpenseTransactionObserver;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $loader = AliasLoader::getInstance();
        $loader->alias('Excel', Excel::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Product::observe(ProductObserver::class);
        IncomeTransaction::observe(IncomeTransactionObserver::class);
        ExpenseTransaction::observe(ExpenseTransactionObserver::class);
        EquityTransaction::observe(EquityTransactionObserver::class);
        \App\Models\StockAddition::observe(\App\Observers\StockAdditionObserver::class);
    }
}
