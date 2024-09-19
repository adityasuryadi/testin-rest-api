<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Response as Resp;

class CreateproductRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */


     public function rules()
    {
        return [
            'name' => 'required',
            'price'=>'required|numeric|min:100',
            'stock'=>'required|numeric|min:1'
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Nama harus diisi',
            'price.required'=>'Harga harus diisi',
            'price.numeric'=>'Harga harus angka',
            'price.min'=>'Minimal harga tidak terpenuhi',
            'stock.min'=>'Minimal stock tidak terpenuhi',
            'stock.required'=>'Stok harus diisi',
            'stock.numeric'=>'stok harus angka'

        ];
    }

    public function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(
            response()->json([
                'data'=> $validator->errors(),
                'status'=>Resp::$statusTexts[400],
                'code'=>Resp::HTTP_BAD_REQUEST],400)
        );
    }
}
