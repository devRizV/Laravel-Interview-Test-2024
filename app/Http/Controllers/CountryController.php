<?php

namespace App\Http\Controllers;

use App\Models\Country;
use App\Http\Requests\StoreCountryRequest;
use App\Http\Requests\UpdateCountryRequest;

class CountryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $countries = Country::with('user:id,name,username,email')->get();

        return view('country.index', compact('countries'));
    }

    /**
     * Store a newly created resource in storage.
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

            return response()->json([
                'status' => 'success',
                'data' => $country,
                'message' => "Country has been added successfully.",
            ]);
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
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Country $country)
    {
        //
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
                'data' => $country,
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
        //
    }
}
