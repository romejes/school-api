<?php

namespace SchoolApi\EducationLevel\Transformers;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class SublevelResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     */
    public function toArray(Request $request): array
    {
        return [
            "code"  => $this->code,
            "name"  => $this->name,
            "level" => new LevelResource($this->level)
        ];
    }
}
