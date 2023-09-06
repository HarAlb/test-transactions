<?php

namespace App\Task\Entity\Transaction\Services;

use App\Task\Entity\Transaction\Contracts\TransactionRepositoryContract;
use App\Task\Entity\Transaction\Contracts\TransactionServiceContract;
use App\Task\Entity\Transaction\Decorators\TransactionDecorator;
use App\Task\Entity\Transaction\DTOs\TransactionDTO;
use App\Task\Entity\Transaction\Enum\StatusEnum;
use App\Task\Entity\Transaction\Events\StoredTransactionEvent;
use App\Task\Entity\Transaction\Model\Transaction;
use App\Task\Entity\User\Repositories\UserRepository;
use Illuminate\Database\Eloquent\Model;

class TransactionService implements TransactionServiceContract
{
    public function __construct(
        private readonly TransactionRepositoryContract $repositoryContract,
        private readonly UserRepository $userRepository
    ) {
    }

    public function store(TransactionDTO $transactionDTO): Model
    {
        $transaction = $this->repositoryContract->store($transactionDTO);
        StoredTransactionEvent::dispatch($transaction, new TransactionDecorator($this));

        return $transaction;
    }

    public function operation(Transaction $transaction)
    {
        $this->repositoryContract->updateStatus($transaction, StatusEnum::CONFIRMED);
        $this->userRepository->incrementBalanceByTransaction($transaction);
    }
}
