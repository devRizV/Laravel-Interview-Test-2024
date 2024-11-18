<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\ResourceCollection;
use Illuminate\Pagination\AbstractPaginator;

class ApiCollection extends ResourceCollection
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
     * @param mixed $response
     * @param string|null $message
     */
    public function __construct($response, $message = null)
    {
        parent::__construct($response);

        $this->message = $message ?? 'Request has been processed successfully.';
    }

    /**
     * Transform the resource collection into an array.
     *
     * @return array<int|string, mixed>
     */
    public function toArray(Request $request): array
    {
        $response = [
            'status' => 'success',
            'data' => $this->collection,
            'message' => $this->message,
        ];

        $this->addPaginationDataIfNeeded($response);

        return $response;
    }

    protected function addPaginationDataIfNeeded($response)
    {
        if ($this->resource instanceof AbstractPaginator) {
            $response['meta'] = [
                'total' => $this->total(),
                'count' => $this->count(),
                'per_page' => $this->perPage(),
                'current_page' => $this->currentPage(),
                'last_page' => $this->lastPage(),
            ];

            $response['links'] = [
                'first' => $this->url(1),
                'last' => $this->url($this->lastPage()),
                'prev' => $this->previousPageUrl(),
                'next' => $this->nextPageUrl(),
            ];
        }
    }
}
