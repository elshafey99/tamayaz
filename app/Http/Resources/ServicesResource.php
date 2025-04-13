<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ServicesResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        $locale = $request->getPreferredLanguage(['en', 'ar']);

        return [
            'id' => $this->id,
            'name' => $this->{'name_' . $locale},
            'description' => $this->{'description_' . $locale},
            'image' => $this->image,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
