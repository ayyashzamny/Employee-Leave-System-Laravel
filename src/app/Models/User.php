<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'Employee_id',
        'User_name',
        'Password',
        'Privilage_status',
        'Active_Status'
    ];

    protected $hidden = [
        'Password',
        'remember_token',
    ];

    // Password hashing method
    public function getAuthPassword()
    {
        return $this->Password;
    }

    use Notifiable;

    // Define the relationship
    public function employee()
    {
        return $this->hasOne(Employee::class);
    }
}
