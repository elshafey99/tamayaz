<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class RegisterResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {

        $locale = $request->getPreferredLanguage(['en', 'ar']);
        $children = null;

        if ($this->type === 'parent') {
            $children = $this->children->map(function ($child)  use ($locale){
             return [
                 'id' => $child->id,
                 'name' => $child->name,
                 'email' => $child->email,
                 'birthdate' => $child->birthdate,
                 'grade' => $child->grade?->{'name_' . $locale},
                 'stage' => $child->stage?->{'name_' . $locale},
                 'image' => $child->image,
                'code_student' => $child->code_student,
             ];
         });
     }

     return [
         "id" => $this->id,
         'name' => $this->name,
         'email' => $this->email,
         'type' => $this->type,
         'birthdate' => $this->birthdate,
         'grade_id' => $this->grade?->{'name_' . $locale},
         'stage_id' => $this->stage?->{'name_' . $locale},
         'image' => $this->image,
         'code_student' => $this->code_student,

         'student' => $children,
     ];
 }
}
