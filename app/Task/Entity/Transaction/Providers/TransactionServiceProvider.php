<?php

namespace App\Task\Entity\Transaction\Providers;

use App\Task\Entity\Transaction\Contracts\TransactionRepositoryContract;
use App\Task\Entity\Transaction\Repositories\TransactionRepository;
use Illuminate\Support\ServiceProvider;

class TransactionServiceProvider extends ServiceProvider
{
    /**
     * Регистрация любых служб приложения.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(TransactionRepositoryContract::class, TransactionRepository::class);
    }
}
