<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ArtUpdateValidation extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return $this->user()->can('isAdmin', User::class);;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'title' => 'required|max:255',
            'images' => 'image|mimes:jpeg,jpg,png,gif,webp',
        ];
    }

    public function messages()
    {
        return
            [
                'title.required' => 'Een titel invullen is verplicht',
                'title.max' => 'Een titel mag maximaal :max aantal tekens bevatten',
                'images.required' => 'Een afbeeldingen toevoegen is verplicht',
                'images.image' => 'Het bestand moeten een afbeelding zijn',
                'images.mimes' => 'De afbeelding moet een type hebben van: :values',
            ];
    }
}
