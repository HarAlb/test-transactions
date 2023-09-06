<?php

namespace App\Task\Entity\Transaction\DTOs;

use App\Task\Entity\Transaction\Enum\TitleEnum;
use App\Task\Entity\User\Models\User;
use Illuminate\Contracts\Support\Arrayable;

final class TransactionDTO implements Arrayable
{
    public function __construct(
        private User $user,
        private TitleEnum $titleEnum,
        private string $description,
        private float $amount
    )
    {

    }

    public function toArray()
    {
        return [
            'user_id' => $this->user->id,
            'title' => $this->titleEnum,
            'description' => $this->description,
            'amount' => $this->amount
        ];
    }
}
