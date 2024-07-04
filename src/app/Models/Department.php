<?php
// app/Models/Department.php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    use HasFactory;

    protected $fillable = ['description'];

    public function employees()
    {
        return $this->hasMany(Employee::class, 'Department_idDepartment');
    }
}
