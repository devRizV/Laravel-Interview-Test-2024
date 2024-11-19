<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreStateRequest;
use App\Http\Requests\UpdateStateRequest;
use App\Http\Resources\ApiCollection;
use App\Http\Resources\ApiResponse;
use App\Http\Resources\StateResource;
use App\Models\State;
use Illuminate\Http\Request;

class StateApiController extends Controller
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
            $states = State::with('user:id,name,username,email', 'country:id,name,code,flag')
                ->search($request->search)
                ->sort($sortBy, $sortOrder);

            // Check for pagination
            $paginate = filter_var($request->paginate, FILTER_VALIDATE_BOOLEAN);
            $result = $request->has('paginate') && $paginate
                ? $states->paginate(10)
                : $states->get();

            // Return success response
            return new ApiCollection($result, "States retrieved successfully.");
        } catch (\Throwable $th) {
            // Log the error for debugging purposes
            \Log::error('Error fetching states: ' . $th->getMessage());

            return response()->json([
                'status' => 'error',
                'message' => 'An error occurred while retrieving states.',
                'error' => $th->getMessage(),
            ], 500);
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreStateRequest $request)
    {
        try {
            $validated = $request->validated();
            $state = $request->user()->states()->create($validated);
            // $state = State::create($validated);

            $state->load('user', 'country');

            return new ApiResponse($state, "State has been added successfully.");
        } catch (\Throwable $th) {
            \Log::error('Error storing a state: ' . $th->getMessage());

            return response()->json([
                'status' => 'error',
                'message' => 'An error occurred while storing a State.',
                'error' => $th->getMessage(),
            ], 500);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(State $state)
    {
        try {
            if (!$state) {
                return response()->json([
                    'status' => 'error',
                    'message' => 'State not found.'
                ], 404);
            }

            $state->load('user', 'country');

            return response()->json([
                'status' => 'success',
                'data' => new StateResource($state),
                'message' => 'State retrieved successfully.'
            ]);
        } catch (\Throwable $th) {
            \Log::error('Error retrieving the state: ' . $th->getMessage());

            return response()->json([
                'status' => 'error',
                'message' => 'An error occurred while retrieving the state.',
                'error' => $th->getMessage(),
            ], 500);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateStateRequest $request, State $state)
    {
        try {
            $validated = $request->validated();

            $state->update($validated);

            $state->load('user', 'country');

            return response()->json([
                'status' => 'success',
                'data' => new StateResource($state),
                'message' => 'State information updated successfully.'
            ], 200);
        } catch (\Throwable $th) {
            \Log::error('Error updating state: ' . $th->getMessage());

            return response()->json([
                'status' => 'error',
                'message' => 'Error occured while updating the State.',
                'error' => $th->getMessage(),
            ], 500);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(State $state)
    {
        try {
            $state->delete();

            return response()->json([
                'status' => 'success',
                'message' => 'The state record deleted successfully.'
            ]);
        } catch (\Throwable $th) {
            \Log::error("Error deleting the state record:", $th->getMessage());

            return response()->json([
                'status' => 'error',
                'message' => 'An error occured while deleting the state record.',
                'error' => $th->getMessage(),
            ], 500);
        }
    }
}
