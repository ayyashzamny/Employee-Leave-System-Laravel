<?php
// app/Models/Employee.php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;

    protected $fillable = [
        'First_Name',
        'Last_Name',
        'Full_Name',
        'LNIC',
        'Gender',
        'Contact_no1',
        'Contact_no2',
        'Address',
        'Active_Status',
        'Permenent_date',
        'Department_idDepartment',
        'Designation_idDesignation',
        'Email',
        'Password'
    ];

    protected $hidden = [
        'Password',
    ];

    public function department()
    {
        return $this->belongsTo(Department::class, 'Department_idDepartment');
    }

    public function designation()
    {
        return $this->belongsTo(Designation::class, 'Designation_idDesignation');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
