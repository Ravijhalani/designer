<script>
    $(document).ready(function() {
        $('#userForm').on('submit', function(e) {
            e.preventDefault();


            $('.text-danger').text('');

            var formData = new FormData(this);

            $.ajax({
                url: $(this).attr('action'),
                method: $(this).attr('method'),
                data: formData,
                contentType: false,
                processData: false,
                success: function(response) {
                    if (!response.status) {
                        var errors = response.errors;
                        $.each(errors, function(key, value) {
                            $('#' + key + '_error').text(value[0]);
                        });
                        toastr.error('Please correct the errors and try again.');
                    } else {
                        toastr.success(response.message);
                        window.location.href = "{{ route('basicinfo') }}#education-information";


                    }
                },
                error: function(xhr) {
                    alert('An error occurred. Please try again.');
                }
            });
        });
    });

    function previewImage(event) {
        const reader = new FileReader();
        reader.onload = function () {
            const output = document.getElementById('imagePreview');
            output.src = reader.result;
        };
        reader.readAsDataURL(event.target.files[0]);
    }
    </script>


