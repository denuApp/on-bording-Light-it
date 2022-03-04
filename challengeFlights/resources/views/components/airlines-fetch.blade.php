<script>
    $(document).ready(function() {

        fetchAirline();

        function fetchAirline() {
            fetch('http://127.0.0.1:8000/fetch-airline')
                .then(res => res.json())
                .then(function (data) {
                    $('tbody').html("");
                    $.each(data.airlines, function (key, item) {
                        $('tbody').append(
                            '<tr class="hover:bg-gray-100">\
                                <td class="py-4 px-6 text-sm font-medium text-gray-900 whitespace-nowrap ">' + item.id + '</td>\
                                <td class="py-4 px-6 text-sm font-medium text-gray-900 whitespace-nowrap ">' + item.name + '</td>\
                                <td class="py-4 px-6 text-sm font-medium text-gray-900 whitespace-nowrap mt-4 space-y-4">' + item.description + '</td>\
                                <td class="py-4 px-6 text-sm font-medium text-gray-900 whitespace-nowrap ">' + item.flights_count + '</td>\
                                <td class="py-4 px-0 text-sm font-medium text-right whitespace-nowrap">\
                                    <div   class="mt-8 md:mt-0 flex items-center">\
                                        \
                                        <button   type="submit" value="' + item.id + '" class="edit_button text-gray-500  hover:text-blue-600 hover:underline mx-auto mr-6">EDIT</button>\
                                        \
                                    </div>\
                                </td>\
                                <td class="py-4 px-0 text-sm font-medium text-right whitespace-nowrap">\
                                    <div class="mt-8 md:mt-0 flex items-center">\
                                        <div class=" ml-6">\
                                            \
                                            \
                                            <button value="' + item.id + '" class=" delete_button text-gray-500 hover:text-red-600 hover:underline mx-auto">DELETE</button>\
                                        </div>\
                                    </div>\
                                </td>\
                            </tr>'
                        )

                    });
                })
        }


        $(document).on('click', '.add_button', function (e) {
            e.preventDefault();
            $("#createAirline").removeClass('hidden');
        })

        $(document).on('click', '.add_airline', function (e) {
            e.preventDefault();
            fetch('http://127.0.0.1:8000/create-airline', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                    'Accept' : 'application/json'
                },
                body: JSON.stringify({
                    name: $('#name_create').val(),
                    description: $('#description_create').val()
                })
            })
                .then(res => res.json())
                .then(  function (response) {
                    if(response.status == 200){
                        alert(response.message);
                        $("#createAirline").addClass('hidden');
                        $("#createAirline").find('input').val("");
                        fetchAirline();
                    }
                    else{
                        $('#saveform_errList').html(response.message);
                    }

                })

        })


        $(document).on('click', '.close_button_add', function (e) {
            e.preventDefault();
            $("#createAirline").find('input').val("");
            $('#saveform_errList').html("");
            $("#createAirline").addClass('hidden');
        })

        $(document).on('click', '.close_button_edit', function (e) {
            e.preventDefault();
            $("#editAirline").find('input').val("");
            $('#updateform_errList').html("");
            $("#editAirline").addClass('hidden');
        })

        $(document).on('click', '.edit_button', function (e) {

            e.preventDefault();
            $airline_id = $(this).val();
            $("#editAirline").removeClass('hidden');

            fetch('http://127.0.0.1:8000/edit-airline/' + $airline_id)
                .then(res => res.json())
                .then(function (response) {
                    $("#name").val(response.airline.name);
                    $("#description").val(response.airline.description);
                    $('#idEdit').val($airline_id);

                })

        })

        $(document).on('click', '.update_airline', function (e) {

            e.preventDefault();

            fetch('http://127.0.0.1:8000/update-airline/' + $airline_id, {
                method: 'PATCH',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                    'Accept' : 'application/json'
                },
                body: JSON.stringify({
                    id: $('#idEdit').val(),
                    name: $('#name').val(),
                    description: $('#description').val()
                })
            })
                .then(res => res.json())
                .then(function (response) {
                    if(response.status == 200){
                        alert(response.message);
                        $("#editAirline").addClass('hidden');
                        $('#updateform_errList').html("");
                        $("#editAirline").find('input').val("");
                        fetchAirline();
                    }else{
                        $('#updateform_errList').html(response.message);
                    }

                })

        })

        $(document).on('click', '.delete_button', function (e) {

            e.preventDefault();
            $airline_id = $(this).val();
            fetch('http://127.0.0.1:8000/delete-airline/' + $airline_id, {
                method: 'DELETE',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                    'Accept' : 'application/json'
                }
            })
                .then(res => res.json())
                .then(function (response) {
                    alert(response.message);
                    fetchAirline();
                })

        })
    });

</script>
