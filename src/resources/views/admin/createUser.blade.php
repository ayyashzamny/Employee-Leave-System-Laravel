@extends('layouts.admin')

@section('content')
<div class="container mt-5">
    @auth
        @if(auth()->user()->Privilage_status === 'admin')
            <h1>Create User</h1>
            <form action="{{ route('users.store') }}" method="POST" id="createUserForm">
                @csrf

                <div class="form-group">
                    <label for="Employee_id">Employee ID</label>
                    <select class="form-control" id="Employee_id" name="Employee_id" required>
                        <option value="" disabled selected>Select Employee ID</option>
                        @foreach($employees as $employee)
                            <option value="{{ $employee->id }}" data-name="{{ $employee->Full_Name }}">{{ $employee->id }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label for="Employee_name">Employee Name</label>
                    <input type="text" class="form-control" id="Employee_name" name="Employee_name" readonly>
                </div>

                <div class="form-group">
                    <label for="User_name">Username</label>
                    <input type="text" class="form-control" id="User_name" name="User_name" required>
                </div>

                <div class="form-group">
                    <label for="Password">Password</label>
                    <input type="password" class="form-control" id="Password" name="Password" required>
                </div>

                <div class="form-group">
                    <label for="Privilage_status">Privilege Status</label>
                    <select class="form-control" id="Privilage_status" name="Privilage_status" required>
                        <option value="admin">Admin</option>
                        <option value="employee">Employee</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="Active_Status">Active Status</label>
                    <select class="form-control" id="Active_Status" name="Active_Status" required>
                        <option value="active">Active</option>
                        <option value="inactive">Inactive</option>
                    </select>
                </div>

                <button type="submit" class="btn btn-primary">Create User</button>
            </form>
        @else
            <script>
                window.location.href = "{{ route('login') }}";
            </script>
        @endif
    @else
        <script>
            window.location.href = "{{ route('login') }}";
        </script>
    @endauth
</div>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="{{ asset('js/createUser.js') }}"></script>
@endsection