<?php

namespace App\Http\Controllers\Location;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Location\SubLocation;
use Illuminate\Support\Facades\Auth;
use App\Models\Location\MainLocation;
use Illuminate\Support\Facades\Validator;

class SubLocationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $companyId = Auth::user()->company_id;
        $mainLocations = MainLocation::where('company_id', $companyId)->latest()->get();
        $subLocations = SubLocation::where('company_id', $companyId)->latest()->get();

        return view('pages.location.sub-location.index', compact('mainLocations', 'subLocations'));
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
        $validator = Validator::make($request->all(), [
            'main_location_id' => ['required', 'exists:main_locations,id',],
            'name' => ['required', 'max:255',],
            // Add other validation rules as needed
        ], [
            'main_location.required' => 'Nama Lokasi Utama harus diisi.',
            'name.required' => 'Nama Sub Lokasi harus diisi.',
            'name.max' => 'Nama Lokasi Utama tidak boleh lebih dari :max karakter.',
            // Add custom error messages for other rules
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $company_id = Auth::user()->company_id;

        $requestData = array_merge($request->all(), ['company_id' => $company_id]);

        SubLocation::create($requestData);

        return back()->with('success', 'Data has been created successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(SubLocation $subLocation)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(SubLocation $subLocation)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, SubLocation $subLocation)
    {
        $validator = Validator::make($request->all(), [
            'main_location_id' => ['required', 'exists:main_locations,id',],
            'name' => ['required', 'max:255',],
            // Add other validation rules as needed
        ], [
            'main_location.required' => 'Nama Lokasi Utama harus diisi.',
            'name.required' => 'Nama Sub Lokasi harus diisi.',
            'name.max' => 'Nama Lokasi Utama tidak boleh lebih dari :max karakter.',
            // Add custom error messages for other rules
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $data = $request->all();

        $subLocation->update($data);

        return back()->with('success', 'Data has been updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(SubLocation $subLocation)
    {
        $subLocation->delete();

        return redirect()->back()->with('success', 'Data has been deleted successfully!');
    }
}
