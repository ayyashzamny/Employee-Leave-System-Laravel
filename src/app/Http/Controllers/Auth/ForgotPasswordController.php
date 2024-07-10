<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;
use App\Models\User;
use App\Models\Employee;
use Illuminate\Auth\Passwords\SendsPasswordResetEmails;

class ForgotPasswordController extends Controller
{
    // use SendsPasswordResetEmails;

    /**
     * Display the form to request a password reset link.
     *
     * @return \Illuminate\View\View
     */
    public function showLinkRequestForm()
    {
        return view('auth.passwords.email');
    }

    /**
     * Send a reset link to the given employee.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function sendResetLinkEmail(Request $request)
    {
        $request->validate([
            'Employee_id' => 'required|exists:employees,id',
        ]);

        $employee = Employee::find($request->Employee_id);
        $user = User::where('Employee_id', $employee->id)->first();

        if ($user) {
            $response = Password::broker()->sendResetLink(['email' => $employee->Email]);

            return $response == Password::RESET_LINK_SENT
                ? back()->with('status', trans($response))
                : back()->withErrors(['email' => trans($response)]);
        }

        return back()->withErrors(['Employee_id' => 'User not found for the given Employee ID.']);
    }
}
