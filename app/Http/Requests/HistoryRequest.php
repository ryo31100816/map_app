<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class HistoryRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'trip_date' => 'required',
            'start' => 'required',
            'end' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'trip_date.required' => ':attributeは必須です。',
            'start.required' => ':attributeは必須です。',
            'end.required' => ':attributeは必須です。',
        ];
    }

    public function attributes()
    {
        return [
            'trip_date' => '出張日',
            'start' => '出発地',
            'end' => '目的地',
        ];
    }
}
