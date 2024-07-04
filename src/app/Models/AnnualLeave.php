<?php
// app/Models/AnnualLeave.php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AnnualLeave extends Model
{
    use HasFactory;

    protected $fillable = [
        'Employee_idEmployee',
        'Year',
        'Total_Casual_Leaves',
        'Total_Medical_Leaves',
        'Balance_Casual_Leaves',
        'Balance_Medical_Leaves'
    ];

    public function employee()
    {
        return $this->belongsTo(Employee::class, 'Employee_idEmployee');
    }
}
