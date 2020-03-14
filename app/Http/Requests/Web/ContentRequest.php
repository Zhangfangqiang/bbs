<?php

namespace App\Http\Requests\Web;

class ContentRequest extends BaseRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        switch ($this->method()) {
            case 'GET':
                return [
                    'category' => ['nullable','numeric','exists:categories,id'],
                    'field'    => ['nullable','string' ,'in:release_at,updated_at'],
                    'sort'     => ['nullable','string' ,'in:asc,desc'],
                ];
            case 'POST':
                return [];
            case'PUT':
            case'PATCH':
                return [];
        }
    }
}
