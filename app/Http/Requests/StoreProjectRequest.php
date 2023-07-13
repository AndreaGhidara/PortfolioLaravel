<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProjectRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            "title" => "required|min:3|max:50",
            "description" => "nullable|min:5|max:50",
            "imgPath" => "nullable|min:5",
            "artist" => "required|min:3|max:30",
        ];
    }

    public function messages()
    {
        return [
            "title.required" => "Il titolo è obbligatorio",
            "title.min" => "Il titolo deve essere almeno di :min caratteri",

            "description.min" => "la description deve essere almeno di :min caratteri",
            "description.min" => "la description puo essere al massimo di :max caratteri",

            "imgPath.min" => "l' imgPath deve essere almeno di :min caratteri",

            "artist.required" => "l' artist è obligatorio",
            "artist.min" => "l' artist deve essere almeno di :min caratteri",
            "artist.max" => "l' artist puo essere al massimo di :max caratteri",

        ];
    }
}
