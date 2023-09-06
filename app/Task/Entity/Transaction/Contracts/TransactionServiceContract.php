<?php

namespace App\Task\Entity\Transaction\Contracts;

use App\Task\Entity\Transaction\Model\Transaction;

interface TransactionServiceContract
{
    public function operation(Transaction $transaction);
}
