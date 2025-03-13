<?php

namespace App\Http\Requests;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class ProductFormRequest extends FormRequest
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
            'title' => 'required',
            'description' => 'required',
            'price' => [
                'required',
                'decimal:0,2',
            ],
            'category_id' => [
                'required',
                'integer',
                'exists:categories,id'
            ],
        ];
    }

    public function messages()
    {
        return [
            'title.*' => 'Отсутствует название товара',
            'description.*' => 'Отсутствует описание товара',
            'price' => 'Отсутствует цена товара',
            'category_id' => 'Категория не выбрана'
        ];
    }
}
