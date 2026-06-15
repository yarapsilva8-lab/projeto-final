<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class AnimalRequest extends FormRequest
{

    public function authorize(): bool
     {
        return true;
    }
    /**
     * Determine if the user is authorized to make this request.
     */
    public function rules(): array
{
    return [
        'nome'      => 'required|string|max:255',
        'especie'   => 'required|string|max:100',
        'raca'      => 'nullable|string|max:100',
        'idade'     => 'nullable|integer|min:0',
        'foto'      => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        'descricao' => 'nullable|string',
    ];
}
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, ValidationRule|array<mixed>|string>
     */
     public function messages(): array
    {
        return [
            'nome.required'     => 'O nome é obrigatório.',
            'nome.max'          => 'O nome deve ter no máximo 255 caracteres.',
            'especie.required'  => 'A espécie é obrigatória.',
            'especie.max'       => 'A espécie deve ter no máximo 100 caracteres.',
            'raca.max'          => 'A raça deve ter no máximo 100 caracteres.',
            'idade.integer'     => 'A idade deve ser um número inteiro.',
            'idade.min'         => 'A idade não pode ser negativa.',
            'foto.required'     => 'A foto é obrigatória.',
            'foto.image'        => 'O arquivo deve ser uma imagem.',
            'foto.mimes'        => 'A foto deve ser jpg, jpeg, png ou webp.',
            'foto.max'          => 'A foto deve ter no máximo 5MB.',
            'descricao.required'=> 'A descrição é obrigatória.',
        ];
    }
}
