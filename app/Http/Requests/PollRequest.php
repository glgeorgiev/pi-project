<?php

namespace App\Http\Requests;

class PollRequest extends Request
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
            'title'             => 'required|max:255',
            'show_in_sidebar'   => 'required|boolean',
            'poll_answers'      => 'required|array|min:2',
        ];
    }
}
