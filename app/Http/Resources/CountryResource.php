<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CountryResource extends JsonResource
{
    /**
     * The custom message property.
     *
     * @var string|null
     */
    protected $message;

    /**
     * Constructor to accept a custom message.
     *
     * @param mixed $resource
     * @param string|null $message
     */
    public function __construct($resource, $message = null)
    {
        // Pass the resource to the parent constructor
        parent::__construct($resource);

        // Add the custom message to the resource
        $this->message = $message ?? "Request has been processed successfully.";
    }

    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id'      => $this->id,
            'name'    => $this->name,
            'slug'    => $this->slug,
            'flag'    => $this->flag ? asset('storage/' . $this->flag) : null, // Check for flag and send flags location in the storage.
            'code'    => $this->code,
            'user_id' => $this->user_id,
            'user'    => new UserResource($this->whenLoaded('user')),
        ];
    }
}
