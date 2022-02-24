
@props(['airlines'])


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
                        <th scope="col" class="py-3 px-6 text-xs font-medium tracking-wider text-left text-gray-700 uppercase  ">
                            Description
                        </th>
                        <th scope="col" class="py-3 px-6 text-xs font-medium tracking-wider text-left text-gray-700 uppercase ">
                            Amount of flights
                        </th>
                        <th scope="col" class="p-4">
                            <span class="sr-only">Edit</span>
{{--                            <button class="block text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" type="button" data-modal-toggle="authentication-modal">--}}
{{--                                Toggle modal--}}
{{--                            </button>--}}



{{--                            <a href="/create-airline" class="text-gray-500 text-4xl hover:text-green-600 " data-modal-toggle="/create-airline">+</a>--}}
                            <x-popup />
                        </th>

                    </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200 ">
                    @foreach($airlines as $airline)
                        <tr class="hover:bg-gray-100 dark:hover:bg-gray-700">

                                <td class="py-4 px-6 text-sm font-medium text-gray-900 whitespace-nowrap "> {{$airline->id}} </td>
                            <td class="py-4 px-6 text-sm font-medium text-gray-900 whitespace-nowrap "> {{$airline->name}} </td>
                            <td class="py-4 px-6 text-sm font-medium text-gray-900  text-sm mt-4 space-y-4">  {{$airline->description}} </td>
                            <td class="py-4 px-6 text-sm font-medium text-gray-900 whitespace-nowrap "> {{ $airline->flights->count()  }} </td>

                            <td class="py-4 px-6 text-sm font-medium text-right whitespace-nowrap">
                                <a href="#" class="text-gray-500  hover:text-blue-600 hover:underline mx-auto mr-6">EDIT</a>
                                <a href="#" class="text-gray-500  hover:text-red-600 hover:underline mx-auto">DELETE</a>
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

