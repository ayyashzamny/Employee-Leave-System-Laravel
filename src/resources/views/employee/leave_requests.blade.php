<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Leave Requests</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <style>
        .status-pending {
            background-color: #ffc107;
        }
    </style>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-brand" href="#">Employee Dashboard</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ml-auto">
                @auth
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('employee.home') }}">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('leave.requests.index') }}">Leave Request</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('logout') }}" onclick="event.preventDefault();
                                            document.getElementById('logout-form').submit();">
                            Logout
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </li>
                @else
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">Login</a>
                    </li>
                @endauth
            </ul>
        </div>
    </nav>


    <div class="container mt-5">
        <div class="card">
            <div class="card-header">
                <h3>Leave Requests</h3>
            </div>
            <div class="card-body">
                <button class="btn btn-primary mb-3" data-toggle="modal" data-target="#leaveRequestModal">Apply for
                    Leave</button>

                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Leave Type</th>
                            <th>Requested From</th>
                            <th>Requested To</th>
                            <th>Description</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($leaveRequests as $leaveRequest)
                            <tr>
                                <td>{{ $leaveRequest->id }}</td>
                                <td>{{ $leaveRequest->Leave_Type }}</td>
                                <td>{{ $leaveRequest->Requested_Leave_Date_from }}</td>
                                <td>{{ $leaveRequest->Requested_Leave_Date_to }}</td>
                                <td>{{ $leaveRequest->Description }}</td>
                                <td class="{{ $leaveRequest->Confirmed_status == 'pending' ? 'status-pending' : '' }}">
                                    @if($leaveRequest->Confirmed_status == 'approved')
                                        <span class="text-success font-weight-bold"><i class="fas fa-check-circle"></i>
                                            {{ $leaveRequest->Confirmed_status }}</span>
                                    @elseif($leaveRequest->Confirmed_status == 'rejected')
                                        <span class="text-danger font-weight-bold"><i class="fas fa-times-circle"></i>
                                            {{ $leaveRequest->Confirmed_status }}</span>
                                    @else
                                        <span class="font-weight-bold"><i class="fas fa-clock"></i>
                                            {{ $leaveRequest->Confirmed_status }}</span>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Leave Request Modal -->
    <div class="modal fade" id="leaveRequestModal" tabindex="-1" aria-labelledby="leaveRequestModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="leaveRequestModalLabel">Apply for Leave</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="leaveRequestForm">
                        @csrf
                        <input type="hidden" name="user_id" value="{{ Auth::id() }}">
                        <div class="form-group">
                            <label for="Leave_Type">Leave Type</label>
                            <select name="Leave_Type" id="Leave_Type" class="form-control" required>
                                <option value="Casual Leave">Casual Leave</option>
                                <option value="Medical Leave">Medical Leave</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="Requested_Leave_Date_from">Requested Leave Date From</label>
                            <input type="date" name="Requested_Leave_Date_from" id="Requested_Leave_Date_from"
                                class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="Requested_Leave_Date_to">Requested Leave Date To</label>
                            <input type="date" name="Requested_Leave_Date_to" id="Requested_Leave_Date_to"
                                class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="Description">Description</label>
                            <textarea name="Description" id="Description" class="form-control" rows="3"
                                required></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const form = document.getElementById('leaveRequestForm');
            const startDateInput = document.getElementById('Requested_Leave_Date_from');
            const endDateInput = document.getElementById('Requested_Leave_Date_to');

            // Set minimum date for the start date input to today's date
            const today = new Date().toISOString().split('T')[0];
            startDateInput.setAttribute('min', today);

            startDateInput.addEventListener('change', function () {
                endDateInput.setAttribute('min', this.value);
            });

            form.addEventListener('submit', function (event) {
                event.preventDefault();

                Swal.fire({
                    title: 'Are you sure?',
                    text: "Do you really want to apply for leave?",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, apply for leave!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        const formData = new FormData(form);
                        const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

                        fetch("{{ route('leave.requests.store') }}", {
                            method: 'POST',
                            headers: {
                                'X-CSRF-TOKEN': csrfToken,
                                'Accept': 'application/json',
                            },
                            body: formData
                        })
                            .then(response => response.json())
                            .then(data => {
                                if (data.message) {
                                    Swal.fire({
                                        icon: 'success',
                                        title: 'Success',
                                        text: data.message
                                    }).then(() => {
                                        $('#leaveRequestModal').modal('hide'); // Close the modal
                                        location.reload(); // Reload the page
                                    });
                                    form.reset();
                                } else {
                                    Swal.fire({
                                        icon: 'error',
                                        title: 'Error',
                                        text: data.error || 'Something went wrong!'
                                    });
                                }
                            })
                            .catch(error => {
                                console.error('Error:', error);
                                Swal.fire({
                                    icon: 'error',
                                    title: 'Error',
                                    text: 'Failed to submit leave request. Please try again.'
                                });
                            });
                    }
                });
            });
        });
    </script>
</body>

</html>