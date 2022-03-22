@props (['cities'])



    <div  aria-hidden="true" id="createAirline" class="hidden overflow-y-auto flex overflow-x-hidden fixed justify-center items-center h-modal md:h-full md:inset-0">
        <div class="relative px-4 w-full max-w-md h-full md:h-auto">


            <div class="crear relative bg-gray-300 rounded-lg shadow ">
                <div class="flex justify-end p-2">
                    <button type="button"  class="close_button_add text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-800 dark:hover:text-white" data-modal-toggle="authentication-modal">
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                    </button>
                </div>
                <div class="px-6 pb-4  lg:px-8 sm:pb-6 xl:pb-8" >

                    <h3 class="space-y-6 text-white text-xl text-align-left font-bold ml-2 uppercase">Create Airline</h3>
                    <div class="space-y-6  mb-6 bg-gray-200 rounded-full">
                        <div class="lg:py-3 lg:px-5 flex items-center">

                            <input id="name_create" type="text" name="name" required placeholder="Your airline name"
                                   class="lg:bg-transparent py-2 lg:py-0 pl-4 focus-within:outline-none">
                        </div>

                    </div>
                    <div class="space-y-6 mb-6  bg-gray-200 rounded-3xl  ">
                        <div class="lg:py-3 lg:px-5 flex row-span-3 ">


                            <input id="description_create" type="text" value="{{ old('description')}}" name="description" required placeholder="Description"
                                   class="lg:bg-transparent py-2 lg:py-0 pl-4 focus-within:outline-none">
                        </div>

                    </div>

                    <p class="text-white text-left text-xs -space-y-6">CITIES</p>
                    <select id="citiesSelection" class="js-example-basic-multiple "  multiple="multiple" >
                        @foreach($cities as $city)
                            <option value={{$city->id}} >{{$city->name}}</option>
                        @endforeach
                    </select>


                    <ul class="text-red-500 text-xs -mt-1 mb-6 mr-3" id="saveform_errList" > </ul>

                    <button type="submit"
                            class="add_airline transition-colors duration-300 bg-purple-500 hover:bg-blue-600 mt-4 lg:mt-0 right-aligned rounded-full text-xs font-semibold text-white uppercase py-3 px-8"
                    >
                        Add
                    </button>
                </div>
            </div>
        </div>
    </div>

<style>
    .select2-container--default
    .select2-selection--multiple
    {
        background-color: RGB(229 231 235) !important;
        border-radius: 30px !important;
        border-color: transparent !important;
        align-items: center !important;
        margin-top: 3px !important;
        padding: 4px !important ;
        width: 350px !important;
        margin: auto !important;
        min-height: 45px !important;
        line-break: normal !important;
    }


</style>

