<?php

namespace App\Task\Entity\Transaction\Requests;

use App\Task\Base\Requests\ApiRequest;
use App\Task\Entity\Transaction\Enum\TitleEnum;

class StoreRequest extends ApiRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'title' => 'required|string|in:' . implode(',', TitleEnum::values()),
            'description' => 'required|string|max:255',
            'amount' => 'required|numeric'
        ];
    }
}
