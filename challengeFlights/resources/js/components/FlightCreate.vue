<template >

    <div  v-show="createVisible" aria-hidden="true" id="createAirline" class=" overflow-y-auto flex overflow-x-hidden fixed justify-center items-center h-modal md:inset-0">
        <div class="" >
            <!-- Modal content -->
            <div class="relative bg-gray-300 rounded-lg ">
                <div class="flex justify-end p-2">
                    <button @click="closeCreate" type="button"  class="close_button_add text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center d" data-modal-toggle="authentication-modal">
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                    </button>
                </div>

                <div class="px-6 pb-4 space-y-6 lg:px-8 sm:pb-6 xl:pb-8" >

                    <h3 class="text-white text-xl text-align-left font-bold ml-2 uppercase">Create Flight</h3>


                    <div class="  mb-6 bg-gray-200 rounded-full shadow font-thin focus:outline-none focus:shadow-lg focus:shadow-slate-200 duration-100 shadow-gray-100">
                        <div class="lg:py-3 lg:px-5 flex items-center" >

                            <VueMultiselect
                                v-model="airline"
                                :options="airlines"
                                :close-on-select="true"
                                :clear-on-select="false"
                                :allow-empty="false"
                                placeholder="Your airline name"
                                label="name"
                                @input="updateCities"
                            >
                            </VueMultiselect>

                        </div>

                    </div>

                    <div class="rounded-full flex items-center">
                        <div class="pr-2 relative bg-gray-200 mt-3 rounded-3xl py-3 px-4 w-1/2  shadow font-thin focus:outline-none focus:shadow-lg focus:shadow-slate-200 duration-100 shadow-gray-100">
                            <VueMultiselect
                                v-model="origin"
                                :options="cities"
                                :close-on-select="true"
                                :clear-on-select="false"
                                :allow-empty="false"
                                placeholder="Origin City"
                                track-by="name"
                                label="name"
                            >
                            </VueMultiselect>
                        </div>

                        <div class="mx-6 mt-3 relative bg-gray-200 rounded-3xl py-3 px-4 w-1/2  shadow font-thin focus:outline-none focus:shadow-lg focus:shadow-slate-200 duration-100 shadow-gray-100">
                            <VueMultiselect
                                v-model="destination"
                                :options="cities"
                                :close-on-select="true"
                                :clear-on-select="false"
                                :allow-empty="false"
                                placeholder="Arrival City"
                                track-by="name"
                                label="name"
                            >
                            </VueMultiselect>
                        </div>

                    </div>

                    <div date-rangepicker class="flex items-center ">
                        <div class="relative">
                            <input required name="start" v-model="departureTime" :max="arrivalTime"  type="datetime-local" class="bg-gray-200 border text-gray-900  rounded-full shadow font-thin focus:outline-none focus:shadow-lg focus:shadow-slate-200 duration-100 shadow-gray-100 block w-full pl-10 p-2.5  " placeholder="Departure date">
                        </div>
                        <span class="mx-4 text-gray-500">to</span>
                        <div class="relative">
                            <input required name="end" v-model="arrivalTime" :min="departureTime" type="datetime-local"  class="bg-gray-200 border text-gray-900  rounded-full shadow font-thin focus:outline-none focus:shadow-lg focus:shadow-slate-200 duration-100 shadow-gray-100 block w-full pl-10 p-2.5  " placeholder="Arrival date ">
                        </div>
                    </div>




                    <ul class="text-red-500 text-xs -mt-1 mb-6 mr-3" id="saveform_errList" v-text="errors"> </ul>


                    <button type="submit" @click="onSubmit"
                            class="add_airline transition-colors duration-300 bg-purple-500 hover:bg-blue-600 mt-4 lg:mt-0 right-aligned rounded-full text-xs font-semibold text-white uppercase py-3 px-8"
                    >
                        Add
                    </button>
                </div>
            </div>
        </div>
    </div>

</template>

<script>

import VueMultiselect from 'vue-multiselect'

export default {

    components: {
        VueMultiselect
    },

    name: "FlightCreate",

    // import Datepicker from 'vue3-date-time-picker';
    // import 'vue3-date-time-picker/dist/main.css'
    props: {
        airlines: {
            type: Array,
            default: []
        },
    },

    data() {
        return {

            departureTime: '',
            arrivalTime: '',
            airline: null,
            cities: [],
            origin: null,
            destination: null,
            createVisible: true,
            errors: '',

        }

    },

    computed: {

        updateCities (){
            if(this.airline != null)
            {
                this.cities = this.airline.cities;
                // if(this.arrival != null)
                // {
                //     this.citiesOrigin.splice(this.arrival.id);
                // }
                return this.cities;
            } else return [];

        },

    },


    methods: {

        onSubmit() {
            if(this.airline != null){
                if(this.origin != null){
                    if(this.destination != null){
                        if(this.origin.id != this.destination.id){

                            axios
                                .post('/create-flight', {
                                    airline_id: this.airline.id,
                                    origin_id: this.origin.id,
                                    destination_id: this.destination.id,
                                    time_departure: this.departureTime,
                                    time_arrival: this.arrivalTime,
                                })
                                // .then(res => res.json())
                                .then(res => {
                                    alert(res.message) ;
                                    this.createVisible = false;
                                    this.$emit('created');
                                })
                                .catch(error => {
                                    this.errors = error.message
                                })

                        }else{

                           this.errors = 'city of origin is the same as city of destination'
                        }
                    }else{
                        this.errors = "empty destination field."
                    }

                }else{
                    this.errors = "empty origin field."
                }
            }else{
                this.errors = "empty airline field."
            }


        },
        closeCreate(){
            this.createVisible = false;
            this.$emit('closeCreate');
        },


    },
}
</script>

<style >
    .multiselect{
        background: transparent;
    }
    .multiselect__tags{
        background: transparent !important;
    }

    .multiselect__single{
        background: transparent !important;
    }

    .multiselect__input{
        background: transparent !important;
    }
</style>
