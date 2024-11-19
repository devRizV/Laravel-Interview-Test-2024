<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCityRequest;
use App\Http\Requests\UpdateCityRequest;
use App\Http\Resources\ApiCollection;
use App\Http\Resources\ApiResponse;
use App\Http\Resources\CityResource;
use App\Models\City;
use Illuminate\Http\Request;

class CityApiController extends Controller
{
    public function __construct()
    {
        // Apply middleware to all methods except 'index' and 'show'
        $this->middleware('auth:sanctum')->except(['index', 'show']);
    }

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        try {
            $sortBy = $request->sort_by ?? "id";
            $sortOrder = $request->sort_order ?? "ASC";

            // Building query
            $cities = City::with('user:id,name,username,email', 'state:id,name,state_code')
                ->search($request->search)
                ->sort($sortBy, $sortOrder);

            // Check for pagination
            $paginate = filter_var($request->paginate, FILTER_VALIDATE_BOOLEAN);
            $result = $request->has('paginate') && $paginate
                ? $cities->paginate(10)
                : $cities->get();

            // Return success response
            return new ApiCollection($result, "Cities retrieved successfully.");
        } catch (\Throwable $th) {
            // Log the error for debugging purposes
            \Log::error('Error fetching cities: ' . $th->getMessage());

            return response()->json([
                'status' => 'error',
                'message' => 'An error occurred while retrieving cities.',
                'error' => $th->getMessage(),
            ], 500);
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCityRequest $request)
    {
        try {
            $validated = $request->validated();

            $city = $request->user()->cities()->create($validated);
            // $city = City::create($validated);

            $city->load('user', 'state');

            return new ApiResponse($city, "City has been added successfully.");
        } catch (\Throwable $th) {
            \Log::error('Error storing a city: ' . $th->getMessage());

            return response()->json([
                'status' => 'error',
                'message' => 'An error occurred while storing a City.',
                'error' => $th->getMessage(),
            ], 500);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(City $city)
    {
        try {
            if (!$city) {
                return response()->json([
                    'status' => 'error',
                    'message' => 'City not found.'
                ], 404);
            }

            $city->load('user', 'state');

            return response()->json([
                'status' => 'success',
                'data' => new CityResource($city),
                'message' => 'City retrieved successfully.'
            ]);
        } catch (\Throwable $th) {
            \Log::error('Error retrieving the city: ' . $th->getMessage());

            return response()->json([
                'status' => 'error',
                'message' => 'An error occurred while retrieving the city.',
                'error' => $th->getMessage(),
            ], 500);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCityRequest $request, City $city)
    {
        try {
            $validated = $request->validated();

            $city->update($validated);

            $city->load('user', 'state');

            return response()->json([
                'status' => 'success',
                'data' => new CityResource($city),
                'message' => 'City information updated successfully.'
            ], 200);
        } catch (\Throwable $th) {
            \Log::error('Error updating city: ' . $th->getMessage());

            return response()->json([
                'status' => 'error',
                'message' => 'Error occured while updating the city.',
                'error' => $th->getMessage(),
            ], 500);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(City $city)
    {
        try {
            $city->delete();

            return response()->json([
                'status' => 'success',
                'message' => 'The city record deleted successfully.'
            ]);
        } catch (\Throwable $th) {
            \Log::error("Error deleting the city record:", $th->getMessage());

            return response()->json([
                'status' => 'error',
                'message' => 'An error occured while deleting the city record.',
                'error' => $th->getMessage(),
            ], 500);
        }
    }
}
