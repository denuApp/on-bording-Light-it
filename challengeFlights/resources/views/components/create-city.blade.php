<div class="p-4 w-full  m-auto bg-gray-300 rounded-lg border shadow-md sm:p-6  mt-8">
    <p class="text-white text-xl font-bold ml-2 uppercase">Add city</p>



            <form method="POST" action="/create-city" class="mt-10 text-sm">
                @csrf
                <div class="  mb-6 bg-gray-200 rounded-full">
                    <div class="lg:py-3 lg:px-5 flex items-center">



                        <input id="name" type="text" name="name" required placeholder="City name"
                               class="lg:bg-transparent py-2 lg:py-0 pl-4 focus-within:outline-none">
                        </div>

                    </div>
                @error('name')
                <p class="text-red-500 text-xs -mt-1 mb-6 px-5">{{ $message }}</p>
                @enderror

                <button type="submit"
                        class="transition-colors duration-300 bg-purple-500 hover:bg-blue-600 mt-4 lg:mt-0 right-aligned rounded-full text-xs font-semibold text-white uppercase py-3 px-8"
                >
                    Add
                </button>
            </form>

</div>

