<?php

namespace App\Http\Controllers;

use App\Models\State;
use App\Http\Requests\StoreStateRequest;
use App\Http\Requests\UpdateStateRequest;

class StateController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('state.index');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreStateRequest $request)
    {
        try {
            $validated = $request->validated();
            $state = $request->user()->states()->create($validated);

            $state->load('user', 'country');

            return response()->json([
                'status' => 'success',
                'data' => $state,
                'message' => "State has been added successfully."
            ]);
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
        //
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
                'data' => $state,
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
