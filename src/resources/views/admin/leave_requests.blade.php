<!-- leave_requests.blade.php -->

@extends('layouts.admin')

@section('content')
<div class="container mt-5">
    @auth
        @if(auth()->user()->Privilage_status === 'admin')
            <div class="card">
                <div class="card-header">
                    <h3>Leave Requests</h3>
                </div>
                <div class="card-body">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Employee Name</th>
                                <th>Leave Type</th>
                                <th>Requested From</th>
                                <th>Requested To</th>
                                <th>Description</th>
                                <th>Status</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($leaveRequests as $leaveRequest)
                                <tr>
                                    <td>{{ $leaveRequest->id }}</td>
                                    <td>{{ $leaveRequest->employee ? $leaveRequest->employee->Full_Name : 'N/A' }}</td>
                                    <td>{{ $leaveRequest->Leave_Type }}</td>
                                    <td>{{ $leaveRequest->Requested_Leave_Date_from }}</td>
                                    <td>{{ $leaveRequest->Requested_Leave_Date_to }}</td>
                                    <td>{{ $leaveRequest->Description }}</td>
                                    <td>
                                        @if($leaveRequest->Confirmed_status == 'approved')
                                            <span class="text-success font-weight-bold"><i class="fas fa-check-circle"></i> Approved</span>
                                        @elseif($leaveRequest->Confirmed_status == 'rejected')
                                            <span class="text-danger font-weight-bold"><i class="fas fa-times-circle"></i> Rejected</span>
                                        @else
                                            <span class="font-weight-bold"><i class="fas fa-clock"></i> Pending</span>
                                        @endif
                                    </td>
                                    <td>
                                        @if($leaveRequest->Confirmed_status == 'pending')
                                            <button class="btn btn-success btn-sm action-btn"
                                                data-id="{{ $leaveRequest->id }}" data-status="approved">
                                                Approve
                                            </button>
                                            <button class="btn btn-danger btn-sm action-btn"
                                                data-id="{{ $leaveRequest->id }}" data-status="rejected">
                                                Reject
                                            </button>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
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

<script>
    // Assuming SweetAlert is properly included and initialized elsewhere in your project
    document.addEventListener('DOMContentLoaded', function () {
        // Action button click handler
        document.querySelectorAll('.action-btn').forEach(button => {
            button.addEventListener('click', function () {
                let leaveRequestId = this.getAttribute('data-id');
                let status = this.getAttribute('data-status');
                let actionText = status == 'approved' ? 'approve' : 'reject';
                let actionColor = status == 'approved' ? '#3085d6' : '#d33';

                Swal.fire({
                    title: `Are you sure you want to ${actionText} this leave request?`,
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: actionColor,
                    cancelButtonColor: '#6c757d',
                    confirmButtonText: `Yes, ${actionText} it!`
                }).then((result) => {
                    if (result.isConfirmed) {
                        // AJAX request to update leave request status
                        fetch(`/leave-requests/${leaveRequestId}/${status}`, {
                            method: 'POST',
                            headers: {
                                'Content-Type': 'application/json',
                                'X-CSRF-TOKEN': '{{ csrf_token() }}'
                            }
                        })
                        .then(response => response.json())
                        .then(data => {
                            Swal.fire(
                                'Success!',
                                data.message,
                                'success'
                            ).then(() => {
                                location.reload(); // Reload page after success
                            });
                        })
                        .catch(error => {
                            console.error('Error:', error);
                            Swal.fire(
                                'Oops!',
                                'Something went wrong.',
                                'error'
                            );
                        });
                    }
                });
            });
        });
    });
</script>
@endsection
