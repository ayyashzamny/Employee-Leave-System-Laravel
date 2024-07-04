@extends('layouts.admin')

@section('content')
<div class="container mt-5">
    <h1>Edit Employee</h1>
    <form id="editEmployeeForm" action="{{ route('employees.update', $employee->id) }}" method="POST">
        @csrf
        @method('PUT')

        <!-- Input fields populated with existing data -->
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="first_name">First Name</label>
                    <input type="text" class="form-control" id="first_name" name="first_name"
                        value="{{ $employee->First_Name }}" required>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="last_name">Last Name</label>
                    <input type="text" class="form-control" id="last_name" name="last_name"
                        value="{{ $employee->Last_Name }}" required>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="full_name">Full Name</label>
                    <input type="text" class="form-control" id="full_name" name="full_name"
                        value="{{ $employee->Full_Name }}" readonly required>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="nic">NIC</label>
                    <input type="text" class="form-control" id="nic" name="nic" value="{{ $employee->LNIC }}" required>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="gender">Gender</label>
                    <select class="form-control" id="gender" name="gender" required>
                        <option value="Male" {{ $employee->Gender == 'Male' ? 'selected' : '' }}>Male</option>
                        <option value="Female" {{ $employee->Gender == 'Female' ? 'selected' : '' }}>Female</option>
                    </select>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="contact_no1">Contact No 1</label>
                    <input type="number" class="form-control" id="contact_no1" name="contact_no1"
                        value="{{ $employee->Contact_no1 }}" required>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="contact_no2">Contact No 2</label>
                    <input type="number" class="form-control" id="contact_no2" name="contact_no2"
                        value="{{ $employee->Contact_no2 }}" required>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="address">Address</label>
                    <input type="text" class="form-control" id="address" name="address" value="{{ $employee->Address }}"
                        required>
                </div>
            </div>
        </div>

        <div class="form-group">
            <button type="button" id="updateEmployeeBtn" class="btn btn-primary">Update Employee</button>
        </div>
    </form>
</div>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

@endsection