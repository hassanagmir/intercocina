<?php

namespace App\Http\Controllers;

use App\Models\City;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CityController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return City::select('id', 'name', 'slug', 'country_id')
            ->with(['country:id,name'])
            ->orderBy('name')
            ->get();
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name'       => 'required|string|max:255|unique:cities,name',
            'country_id' => 'required|exists:countries,id',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'message' => 'Validation error.',
                'errors'  => $validator->errors(),
            ], 422);
        }

        $city = City::create($validator->validated());

        return response()->json([
            'message' => 'City created successfully.',
            'data'    => $city,
        ]);
    }

    /**
     * Display the specified resource using slug.
     */
    public function show($slug)
    {
        $city = City::where('slug', $slug)->with('country')->firstOrFail();

        return $city;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $slug)
    {
        $city = City::where('slug', $slug)->firstOrFail();

        $validator = Validator::make($request->all(), [
            'name'       => 'sometimes|string|max:255|unique:cities,name,' . $city->id,
            'country_id' => 'sometimes|exists:countries,id',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'message' => 'Validation error.',
                'errors'  => $validator->errors(),
            ], 422);
        }

        // Updating will auto-regenerate slug if 'name' changed
        $city->update($validator->validated());

        return response()->json([
            'message' => 'City updated successfully.',
            'data'    => $city->refresh(),
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($slug)
    {
        $city = City::where('slug', $slug)->firstOrFail();
        $city->delete();

        return response()->json([
            'message' => 'City deleted successfully.',
        ]);
    }
}
