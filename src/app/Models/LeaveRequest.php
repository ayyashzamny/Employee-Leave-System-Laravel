<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LeaveRequest extends Model
{
    use HasFactory;

    protected $fillable = [
        'employee_id',
        'Date',
        'Leave_Type',
        'Requested_Leave_Date_from',
        'Requested_Leave_Date_to',
        'Description',
        'Confirmed_status',
        'Confirmed_Leave_Date_from',
        'Confirmed_Leave_Date_to',
        'User_id'
    ];

    // Define the relationship with Employee
    public function employee()
    {
        return $this->belongsTo(Employee::class, 'employee_id'); // Corrected the foreign key
    }

    // Define the relationship with User
    public function user()
    {
        return $this->belongsTo(User::class, 'User_id');
    }
}
