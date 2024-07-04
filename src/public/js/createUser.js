document.addEventListener('DOMContentLoaded', function () {
    const employeeIdSelect = document.getElementById('Employee_id');
    const employeeNameInput = document.getElementById('Employee_name');

    employeeIdSelect.addEventListener('change', function () {
        const selectedOption = employeeIdSelect.options[employeeIdSelect.selectedIndex];
        const employeeName = selectedOption.getAttribute('data-name');
        employeeNameInput.value = employeeName;
    });

    const form = document.getElementById('createUserForm');
    form.addEventListener('submit', function (event) {
        event.preventDefault();
        const formData = new FormData(form);
        const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

        Swal.fire({
            title: 'Are you sure?',
            text: "Do you really want to add this employee?",
            icon: 'question',
            showCancelButton: true,
            confirmButtonText: 'Add',
            cancelButtonText: 'Cancel'
        }).then((result) => {
            if (result.isConfirmed) {
                fetch(form.action, {
                    method: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': csrfToken,
                        'Accept': 'application/json'
                    },
                    body: formData
                })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        Swal.fire({
                            icon: 'success',
                            title: 'Success',
                            text: data.message
                        });
                        form.reset();
                    } else {
                        Swal.fire({
                            icon: 'error',
                            title: 'Error',
                            text: data.message
                        });
                    }
                })
                .catch(error => {
                    Swal.fire({
                        icon: 'error',
                        title: 'Error',
                        text: 'Something went wrong!'
                    });
                });
            }
        });
    });
});
