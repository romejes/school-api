<?php

namespace SchoolApi\Teacher\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ListTeachersRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     */
    public function rules(): array
    {
        return [
            "per_page" => [
                "nullable",
                "integer",
                "min:10",
                "max:100"
            ],
            "search" => ["nullable"],
        ];
    }

    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    protected function perPage(): int
    {
        return $this->perPage ?? 10;
    }
}
