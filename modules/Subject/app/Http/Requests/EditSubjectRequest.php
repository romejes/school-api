<?php

namespace SchoolApi\Subject\Http\Requests;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class EditSubjectRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     */
    public function rules(): array
    {
        return [
            "name" => [
                "required",
                "max:100"
            ],
            "code" => [
                "required",
                "max:5",
                Rule::unique("subject")
                    ->ignore($this->route("id")),
            ]
        ];
    }

    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }
}
