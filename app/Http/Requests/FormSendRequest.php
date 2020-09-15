<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FormSendRequest extends FormRequest
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
            'name' => 'required | string',
            'address' => 'required | string',
            'latitude' => 'required | numeric | between: -90,90',
            'longitude' => 'required | numeric | between: -180,180',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => ':attributeは必須です。',
            'address.required' => ':attributeは必須です。',
            'latitude.required' => ':attributeは必須です。',
            'latitude.between' => ':attributeが不正です。',
            'longitude.required' => ':attributeは必須です。',
            'longitude.between' => ':attributeが不正です。',
        ];
    }

    public function attributes()
    {
        return [
            'name' => '名前',
            'address' => '住所',
            'latitude' => '緯度',
            'longitude' => '経度',
        ];
    }
}
