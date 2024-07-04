<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employee;
use App\Models\LeaveRequest;
use App\Models\Department;
use App\Models\Designation;

class DashboardController extends Controller
{
    public function index()
    {
        $totalEmployees = Employee::count();
        $activeEmployees = Employee::where('Active_Status', 'active')->count();
        $inactiveEmployees = $totalEmployees - $activeEmployees;

        // Calculate leave request status counts
        $pendingLeaveRequests = LeaveRequest::where('Confirmed_status', 'pending')->count();
        $approvedLeaveRequests = LeaveRequest::where('Confirmed_status', 'approved')->count();
        $rejectedLeaveRequests = LeaveRequest::where('Confirmed_status', 'rejected')->count();

        // Calculate total departments and designations
        $totalDepartments = Department::count();
        $totalDesignations = Designation::count();

        return view('dashboard', compact('totalEmployees', 'activeEmployees', 'inactiveEmployees', 'pendingLeaveRequests', 'approvedLeaveRequests', 'rejectedLeaveRequests', 'totalDepartments', 'totalDesignations'));
    }
}
