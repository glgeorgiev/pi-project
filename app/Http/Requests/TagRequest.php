<?php

namespace App\Http\Requests;

class TagRequest extends Request
{
    protected $modelName = 'tag';

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
            'title'     => 'required|max:255',
            'slug'      => 'required|max:255|unique:tags,slug' . $this->idOrEmpty,
            'image_id'  => 'integer|exists:images,id',
        ];
    }
}
