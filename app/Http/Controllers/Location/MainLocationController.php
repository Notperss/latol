<?php

namespace App\Http\Controllers\Location;

use App\Http\Controllers\Controller;
use App\Models\Location\MainLocation;
use Illuminate\Http\Request;

class MainLocationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $mainLocations = MainLocation::latest()->get();

        return view('pages.location.main-location.index', compact('mainLocations'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(MainLocation $mainLocation)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(MainLocation $mainLocation)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, MainLocation $mainLocation)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(MainLocation $mainLocation)
    {
        //
    }
}
