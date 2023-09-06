<?php

namespace App\Task\Entity\Transaction\Contracts;

use App\Task\Entity\Transaction\Enum\StatusEnum;
use App\Task\Entity\Transaction\Model\Transaction;
use Illuminate\Contracts\Support\Arrayable;
use Illuminate\Database\Eloquent\Model;

interface TransactionRepositoryContract
{
    public function updateStatus(Transaction $transaction, StatusEnum $statusEnum): Model;

    public function store(Arrayable $transactionArrayable): Model;
}
