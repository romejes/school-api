<?php

namespace SchoolApi\Student\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateStudentRequest extends FormRequest
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
                "email",
                "unique:student,email",
                "max:80"
            ],
            "phone" => [
                "required",
                "unique:student,phone",
                "max:30"
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
