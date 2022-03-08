

    <div  aria-hidden="true" id="editCity" class="hidden edit_modal overflow-y-auto flex overflow-x-hidden fixed justify-center items-center h-modal md:h-full md:inset-0">
        <div class="relative px-4 w-full max-w-md h-full md:h-auto">
            <!-- Modal content -->
            <div class="relative bg-gray-300 rounded-lg shadow ">
                <div class="flex justify-end p-2">
                    <button type="button"  class="close_button_edit text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-800 " data-modal-toggle="authentication-modal">
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                    </button>
                </div>
                <div class="px-6 pb-4 space-y-6 lg:px-8 sm:pb-6 xl:pb-8" >

                    <h3 class="text-white text-xl text-align-left font-bold ml-2 uppercase">Edit City</h3>
                    <div class="  mb-6 bg-gray-200 rounded-full">
                        <div class="lg:py-3 lg:px-5 flex items-center">

                            <input id="name" type="text" name="name" required placeholder="City name"
                                   class="lg:bg-transparent py-2 lg:py-0 pl-4 focus-within:outline-none">
                        </div>
                        <p text-black id="idEdit"></p>

                    </div>
{{--                    @error('name')--}}
{{--                    <p class="text-red-500 text-xs -mt-1 mb-6 px-5">{{ $message }}</p>--}}
{{--                    @enderror--}}
                    <ul id="updateform_errList" > </ul>

                    <button type="submit"

                            class="update_city transition-colors duration-300 bg-purple-500 hover:bg-blue-600 mt-4 lg:mt-0 right-aligned rounded-full text-xs font-semibold text-white uppercase py-3 px-8"
                    >
                        Make changes
                    </button>
                </div>
            </div>
        </div>
    </div>

