@props(['flights'])

<div class="flex flex-col mt-10">
{{--    <p class="text-xs text-right text-gray-400 mb-3">* By deleting an airline the asociated flights would be deleted</p>--}}

    <div class="overflow-x-auto shadow-md sm:rounded-lg">

        <div class="inline-block min-w-full align-middle">

            <div class="overflow-hidden ">

                <table class="airline-table min-w-full divide-y divide-gray-200 table-fixed ">
                    <thead class="bg-gray-100 ">
                    <tr>
                        <th scope="col" class="py-3 px-6 text-xs font-medium tracking-wider text-left text-gray-700 uppercase ">
                            Id
                        </th>
                        <th scope="col" class="py-3 px-6 text-xs font-medium tracking-wider text-left text-gray-700 uppercase ">
                            Airline
                        </th>
                        <th scope="col" class="py-3 px-6 text-xs font-medium tracking-wider text-left text-gray-700 uppercase  ">
                            Origin
                        </th>
                        <th scope="col" class="py-3 px-6 text-xs font-medium tracking-wider text-left text-gray-700 uppercase ">
                            Destination
                        </th>
                        <th scope="col" class="py-3 px-6 text-xs font-medium tracking-wider text-left text-gray-700 uppercase ">
                            Departure Time
                        </th>
                        <th scope="col" class="py-3 px-6 text-xs font-medium tracking-wider text-left text-gray-700 uppercase ">
                            Arrival Time
                        </th>
                        <th scope="col" class="p-4">
                            <span class="sr-only">Edit</span>
                        </th>
                        <th scope="col" class="p-4">

                            <div class="ml-14 text-right" >

                                <button type="submit" class="add_button text-gray-500  hover:text-green-600 text-3xl mx-auto mr-6">+</button>

{{--                                <x-create-flight />--}}

                            </div>
                        </th>

                    </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200 ">
                        @foreach($flights as $flight)
                            <tr class="hover:bg-gray-100 dark:hover:bg-gray-700">

                                    <td class="py-4 px-6 text-sm font-medium text-gray-900 whitespace-nowrap "> {{$flight->id}} </td>
                                <td class="py-4 px-6 text-sm font-medium text-gray-900 whitespace-nowrap "> {{$flight->airline_id}} </td>
                                <td class="py-4 px-6 text-sm font-medium text-gray-900  text-sm mt-4 space-y-4">  {{$flight->origin_id}} </td>
                                <td class="py-4 px-6 text-sm font-medium text-gray-900  text-sm mt-4 space-y-4">  {{$flight->destination_id}} </td>
                                <td class="py-4 px-6 text-sm font-medium text-gray-900  text-sm mt-4 space-y-4">  {{$flight->time_departure}} </td>
                                <td class="py-4 px-6 text-sm font-medium text-gray-900  text-sm mt-4 space-y-4">  {{$flight->time_arrival}} </td>

{{--                                <td class="py-4 px-6 text-sm font-medium text-right whitespace-nowrap">--}}

{{--                                    <div class="mt-8 md:mt-0 flex items-center">--}}
{{--                                        <div x-data="{show: false}">--}}
{{--                                            <form method="POST" action="/update-flight/{{$flight->id}}" class=" ml-6">--}}
{{--                                                @csrf--}}
{{--                                                <button type="submit" class="text-gray-500  hover:text-blue-600 hover:underline mx-auto mr-6">EDIT</button>--}}
{{--                                            </form>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </td>--}}

                                <td class="py-4 px-6 text-sm font-medium text-right whitespace-nowrap">

                                    <div class="mt-8 md:mt-0 flex items-center">

                                        <div x-data="{ show: false }" @click.away="show = false" >

                                                <button @click="show = true" type="submit" class="text-gray-500  hover:text-blue-600 hover:underline mx-auto mr-6">EDIT</button>

{{--                                                <x-edit-flight :flight="$flight"/>--}}
                                        </div>
                                    </div>
                                </td>
                                <td class="py-4 px-6 text-sm font-medium text-right whitespace-nowrap">

                                    <div class="mt-8 md:mt-0 flex items-center">

                                        <form method="POST" action="/delete-flight/{{$flight->id}}" class=" ml-6">
                                            @csrf
                                            @method('DELETE')
                                            <button  class="text-gray-500 hover:text-red-600 hover:underline mx-auto">DELETE</button>
                                        </form>
                                    </div>

                                </td>
                            </tr>

{{--                        <x-edit-flight />--}}
                        @endforeach

                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

