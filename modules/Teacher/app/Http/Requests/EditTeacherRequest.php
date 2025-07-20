<?php

namespace SchoolApi\Teacher\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class EditTeacherRequest extends FormRequest
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
                Rule::unique("teacher", "email")
                    ->ignore($this->route("id")),
            ],
            "phone" => [
                "required",
                "max:30",
                Rule::unique("teacher", "phone")
                    ->ignore($this->route("id")),
            ],
            "address" => [
                "required",
                "max:150"
            ],
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
