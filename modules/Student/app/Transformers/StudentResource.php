<?php

namespace SchoolApi\Student\Transformers;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class StudentResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     */
    public function toArray(Request $request): array
    {
        return [
            "id" => $this->id,
            "code" => $this->code,
            "first_name" => $this->first_name,
            "last_name" => $this->last_name,
            "birthday" => $this->birthday,
            "address" => $this->address,
            "phone" => $this->phone,
            "email" => $this->email,
            "created_at" => $this->created_at,
        ];
    }
}
