<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class storeUpdateOrder extends FormRequest
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

        $rules =  [

            'reup' =>"required|digits:4|unique:orders,reup,{$id},id"
        ];
            // dd($this->method());
        if ($this->method() == 'PUT') {
            $rules['reup'] = "nullable|digits:4|unique:orders,reup,{$id},id";
        }

        return $rules;
    }
}
