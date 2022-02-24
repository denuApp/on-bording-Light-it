
@props(['cities'])


<div class="flex flex-col mt-10">
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

                    </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200  ">
                    @foreach($cities as $city)
                        <tr class="hover:bg-gray-100 dark:hover:bg-gray-700">

                                <td class="py-4 px-6 text-sm font-medium text-gray-900 whitespace-nowrap "> {{$city->id}} </td>
                            <td class="py-4 px-6 text-sm font-medium text-gray-900 whitespace-nowrap "> {{$city->name}} </td>
                            <td class="py-4 px-6 text-sm font-medium text-gray-900 whitespace-nowrap "> {{ $city->origin->count() }} </td>
                            <td class="py-4 px-6 text-sm font-medium text-gray-900 whitespace-nowrap "> {{ $city->destination->count() }} </td>

                            <td class="py-4 px-6 text-sm font-medium text-right whitespace-nowrap">
                                <a href="#" class="text-gray-500  hover:text-blue-600  hover:underline mx-auto mr-6">EDIT</a>
                                <a href="#" class="text-gray-500  hover:text-red-600  hover:underline mx-auto">DELETE</a>
{{--                                <img src="/images/trash.svg" class="w-5 h-5 mx-auto -mt-5  hover:underline"  />--}}
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
