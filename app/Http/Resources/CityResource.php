<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CityResource extends JsonResource
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
            'state_id' => $this->state_id,
            'state' => $this->whenLoaded('state', function() {
                return [
                    'id' => $this->state->id,
                    'name' => $this->state->name,
                    'state_code' => $this->state->state_code,
                    'country_id' => $this->state->country_id,
                ];
            }),
            'user_id' => $this->user_id,
            'user'    => new UserResource($this->whenLoaded('user')),
        ];
    }
}
