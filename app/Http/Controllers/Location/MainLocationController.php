<?php

namespace App\Http\Controllers\Location;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\Location\MainLocation;
use Illuminate\Support\Facades\Validator;

class MainLocationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $mainLocations = MainLocation::where('company_id', Auth::user()->company_id)->latest()->get();

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
        $validator = Validator::make($request->all(), [
            'name' => ['required', 'max:255',],
            // Add other validation rules as needed
        ], [
            'name.required' => 'Nama Lokasi Utama harus diisi.',
            'name.max' => 'Nama Lokasi Utama tidak boleh lebih dari :max karakter.',
            // Add custom error messages for other rules
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $company_id = Auth::user()->company_id;

        $requestData = array_merge($request->all(), ['company_id' => $company_id]);

        MainLocation::create($requestData);

        return back()->with('success', 'Data has been created successfully!');
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
        $validator = Validator::make($request->all(), [
            'name' => ['required', 'max:255',],
            // Add other validation rules as needed
        ], [
            'name.required' => 'Nama Sub Lokasi harus diisi.',
            'name.max' => 'Nama Sub Lokasi tidak boleh lebih dari :max karakter.',
            // Add custom error messages for other rules
        ]);
        // Check if validation fails
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $data = $request->all();

        $mainLocation->update($data);

        return back()->with('success', 'Data has been updated successfully!');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(MainLocation $mainLocation)
    {
        $mainLocation->delete();

        return redirect()->back()->with('success', 'Data has been deleted successfully!');
    }
}
