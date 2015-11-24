<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class MediaRequest extends Request
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
            'title' => 'required|max:255',
            'author' => 'required|max:255',
            'type_id' => 'required|string',
            'release_date' => 'date',
            'consumed' => 'boolean',
            'rating' => 'integer|max:5'
        ];
    }
}
