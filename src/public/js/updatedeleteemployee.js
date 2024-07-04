// public/js/employee.js

// Example of deleting an employee using AJAX
$('.delete-button').on('click', function() {
    var employeeId = $(this).data('id');

    Swal.fire({
        title: 'Are you sure?',
        text: 'You won\'t be able to revert this!',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, delete it!'
    }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                type: 'DELETE',
                url: '/admin/employees/' + employeeId,
                data: {
                    "_token": "{{ csrf_token() }}",
                },
                success: function(response) {
                    Swal.fire(
                        'Deleted!',
                        response.success,
                        'success'
                    ).then((result) => {
                        location.reload(); // Reload the page after deletion
                    });
                },
                error: function(xhr) {
                    Swal.fire(
                        'Error!',
                        'Failed to delete employee.',
                        'error'
                    );
                }
            });
        }
    });
});
