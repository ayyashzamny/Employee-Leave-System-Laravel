<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Designation;

class DesignationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    public function list()
    {
        return Designation::all();
    }

    public function store(Request $request)
    {
        // Validate the request
        $request->validate([
            'designation_name' => 'required|string|max:255',
        ]);

        // Create a new department
        $designation = new Designation();
        $designation->description = $request->designation_name;
        $designation->save();

        // Return the response
        return response()->json(['success' => true, 'message' => 'Designation added successfully!']);
    }



    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
