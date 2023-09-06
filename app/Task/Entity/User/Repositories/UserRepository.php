<?php

namespace App\Task\Entity\User\Repositories;

use App\Task\Entity\Transaction\Model\Transaction;
use App\Task\Entity\User\Models\User;

class UserRepository
{
    public function incrementBalanceByTransaction(Transaction $transaction)
    {
        User::query()->where('id', $transaction->user_id)->increment('balance', $transaction->amount);
    }
}
