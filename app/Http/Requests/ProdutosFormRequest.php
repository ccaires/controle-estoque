<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProdutosFormRequest extends FormRequest
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
            'nome' => ['required','min:3'],
            'quantidade' => ['required'],
            'vencimento' => ['required'],
            'lote_id' => ['required']
        ];
    }

    public function messages()
    {
        return [
            'nome.required' => 'O campo nome é obrigratório',
            'quantidade.required'=> 'O campo quantidade é obrigatório',
            'vencimento.required'=> 'O campo vencimento é obrigatório'
        ];
    }
}
