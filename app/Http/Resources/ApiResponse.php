<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ApiResponse extends JsonResource
{

    /**
     * The custom message property.
     *
     * @var string|null
     */
    public $message;

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
        $this->message = $message;
    }

    /**
     * Transforms the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array<string, mixed>
     */
    public function toArray(Request $request)
    {
        return [
            'status' => 'success',
            'message' => $this->message ?? null,
            'data' => $this->resource,
        ];
    }
}