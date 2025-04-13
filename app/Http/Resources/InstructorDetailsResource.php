<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class InstructorDetailsResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        $locale = $request->getPreferredLanguage(['en', 'ar']);

        return [
            'id' => $this->id,
            'name' => $this->{'name_' . $locale},
            'position' => $this->{'position_' . $locale },
            'image' => $this->image,
            'description' => $this->{'description_' . $locale },
            // 'courses' => CourseResource::collection($this->whenLoaded('courses')),
            // 'courses' => CourseResource::collection($this->courses),
            'courses' => $this->courses->map(function ($course) use($locale) {
                return [
                    'id' => $course->id,
                    'name' => $course->{'name_' . $locale },
                ];
            }),
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
