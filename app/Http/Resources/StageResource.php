<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class StageResource extends JsonResource
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
    ];
}
}
