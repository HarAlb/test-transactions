<?php

namespace App\Http\Controllers;

use App\Task\Entity\Transaction\DTOs\TransactionDTO;
use App\Task\Entity\Transaction\Enum\TitleEnum;
use App\Task\Entity\Transaction\Requests\StoreRequest;
use App\Task\Entity\Transaction\Services\TransactionService;
use App\Task\Entity\User\Models\User;
use Illuminate\Http\JsonResponse;

class TransactionController extends Controller
{
    public function __construct(private readonly TransactionService $transactionService)
    {

    }

    public function store(User $user, StoreRequest $request): JsonResponse
    {
        try {
            $this->transactionService->store(
                new TransactionDTO(
                    $user,
                    TitleEnum::from($request->title),
                    $request->description,
                    $request->amount,
                )
            );
        } catch (\Exception $exception) {
            return response()->json([
                'message' => 'Попробуйте чуть позже'
            ]);
        }

        return response()->json([
            'message' => 'Thanks wait approving'
        ]);
    }
}
