
@props(['airlines'])


<div class="flex flex-col mt-10">
    <p class="text-xs text-right text-gray-400 mb-3">* By deleting an airline the asociated flights would be deleted</p>

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

                            <div x-data="{ show: false }" @click.away="show = false" class="ml-14 text-right" >

                                <button @click="show = true"  type="submit" class="text-gray-500  hover:text-green-600 text-3xl mx-auto mr-6">+</button>

                                <x-create-airline />

                            </div>
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

                                <div class="mt-8 md:mt-0 flex items-center">



                                    <div x-data="{ show: false }" @click.away="show = false" >

                                            <button @click="show = true" type="submit" class="text-gray-500  hover:text-blue-600 hover:underline mx-auto mr-6">EDIT</button>

                                            <x-edit-airline :airline="$airline"/>
                                    </div>


                                    <form method="POST" action="/delete-airline/{{$airline->id}}" class=" ml-6">
                                        @csrf
                                        @method('DELETE')
                                        <button  class="text-gray-500 hover:text-red-600 hover:underline mx-auto">DELETE</button>
                                    </form>
                                </div>


{{--                                <a href="#" class="text-gray-500  hover:text-red-600 hover:underline mx-auto">DELETE</a>--}}
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

