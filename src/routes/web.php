<?php

use Illuminate\Support\Facades\Route;


// routes/web.php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\DesignationController;
use App\Http\Controllers\LeaveRequestController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\Auth\ResetPasswordController;


Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
Route::resource('index', EmployeeController::class);
// Route::resource('departments', DepartmentController::class);
// Route::resource('designations', DesignationController::class);
// Route::resource('annual_leaves', AnnualLeaveController::class);
// Route::resource('leave_requests', LeaveRequestController::class);
// Route::resource('users', UserController::class);

//Employee Routes Admin side
Route::get('/', [EmployeeController::class, 'index'])->name('employees.index');
// Route::get('/employees/list', [EmployeeController::class, 'list']);
Route::post('/employees/store', [EmployeeController::class, 'store']);

Route::get('/employees/{id}/edit', [EmployeeController::class, 'edit'])->name('employees.edit');
Route::put('/employees/{employee}', [EmployeeController::class, 'update'])->name('employees.update');

Route::get('/departments/list', [DepartmentController::class, 'list']);
Route::post('/departments/store', [DepartmentController::class, 'store']);

Route::get('/designations/list', [DesignationController::class, 'list']);
Route::post('/designations/store', [DesignationController::class, 'store']);

//admin user accout creation
Route::get('admin/users/create', [UserController::class, 'create'])->name('users.create');
Route::post('admin/users/store', [UserController::class, 'store'])->name('users.store');

Route::get('/users', [UserController::class, 'index'])->name('users.index');
Route::get('/users/{id}/edit', [UserController::class, 'edit'])->name('users.edit');
Route::put('/users/{id}', [UserController::class, 'update'])->name('users.update');
Route::delete('/users/{id}', [UserController::class, 'destroy'])->name('users.destroy');

Route::get('login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('login', [LoginController::class, 'login'])->name('login');
Route::post('logout', [LoginController::class, 'logout'])->name('logout');


// Admin routes
Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

// Employee routes
Route::get('employee/home', [EmployeeController::class, 'home'])->name('employee.home');


Route::get('/employee/leave-requests', [LeaveRequestController::class, 'index'])->name('leave.requests.index');
Route::post('/employee/leave-requests', [LeaveRequestController::class, 'store'])->name('leave.requests.store');


Route::get('/leave-requests', [LeaveRequestController::class, 'AdminIndex'])->name('Adminleave-requests.index');
Route::post('/leave-requests/{leaveRequest}/{status}', [LeaveRequestController::class, 'updateStatus'])
    ->name('leave-requests.update-status');


// reset password routes

Route::get('/forgot-password', [ForgotPasswordController::class, 'showLinkRequestForm'])->name('password.request');
Route::post('/forgot-password', [ForgotPasswordController::class, 'sendResetLinkEmail'])->name('password.email');
Route::get('/reset-password/{token}', [ResetPasswordController::class, 'showResetForm'])->name('password.reset');
Route::post('/reset-password', [ResetPasswordController::class, 'reset'])->name('password.update');
