<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Employee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
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
        $employees = Employee::all();
        return view('admin.createUser', compact('employees'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'Employee_id' => 'required|exists:employees,id',
            'User_name' => 'required|string|unique:users,User_name',
            'Password' => 'required|string|min:6',
            'Privilage_status' => 'required|in:admin,employee',
            'Active_Status' => 'required|in:active,inactive',
        ]);

        $user = new User([
            'Employee_id' => $request->Employee_id,
            'User_name' => $request->User_name,
            'Password' => Hash::make($request->Password),
            'Privilage_status' => $request->Privilage_status,
            'Active_Status' => $request->Active_Status,
        ]);

        $user->save();

        return response()->json(['success' => true, 'message' => 'User created successfully']);
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
