<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Matches;
class MatchController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Logic to fetch all matches
        return Matches::all();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' =>'required',
            'date' =>'required',
            'location' =>'required',
            'status' =>'required',

        ]);
        return Matches::create($request->all());
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
         // Logic to fetch a single match by ID
         return Matches::find($id);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $matches = Matches::find($id);
        $matches->update($request->all());
        return $matches;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        return Matches::destroy($id);
    }
}
