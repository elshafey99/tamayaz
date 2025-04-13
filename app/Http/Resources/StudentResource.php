<?php

namespace App\Http\Resources;

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
            'id'         => $this->id,
            'name'       => $this->name,
            'email'      => $this->email,
            'image'      => $this->image,
            'brithdate'  => $this->brithdate,
            'grade'      => $this->grade?->name,
            'stage'      => $this->stage?->name,
            'code_student' => $this->code_student,
        ];
    }
}
