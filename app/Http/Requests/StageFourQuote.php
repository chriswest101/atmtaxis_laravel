<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StageFourQuote extends FormRequest
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
            'date' => 'required|date_format:Y-m-d',
            'time' => 'required',
            'name' => 'required|string',
            'email' => 'required|email',
            'no_of_people' => 'required|numeric|min:1|max:10',
            'nextstage' => 'required|in:stagetwo,stagethree,stagefour'
        ];
    }
}
