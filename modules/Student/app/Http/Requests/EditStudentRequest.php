<?php

namespace SchoolApi\Student\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class EditStudentRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     */
    public function rules(): array
    {
        return [
            "first_name" => [
                "required",
                "max:80"
            ],
            "last_name" => [
                "required",
                "max:100"
            ],
            "email" => [
                "required",
                "max:80",
                "email",
                Rule::unique("student", "email")
                    ->ignore($this->route("id")),
            ],
            "phone" => [
                "required",
                "max:30",
                Rule::unique("student", "phone")
                    ->ignore($this->route("id")),
            ],
            "address" => [
                "required",
                "max:150"
            ],
            "birthday" => [
                "required",
                "date:Y-m-d",
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
