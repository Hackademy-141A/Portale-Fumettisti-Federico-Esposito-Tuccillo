<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ArticleStoreRequet extends FormRequest
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
            //regole di validazione
                'title' => 'required|min:3|max:255',
                'subtitle' => 'required|min:3|max:255',
                'article_description' => 'required|min:10|max:1000',
                'category_id' => 'required|exists:categories,id',
                'image' => 'nullable|image|mimes:jpeg,png,jpg|max:6144',
                'tags' => 'required|string',
        ];
    }

    public function messages(): array
    {
        return [
            //messaggi di errore
            'title.required' => 'Il titolo è obbligatorio.',
            'title.min' => 'Il titolo deve avere almeno 3 caratteri.',
            'title.max' => 'Il titolo non può avere più di 255 caratteri.',
            'article_description.required' => 'La descrizione è obbligatoria.',
            'article_description.min' => 'La descrizione deve avere almeno 10 caratteri.',
            'article_description.max' => 'La descrizione non può avere più di 1000 caratteri.',
            'category_id.required' => 'La categoria è da inserire obbligatoriamente.',
            'image.required' => 'L\'immagine è obbligatoria.',
            'tags.required' => 'I tag sono obbligatori.',
            'tags.string' => 'I tag devono essere di tipo testo.',
        ];
    }
}
