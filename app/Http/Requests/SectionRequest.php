<?php

namespace App\Http\Requests;

class SectionRequest extends Request
{
    protected $modelName = 'section';

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
            'slug'      => 'required|max:255|unique:sections,slug' . $this->idOrEmpty,
            'order'     => 'required|integer|between:1,999',
            'image_id'  => 'integer|exists:images,id',
        ];
    }
}
