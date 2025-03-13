<?php

namespace App\Http\Requests;

use App\Services\ValueObjects\Status;
use Illuminate\Validation\Rules\Enum;
use Illuminate\Foundation\Http\FormRequest;

class OrderFormRequest extends FormRequest
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
            'fio' => 'required',
            'product_count' => [
                'required',
                'integer',
            ],
            'comment' => 'string|nullable',
            'status' => ['nullable', new Enum(Status::class)]
        ];
    }

    public function messages()
    {
        return [
            'fio.*' => 'Отсутствует Ф.И.О.',
            'product_count' => 'Отсутствует количество товара',
            'status' => 'Неправильный статус заказ'
        ];
    }
}
