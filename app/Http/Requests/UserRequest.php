<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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
        $rules = [
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:users',
            'phone' => 'nullable|string|max:50|unique:users'
        ];

        if ($this->method() == 'PATCH') {
            $rules['email'] = 'required|email|max:255|unique:users,email,'. $this->route('user')->id;
            $rules['phone'] = 'nullable|string|max:50|unique:users,phone,'. $this->route('user')->id;
        }

        return $rules;
    }
}
