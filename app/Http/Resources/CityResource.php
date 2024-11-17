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
                    'id' => $this->id,
                    'name' => $this->name,
                    'state_code' => $this->state_code,
                    'country_id' => $this->country_id,
                ];
            }),
            'user_id'       => $this->user_id,
            'user'          => $this->whenLoaded('user', function () {
                return [
                    'id'        => $this->user->id,
                    'name'      => $this->user->name,
                    'username'  => $this->user->username,
                    'email'     => $this->user->email,
                ];
            }),
        ];
    }
}
