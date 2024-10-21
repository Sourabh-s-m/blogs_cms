$(document).ready(function () {
    toastr.options = {
        positionClass: 'toast-top-right',
        timeOut: 5000,
        progressBar: true,
        showDuration: 500,
        hideDuration: 500,
        closeButton: true,
        maxOpened: 5,
        preventDuplicates: true
    };
    dataTable();

    var successMessage = $('#session-success').text();
    if (successMessage) {
        toastr.success(successMessage);
    }

    var statusMessage = $('#session-status').text().trim();
    if (statusMessage) {
        toastr.success(statusMessage);
    }

    var errorMessage = $('#session-error').text();
    if (errorMessage) {
        toastr.error(errorMessage);
    }
    $('#summernote').summernote({
        height: 300,
        toolbar: [
            ['style', ['bold', 'italic', 'underline', 'clear']],
            ['font', ['strikethrough', 'superscript', 'subscript']],
            ['fontname', ['fontname']],
            ['color', ['color']],
            ['para', ['ul', 'ol', 'paragraph']],
            ['table', ['table']],
            ['insert', ['link', 'picture', 'video']],
            ['view', ['fullscreen', 'codeview', 'help']]
        ]
    });
    deletefunction();
});

function dataTable() {
    if ($('#users').length) {
        $('#users').DataTable({
            responsive: true,
        });
    }
    if ($('#blogs').length) {
        $('#blogs').DataTable({
            responsive: true,
            searching: true,
        });
    }
}
function deletefunction() {
    $('.delete-blog').on('click', function () {
        let blogId = $(this).data('id');
        Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    url: baseUrl + '/blogs/' + blogId,
                    type: 'DELETE',
                    data: {
                        _token: token
                    },
                    success: function (response) {
                        if (response.success) {
                            Swal.fire(
                                'Deleted!',
                                'Your blog post has been deleted.',
                                'success'
                            ).then(() => {
                                location.reload();
                            });
                        } else {
                            Swal.fire(
                                'Error!',
                                'There was an error deleting the blog post.',
                                'error'
                            );
                        }
                    },
                    error: function () {
                        Swal.fire(
                            'Error!',
                            'An error occurred while deleting the blog post.',
                            'error'
                        );
                    }
                });
            }
        });
    });
    $('.delete-user').on('click', function () {
        let blogId = $(this).data('id');
        Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this! (Related blogs also will get deleted)",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    url: baseUrl + '/users/' + blogId,
                    type: 'DELETE',
                    data: {
                        _token: token
                    },
                    success: function (response) {
                        if (response.success) {
                            Swal.fire(
                                'Deleted!',
                                'User has been deleted.',
                                'success'
                            ).then(() => {
                                location.reload();
                            });
                        } else {
                            Swal.fire(
                                'Error!',
                                'There was an error deleting the blog post.',
                                'error'
                            );
                        }
                    },
                    error: function () {
                        Swal.fire(
                            'Error!',
                            'An error occurred while deleting the blog post.',
                            'error'
                        );
                    }
                });
            }
        });
    });
}