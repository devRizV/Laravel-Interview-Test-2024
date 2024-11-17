<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CountryResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id'            => $this->id,
            'name'          => $this->name,
            'slug'          => $this->slug,
            'flag'          => $this->flag ? asset('storage/' . $this->flag) : null, // Check for flag and send flags location in the storage.
            'country_code'  => $this->country_code,
            'user_id'       => $this->user_id,
            'user'          => $this->whenLoaded('user', function() {
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
