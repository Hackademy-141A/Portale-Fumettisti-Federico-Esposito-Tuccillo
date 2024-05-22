<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProfileUpdateRequest extends FormRequest
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
    public function rules(): array
    {
        return [
            //creaiamo la nostra request per l'aggiornamento dei profili utenti
            'name' => ['required','string','max:255'],
            'username' => ['required','string','max:255'],
            'surname' => ['required','string','max:255'],
            'email' => ['required','string', 'email','max:255'],
            'phone' => ['nullable','string','max:255'],
            'company_address' => ['nullable','string','max:255'],
            'short_description' => ['nullable','string','max:255'],
            'image' => ['nullable', 'image','mimes:jpeg,png,jpg,gif,svg','max:2048'],
            
            

        ];
    }
}
