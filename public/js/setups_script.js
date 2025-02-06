
         $(document).ready(function () {
            function loadSetups (search_input) {
                $.ajax({
                    url: '/setups/search',
                    type: 'GET',
                    data: { search_input: search_input },
                    beforeSend: function () {
                        $('#loadingLabel').show();
                        $('.spinner-border').show();
                    },
                    success: function (response) {
                        $('#setupsTableBody').html(response.setups_table_content);
                    },
                    error: function () {
                        $('#setupsTableBody').html('<h1>Error while loading setups.</h1>');
                    },
                    complete: function () {
                        $('#loadingLabel').hide();
                    }
                });
            }
            let initial = "";
            loadSetups(initial);

            $('#search').on('keyup', function() {
                let search_input = $(this).val();
                loadSetups(search_input);
            });
        });

        $(document).ready(function () {
        $('#createForm').submit(function (e) {
            e.preventDefault();

            let setupData = {
                name: $('#name').val(),
                vehicle: $('#vehicle').val(),
                track: $('#track').val(),
                _token: $('meta[name="csrf-token"]').attr('content')
            };

            $.ajax({
                url: "/setups",
                type: "POST",
                data: setupData,
                success: function (response) {
                    $('#createModal').modal('hide');
                    location.reload();
                },
                error: function (xhr) {
                    let errors = xhr.responseJSON.errors;
                    let errorMessage = "Failed to create setup.\n";
                    $.each(errors, function (key, value) {
                        errorMessage += value[0] + "\n";
                    });
                    alert(errorMessage);
                }
            });
        });


        $('#createSetup').click(function (e) {
            e.preventDefault();
            $('#createModal').modal('show');
        });

        $(document).ready(function() {
            $(document).on('click', '.delete-setup', function() {
                var setup_name = $(this).data('name');

                $.ajax({
                    url: '/setups/' + setup_name,
                    type: 'DELETE',
                    data: {
                        _token: '{{ csrf_token() }}',
                    },
                    success: function(response) {
                        location.reload();
                    },
                    error: function(response) {
                        alert('Error deleting setup.');
                    }
                });
            });
        });

        $(document).on('click', '.edit-setup', function() {
            var setup_name = $(this).data('name');

            $.ajax({
                url: '/setups/' + setup_name + '/edit',
                type: 'GET',
                success: function(response) {
                    $('#setupEditContainer').html(response);
                    $('#editModal').modal('show');
                },
                error: function() {
                    alert('Error loading setup edit form.');
                }
            });
        });

    $(document).on('submit', '#editForm', function(e) {
        e.preventDefault();

        var setup_name = $(this).data('name');
        var formData = $(this).serialize();
        formData += '&_token={{ csrf_token() }}';

        $.ajax({
            url: '/setups/' + setup_name,
            type: 'PUT',
            data: formData,
            success: function(response) {
                $('#editForm').modal('hide');
                location.reload();
            },
            error: function(response) {
                alert('Error updating card.');
            }
        });
    });
    });