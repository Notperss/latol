<?php

namespace App\Http\Controllers\DailyActivity;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\DailyActivity\WorkType;
use Illuminate\Support\Facades\Validator;

class WorkTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $workTypes = WorkType::where('company_id', Auth::user()->company_id)->latest()->get();

        return view('pages.daily-activity.work-type.index', compact('workTypes'));
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
        ], [
            'name.required' => 'Nama Pekerjaan harus diisi.',
            'name.max' => 'Nama Pekerjaan tidak boleh lebih dari :max karakter.',
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $company_id = Auth::user()->company_id;

        $requestData = array_merge($request->all(), ['company_id' => $company_id]);

        WorkType::create($requestData);

        return back()->with('success', 'Data has been created successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(WorkType $workType)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(WorkType $workType)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, WorkType $workType)
    {
        $validator = Validator::make($request->all(), [
            'name' => ['required', 'max:255',],
        ], [
            'name.required' => 'Nama Pekerjaan harus diisi.',
            'name.max' => 'Nama Pekerjaan tidak boleh lebih dari :max karakter.',
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $data = $request->all();
        $workType->update($data);

        return back()->with('success', 'Data has been updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(WorkType $workType)
    {
        $workType->delete();

        return redirect()->back()->with('success', 'Data has been deleted successfully!');
    }
}
