



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
                            <div  class="ml-14 text-right" >

                                <button  type="submit" class="add_button text-gray-500  hover:text-green-600 text-3xl mx-auto mr-6">+</button>

                                <x-create-city />

                            </div>
                        </th>

                    </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200  ">

                        <x-edit-city />

                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
