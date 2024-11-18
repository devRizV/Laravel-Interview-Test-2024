<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class StateResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'slug' => $this->slug,
            'state_code' => $this->state_code,
            'country_id' => $this->country_id,
            'country' => $this->whenLoaded('country', function() {
                return [
                    'id' => $this->country->id,
                    'name' => $this->country->name,
                    'flag' => $this->country->flag,
                    'code' => $this->country->country_code,
                ];
            }),
            'user_id'       => $this->user_id,
            'user'    => new UserResource($this->whenLoaded('user')),
        ];
    }
}
