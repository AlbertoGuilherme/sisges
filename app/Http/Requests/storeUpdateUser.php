<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class storeUpdateUser extends FormRequest
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
        $id =  $this->segment(3);

        $rules = [
            'name' => ['required', 'string', 'max:255'],
            'sigu' => ['required', 'numeric', 'digits:6', 'unique:users,sigu,{$id},id'],
            'email' => ['required', 'string', 'email', 'max:255', "unique:users,email,{$id},id"],
            'password' => ['required', 'string', 'min:6', 'max:16'],

        ];

    // dd($this->method() == 'PUT');
        if ($this->method() == 'PUT') {
            $rules['name'] = ['nullable', 'string', 'max:255'];
            $rules['sigu'] = ['nullable', 'numeric', 'digits:6'];
            $rules['email'] = ['nullable', 'string', 'email', 'max:255'];
            $rules['password'] = ['nullable', 'string', 'min:6', 'max:16'];
        }

        return $rules;
    }
}
