<?php

namespace App\Task\Entity\Transaction\Events;

use App\Task\Entity\Transaction\Decorators\TransactionDecorator;
use App\Task\Entity\Transaction\Model\Transaction;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class StoredTransactionEvent
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    /**
     * Create a new event instance.
     */
    public function __construct(
        private readonly Transaction $transaction,
        private TransactionDecorator $transactionDecoratorContract
    ) {
        //
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return array<int, \Illuminate\Broadcasting\Channel>
     */
    public function broadcastOn(): array
    {
        return [
            new PrivateChannel('channel-name'),
        ];
    }

    /**
     * @return TransactionDecorator
     */
    public function getTransactionDecoratorContract(): TransactionDecorator
    {
        return $this->transactionDecoratorContract;
    }

    /**
     * @return Transaction
     */
    public function getTransaction(): Transaction
    {
        return $this->transaction;
    }
}
