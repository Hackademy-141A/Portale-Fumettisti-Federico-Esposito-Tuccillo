<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ArticleUpdateRequest extends FormRequest
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
            'title' => ['required','string','max:255'],
            'subtitle' => ['required','string','max:255'],
            'article_description' => ['required','string','max:255'],
            'image' => ['nullable', 'image','mimes:jpeg,png,jpg,gif,svg','max:2048'],
            'comic_number' => ['nullable','string','max:255'],
            'comic_year' => ['nullable','string','max:255'],
            'category_id' => ['nullable','integer','exists:categories,id'],
        ];
    }

    public function messages(){
        return [
            'title.required' => 'Il titolo è richiesto',
            'title.max' => 'Il titolo non può avere più di 255 caratteri',
            'subtitle.required' => 'Il sottotitolo è richiesto',
            'subtitle.max' => 'Il sottotitolo non può avere più di 255 caratteri',
            'article_description.required' => 'La descrizione è richiesta',
            'article_description.max' => 'La descrizione non può avere più di 255 caratteri',
            'comic_number.max' => 'Il numero del fumetto non può avere più di 255 caratteri',
            'comic_year.max' => 'L\'anno del fumetto non può avere più di 255 caratteri',
            'category_id.exists' => 'La categoria non esiste',
            'image.mimes' => 'Solo jpeg, png, jpg, gif, svg sono permessi',
            'image.max' => 'La foto non può pesare più di 12Mb',
        ];
    }
}
