



<div class="flex flex-col mt-10">
    <p class="text-xs text-right text-gray-400 mb-3">* By deleting a city the asociated flights would be deleted</p>
    <div class="overflow-x-auto shadow-md sm:rounded-lg">
        <div class="inline-block min-w-full align-middle">
            <div class="overflow-hidden ">
                <table class="min-w-full divide-y divide-gray-200 table-fixed ">
                    <thead class="bg-gray-100 ">
                    <tr>
                        <th scope="col" class="py-3 px-6 text-xs font-medium tracking-wider text-left text-gray-700 uppercase ">
                            Id
                        </th>
                        <th scope="col" class="py-3 px-6 text-xs font-medium tracking-wider text-left text-gray-700 uppercase ">
                            Name
                        </th>
                        <th scope="col" class="py-3 px-6 text-xs font-medium tracking-wider text-left text-gray-700 uppercase ">
                            Amount of departure flights
                        </th>
                        <th scope="col" class="py-3 px-6 text-xs font-medium tracking-wider text-left text-gray-700 uppercase ">
                            Amount of arriving flights
                        </th>
                        <th scope="col" class="p-4">
                            <span class="sr-only">Edit</span>
                        </th>
                        <th scope="col" class="p-4">
                            <div x-data="{ show: false }" @click.away="show = false" class="ml-14 text-right" >

                                <button @click="show = true" type="submit" class="add_button text-gray-500  hover:text-green-600 text-3xl mx-auto mr-6">+</button>

                                <x-create-city />

                            </div>
                        </th>

                    </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200  ">
{{--                    @foreach($cities as $city)--}}
{{--                        '<tr class="hover:bg-gray-100">--}}

{{--                                <td class="py-4 px-6 text-sm font-medium text-gray-900 whitespace-nowrap "> {{$city->id}} </td>--}}
{{--                                <td class="py-4 px-6 text-sm font-medium text-gray-900 whitespace-nowrap "> {{$city->name}} </td>--}}
{{--                                <td class="py-4 px-6 text-sm font-medium text-gray-900 whitespace-nowrap "> {{ $city->origin->count() }} </td>--}}
{{--                                <td class="py-4 px-6 text-sm font-medium text-gray-900 whitespace-nowrap "> {{ $city->destination->count() }} </td>--}}

{{--                                <td class="py-4 px-0 text-sm font-medium text-right whitespace-nowrap">--}}
{{--                                    <div class="mt-8 md:mt-0 flex items-center">--}}
{{--                                        <div x-data="{ show: false }"   >--}}

{{--                                            <button   type="submit" class="text-gray-500  hover:text-blue-600 hover:underline mx-auto mr-6">EDIT</button>--}}

{{--                                               <x-edit-city :city="$city"/>--}}
{{--                                         </div>--}}
{{--                                    </div>--}}
{{--                                </td>--}}
{{--                                <td class="py-4 px-0 text-sm font-medium text-right whitespace-nowrap">--}}
{{--                                    <div class="mt-8 md:mt-0 flex items-center">--}}
{{--                                        <form method="POST" action="/delete-city/{{$city->id}}" class=" ml-6">--}}
{{--                                            @csrf--}}
{{--                                            @method('DELETE')--}}
{{--                                            <button  class="text-gray-500 hover:text-red-600 hover:underline mx-auto">DELETE</button>--}}
{{--                                        </form>--}}
{{--                                    </div>--}}
{{--                                </td>--}}
{{--                            </tr>--}}
{{--<x-edit-city :city="$city"/>--}}
{{--                    @endforeach--}}
{{--                    <div  x-data="{ show: false }" @click.away="show = false"> <x-edit-city /></div>--}}
                        <x-edit-city />

                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
