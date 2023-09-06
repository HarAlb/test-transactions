<?php

namespace App\Task\Entity\Transaction\Decorators;

use App\Task\Entity\Transaction\Contracts\TransactionServiceContract;
use App\Task\Entity\Transaction\Model\Transaction;

/**
 * использую декоратор так как в дальнейшем может интегрировать новые внешние сервисы, (юоокаса, ... )
 * лучше чтобы действие сделал с зависомости от переданного сервиса
 */
final class TransactionDecorator implements TransactionServiceContract
{
    public function __construct(private readonly TransactionServiceContract $transactionService)
    {

    }

    public function operation(Transaction $transaction)
    {
        $this->transactionService->operation($transaction);
    }
}
