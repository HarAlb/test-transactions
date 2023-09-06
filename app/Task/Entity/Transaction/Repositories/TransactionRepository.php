<?php

namespace App\Task\Entity\Transaction\Repositories;

use App\Task\Entity\Transaction\Contracts\TransactionRepositoryContract;
use App\Task\Entity\Transaction\Enum\StatusEnum;
use App\Task\Entity\Transaction\Model\Transaction;
use Illuminate\Contracts\Support\Arrayable;
use Illuminate\Database\Eloquent\Model;

class TransactionRepository implements TransactionRepositoryContract
{
    public function updateStatus(Transaction $transaction, StatusEnum $statusEnum): Model
    {
        $transaction->status = $statusEnum->name;
        $transaction->saveOrFail();

        return $transaction;
    }

    public function store(Arrayable $transactionArrayable): Model
    {
        return Transaction::query()->create($transactionArrayable->toArray());
    }
}
