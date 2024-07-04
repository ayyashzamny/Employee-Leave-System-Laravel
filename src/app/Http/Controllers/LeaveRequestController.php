<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\LeaveRequest;

use RealRashid\SweetAlert\Facades\Alert;
use App\Http\Controllers\Controller;


class LeaveRequestController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        if (!$user) {
            return redirect()->route('login')->with('error', 'You need to be logged in to view leave requests.');
        }

        // Fetch employee_id through the user's relationship with User model
        $employee_id = $user->employee_id;

        // Retrieve leave requests for the current employee
        $leaveRequests = LeaveRequest::where('employee_id', $employee_id)->get();

        return view('employee.leave_requests', compact('leaveRequests'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'Leave_Type' => 'required|string|max:45',
            'Requested_Leave_Date_from' => 'required|date',
            'Requested_Leave_Date_to' => 'nullable|date',
            'Description' => 'required|string|max:945',
        ]);

        $user = Auth::user();

        if (!$user) {
            return response()->json(['error' => 'You need to be logged in to apply for leave.'], 403);
        }

        // Fetch employee_id through the user's relationship with User model
        $employee_id = $user->employee_id;
        $user_id = $user->id;

        // Create a new leave request
        LeaveRequest::create([
            'employee_id' => $employee_id,
            'Date' => now()->format('Y-m-d'),
            'Leave_Type' => $request->Leave_Type,
            'Requested_Leave_Date_from' => $request->Requested_Leave_Date_from,
            'Requested_Leave_Date_to' => $request->Requested_Leave_Date_to,
            'Description' => $request->Description,
            'Confirmed_status' => 'pending',
            'User_id' => $user_id,
        ]);

        return response()->json(['message' => 'Leave request submitted successfully.']);
    }
    public function AdminIndex()
    {
        // Load leave requests with relationships
        $leaveRequests = LeaveRequest::with('Employee')->get();
        return view('admin.leave_requests', compact('leaveRequests'));
    }

    public function updateStatus(Request $request, LeaveRequest $leaveRequest, $status)
    {
        // Validate status
        if (!in_array($status, ['approved', 'rejected'])) {
            abort(400, 'Invalid status');
        }

        // Update leave request status
        $leaveRequest->update(['Confirmed_status' => $status]);

        // Return success message
        $message = $status == 'approve' ? 'Leave request approved successfully' : 'Leave request rejected successfully';
        return response()->json(['message' => $message]);
    }

}
