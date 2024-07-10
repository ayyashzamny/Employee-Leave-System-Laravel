<!-- resources/views/admin/allUsers.blade.php -->
@extends('layouts.admin')

@section('content')
<div class="container mt-5">
    <h1>All Users</h1>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Employee Name</th>
                <th>Username</th>
                <th>Email</th>
                <th>Privilege Status</th>
                <th>Active Status</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($users as $user)
                <tr>
                    <td>{{ $user->id }}</td>
                    <td>{{ $user->employee->Full_Name }}</td>
                    <td>{{ $user->User_name }}</td>
                    <td>{{ $user->employee->Email }}</td>
                    <td>{{ $user->Privilage_status }}</td>
                    <td>{{ $user->Active_Status }}</td>
                    <td>
                        <a href="{{ route('users.edit', $user->id) }}" class="btn btn-primary btn-sm">Edit</a>
                        <button class="btn btn-danger btn-sm delete-btn" data-id="{{ $user->id }}">Delete</button>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>

<!-- Edit User Modal -->
<div class="modal fade" id="editUserModal" tabindex="-1" aria-labelledby="editUserModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form id="editUserForm">
                @csrf
                @method('PUT')
                <div class="modal-header">
                    <h5 class="modal-title" id="editUserModalLabel">Edit User</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <input type="hidden" id="editUserId">
                    <div class="form-group">
                        <label for="editUserName">Username</label>
                        <input type="text" class="form-control" id="editUserName" name="User_name" required>
                    </div>
                    <div class="form-group">
                        <label for="editPassword">Password</label>
                        <input type="password" class="form-control" id="editPassword" name="Password">
                    </div>
                    <div class="form-group">
                        <label for="editPrivilageStatus">Privilege Status</label>
                        <select class="form-control" id="editPrivilageStatus" name="Privilage_status" required>
                            <option value="admin">Admin</option>
                            <option value="employee">Employee</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="editActiveStatus">Active Status</label>
                        <select class="form-control" id="editActiveStatus" name="Active_Status" required>
                            <option value="active">Active</option>
                            <option value="inactive">Inactive</option>
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script>
    $(document).ready(function () {
        $('.edit-btn').on('click', function () {
            var userId = $(this).data('id');
            $.get('/admin/users/' + userId, function (data) {
                $('#editUserId').val(data.id);
                $('#editUserName').val(data.User_name);
                $('#editPrivilageStatus').val(data.Privilage_status);
                $('#editActiveStatus').val(data.Active_Status);
                $('#editUserModal').modal('show');
            });
        });

        $('#editUserForm').on('submit', function (e) {
            e.preventDefault();
            var userId = $('#editUserId').val();
            var formData = $(this).serialize();
            $.ajax({
                url: '/admin/users/' + userId,
                type: 'PUT',
                data: formData,
                success: function (data) {
                    $('#editUserModal').modal('hide');
                    location.reload();
                },
                error: function (response) {
                    var errors = response.responseJSON.errors;
                    for (var error in errors) {
                        alert(errors[error]);
                    }
                }
            });
        });

        $('.delete-btn').on('click', function () {
            var userId = $(this).data('id');
            if (confirm('Are you sure you want to delete this user?')) {
                $.ajax({
                    url: '/admin/users/' + userId,
                    type: 'DELETE',
                    success: function (data) {
                        location.reload();
                    }
                });
            }
        });
    });
</script>
@endsection