<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreTestimonyRequest extends FormRequest
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
        switch($this->method()){
            case 'GET' :
                case 'DELETE':
                {
                    return [];
                }
                case 'POST' :
                    {
                    return [
                            'name' => 'required',
                            'title' => 'required',
                            'description' => 'required|string|max:855',
                            
                        ];
                    }
                    case 'PATCH':
                    case 'PUT':
                    {
                    return [
                            'name' => 'required',
                            'title' => 'required',
                            'description' => 'required|string|max:855',
                        ];
                    }
        }
    }
}
