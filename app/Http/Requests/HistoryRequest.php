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
        return true;
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
            'location_id' => 'required',
            'distance' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'trip_date.required' => ':attributeは必須です。',
            'start.required' => ':attributeは必須です。',
            'location_id.required' => ':attributeは必須です。',
            'distance.required' => ':attributeは必須です。',
        ];
    }

    public function attributes()
    {
        return [
            'trip_date' => '出張日',
            'start' => '出発地',
            'location_id' => '目的地',
            'distance' => '距離',
        ];
    }
}
