<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Gate;

class StoreUploadRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return Gate::allows('upload_access');
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'title' => [
                'required', 'string',
            ] ,
            'description' => [
                'required', 'string',
            ] ,
            'duration' => [
                'required', 'integer',
            ] ,
            'assingedLesson' => [
                'required', 'string',
            ] ,
            'lessonType' => [
                'required', 'string',
            ]

        ];
    }
}
