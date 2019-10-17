<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class QuotationRequest extends FormRequest
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
                'description'   => 'required|max:200',
                'address'       => 'required|max:150',
                'street_number'  => 'required|max:20',
                'neighborhood'  => 'required|max:150',
                'city'  => 'required|max:100',
                'state'  => 'required|max:100',
                'uf'  => 'required|max:2',
                'zip_code'  => 'required|max:9',
                'contact_name'  => 'required|max:200',
                'contact_email'         => 'required|email',    
                'contact_phone'    => 'required|max:15',
            ];
    }

    public function messages()
    {
        return [
            'description.required' => 'Informe a descrição.',
            'description.max' => 'A descrição deve ter no máximo 200 caracteres.',
            'address.required' => 'Informe o endereço.',
            'address.max' => 'O endereço deve ter no máximo 150 caracteres.',
            'street_number.required' => 'Informe o número.',
            'street_number.max' => 'O número deve ter no máximo 20 caracteres.',
            'neighborhood.required' => 'Informe o bairro.',
            'neighborhood.max' => 'O bairro deve ter no máximo 150 caracteres',
            'city.required' => 'Informe a cidade.',
            'city.max' => 'A cidade deve ter no máximo 100 caracteres',
            'state.required' => 'Informe o estado.',
            'state.max' => 'A cidade deve ter no máximo 100 caracteres',
            'uf.required' => 'Informe a UF.',
            'uf.max' => 'A UF deve ter no máximo 2 caracteres',
            'zip_code.required' => 'Informe o CEP.',
            'zip_code.max' => 'O CEP deve ter no máximo 9 caracteres',
            'contact_name.required' => 'Informe o nome para contato.',
            'contact_name.max' => 'O nome do contato deve ter no máximo 200 caracteres',
            'contact_email.required' => 'Informe o email.',
            'contact_email.email' => 'Informe um Email válido.',
            'contact_phone.required' => 'Informe o telefone para contato.',
            'contact_phone.max' => 'O telefone deve ter no máximo 15 caracteres',
        ];
    }
}
