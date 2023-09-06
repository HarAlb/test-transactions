<?php

namespace App\Task\Entity\Transaction\Listeners;

use App\Task\Entity\Transaction\Events\StoredTransactionEvent;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class TransactionApprove implements ShouldQueue
{
    use InteractsWithQueue;
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(StoredTransactionEvent $event): void
    {
        $event->getTransactionDecoratorContract()->operation($event->getTransaction());
    }
}
