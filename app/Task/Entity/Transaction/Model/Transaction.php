<?php

namespace App\Task\Entity\Transaction\Model;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    protected $fillable = [
        'user_id',
        'title',
        'description',
        'status',
        'amount',
    ];
}
