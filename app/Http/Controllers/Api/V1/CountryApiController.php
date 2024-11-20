<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCountryRequest;
use App\Http\Requests\UpdateCountryRequest;
use App\Http\Resources\ApiCollection;
use App\Http\Resources\ApiResponse;
use App\Http\Resources\CountryResource;
use App\Models\Country;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CountryApiController extends Controller
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
            $countries = Country::with('user:id,name,username,email')
                ->search($request->search)
                ->sort($sortBy, $sortOrder);
            $paginate = filter_var($request->paginate, FILTER_VALIDATE_BOOLEAN);
            // Check for pagination
            $result = $request->has('paginate') && $paginate
                ? $countries->paginate(10)
                : $countries->get();

            // Return success response
            return new ApiCollection($result, "Countries retrieved successfully.");

        } catch (\Throwable $th) {
            // Log the error for debugging purposes
            \Log::error('Error fetching countries: ' . $th->getMessage());

            return response()->json([
                'status' => 'error',
                'message' => 'An error occurred while retrieving countries.',
                'error' => $th->getMessage(),
            ], 500);
        }
    }


    /**
     * Store a newly created resource in storage.
     *
     */
    public function store(StoreCountryRequest $request)
    {
        try {
            $validated = $request->validated();

            if ($request->hasFile('flag')) {
                // get the original extension
                $extension = $request->file('flag')->extension();

                // Generate the new file name (same as their country code)
                $filename = $validated['code'] . '.' . $extension;

                // store file in the storage
                $flagPath = $request->file('flag')->storeAs('flag', $filename, 'public');

                $validated['flag'] = $flagPath;
            }

            $country = $request->user()->countries()->create($validated);
            // $country = Country::create($validated);

            $country->load('user');

            return new ApiResponse($country, "Country has been added successfully.");
        } catch (\Throwable $th) {
            \Log::error('Error storing a country: ' . $th->getMessage());

            return response()->json([
                'status' => 'error',
                'message' => 'An error occurred while storing a country.',
                'error' => $th->getMessage(),
            ], 500);
        }

    }

    /**
     * Display the specified resource.
     */
    public function show(Country $country)
    {
        try {
            if (!$country) {
                return response()->json([
                    'status' => 'error',
                    'message' => 'Country not found.'
                ], 404);
            }

            $country->load('user');

            return response()->json([
                'status' => 'success',
                'data' => new CountryResource($country),
                'message' => 'Country retrieved successfully.'
            ], 200);
        } catch (\Throwable $th) {
            \Log::error('Error retrieving country: ' . $th->getMessage());

            return response()->json([
                'status' => 'error',
                'message' => 'An error occurred while retrieving the country.',
                'error' => $th->getMessage(),
            ], 500);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCountryRequest $request, Country $country)
    {

        try {
            $validated = $request->validated();

            if ($request->hasFile('flag')) {
                if ($country->flag && Storage::disk('public')->exists($country->flag)) {
                    Storage::disk('public')->delete($country->flag);
                }

                // get the images original extension
                $extension = $request->file('flag')->extension();

                // Generate the new file name (same as their country code)
                $filename = $validated['code'] . '.' . $extension;

                // store file in the storage
                $flagPath = $request->file('flag')->storeAs('flag', $filename, 'public');

                $validated['flag'] = $flagPath;
            }

            $country->update($validated);

            $country->load('user');

            return response()->json([
                'status' => 'success',
                'data' => new CountryResource($country),
                'message' => 'Country information updated successfully.'
            ], 200);
        } catch (\Throwable $th) {
            \Log::error('Error updating country: ' . $th->getMessage());

            return response()->json([
                'status' => 'error',
                'message' => 'Error occured while updating the country.',
                'error' => $th->getMessage(),
            ], 500);
        }
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Country $country)
    {
        try {
            // Delete the country flag
            if ($country->flag && Storage::disk('public')->exists($country->flag)) {
                Storage::disk('public')->delete($country->flag);
            }

            $country->delete();

            return response()->json([
                'status' => 'success',
                'message' => 'The country record deleted successfully.'
            ]);
        } catch (\Throwable $th) {
            \Log::error("Error deleting the country record:", $th->getMessage());

            return response()->json([
                'status' => 'error',
                'message' => 'An error occured while deleting the country record.',
                'error' => $th->getMessage(),
            ], 500);
        }
    }
}
