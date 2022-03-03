@props(['cities'])

<script>
    $(document).ready(function() {

        fetchCity();

        function fetchCity()
        {
            $.ajax({
                type: "GET",
                url: "/fetch-city",
                dataType: "json",
                success: function (response) {
                    $('tbody').html("");
                    $.each(response.cities, function (key, item){
                        $('tbody').append(
                            '<tr class="hover:bg-gray-100">\
                                <td class="py-4 px-6 text-sm font-medium text-gray-900 whitespace-nowrap "> '+ item.id +' </td>\
                                <td class="py-4 px-6 text-sm font-medium text-gray-900 whitespace-nowrap "> '+ item.name +' </td>\
                                <td class="py-4 px-6 text-sm font-medium text-gray-900 whitespace-nowrap "> '+item.origin_count +'</td>\
                                <td class="py-4 px-6 text-sm font-medium text-gray-900 whitespace-nowrap "> '+item.destination_count+' </td>\
                                <td class="py-4 px-0 text-sm font-medium text-right whitespace-nowrap">\
                                    <div   class="mt-8 md:mt-0 flex items-center">\
                                       \
                                            <button   type="submit" value="'+ item.id +'" class="edit_button text-gray-500  hover:text-blue-600 hover:underline mx-auto mr-6">EDIT</button>\
                                            \
                                            \
                                         \
                                    </div>\
                                </td>\
                                <td class="py-4 px-0 text-sm font-medium text-right whitespace-nowrap">\
                                    <div class="mt-8 md:mt-0 flex items-center">\
                                        <form method="POST" action="/delete-city/'+ item.id +'" class=" ml-6">\
                                            @csrf\
                                            @method('DELETE')\
                                            <button value="'+ item.id +'" class="text-gray-500 hover:text-red-600 hover:underline mx-auto">DELETE</button>\
                                        </form>\
                                    </div>\
                                </td>\
                            </tr>'
                        )

                    });
                }
            });

        }

        $(document).on('click', '.add_button', function (e) {
            e.preventDefault();
            console.log('abe')
            $("#createCity").removeClass('hidden');
        })

        $(document).on('click', '.add_city', function (e) {
            e.preventDefault();
            $data = {
                name : $('#name').val()
            }

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({
                type: "POST",
                url: "/create-city",
                data: $data,
                dataType: "json",
                success: function (response) {

                    alert(response.message);
                    $("#createCity").addClass('hidden');
                    $("#createCity").find('input').val("");
                    fetchCity();
                },
                error: function (response) {
                    $('#saveform_errList').html("");
                    $('#saveform_errList').addClass('text-red-500 text-xs -mt-1 mb-6 px-5');

                        $('#saveform_errList').append('<li>' + "City already exist" + '</li>');

                }

            });

        });

        $(document).on('click','.close_button', function(e){
            e.preventDefault();
            $("#editCity").find('input').val("");
            $('#updateform_errList').html("");
            $("#editCity").addClass('hidden');
        })

        $(document).on('click','.edit_button', function(e){
            e.preventDefault();
            $city_id = $(this).val();
            console.log($city_id);
            $("#editCity").removeClass('hidden');
            $.ajax({
                type: "GET",
                url: "/edit-city/"+$city_id,
                success: function (response) {
                    $('#name').val(response.city.name);
                    $('#idEdit').val($city_id);
                }
            })

        })

        $(document).on('click','.update_city', function(e){

             //$city_id = $(this).val();
            $data = {
                name : $('#name').val(),
                id : $('#idEdit').val()
            }

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            console.log( $data.id);

            $.ajax({
                type: "PATCH",
                url: "/update-city/"+$data.id,
                data: $data,
                dataType: "json",
                success: function (response) {
                    alert(response.message);
                    $("#editCity").addClass('hidden');
                    $('#updateform_errList').html("");
                    $("#editCity").find('input').val("");
                    fetchCity();
                },
                error: function (response) {
                    $('#updateform_errList').html("");
                    $('#updateform_errList').addClass('text-red-500 text-xs -mt-1 mb-6 px-5');
                    $('#updateform_errList').append('<li>' + "City already exist" + '</li>');

                }
            })

        })

    });
</script>
