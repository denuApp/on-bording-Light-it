<template >

    <div  v-show="editVisible" aria-hidden="true" id="editAirline" class="ml-14 text-right overflow-y-auto flex overflow-x-hidden fixed justify-center items-center h-modal md:inset-0">
        <div class="" >
            <div class="relative bg-gray-300 rounded-lg ">
                <div class="flex justify-end p-2">
                    <button @click="closeCreate" type="button"  class="close_button_add text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center d" data-modal-toggle="authentication-modal">
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                    </button>
                </div>

                <div class="px-6 pb-4 space-y-6 lg:px-8 sm:pb-6 xl:pb-8" >

                    <h3 class="text-white text-xl text-align-left font-bold ml-2 uppercase">Edit Flight</h3>

                    <div class="mb-6 bg-gray-200 rounded-full shadow font-thin focus:outline-none focus:shadow-lg focus:shadow-slate-200 duration-100 shadow-gray-100">
                        <div class="lg:py-3 lg:px-5 flex " >

                            <VueMultiselect
                                v-model="airline"
                                :options="airlines"
                                :close-on-select="true"
                                :clear-on-select="false"
                                :allow-empty="false"
                                placeholder="Your airline name"
                                label="name"
                                @input = "updateCities"
                                @select = "emptyCity"


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

                        <div class="mx-6 mt-3 -mr-1 relative bg-gray-200 rounded-3xl py-3 px-4 w-1/2  shadow font-thin focus:outline-none focus:shadow-lg focus:shadow-slate-200 duration-100 shadow-gray-100">
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


                    <button type="submit" @click="onUpdate"
                            class="edit_airline transition-colors duration-300 bg-purple-500 hover:bg-blue-600 mt-4 lg:mt-0 right-aligned rounded-full text-xs font-semibold text-white uppercase py-3 px-8"
                    >
                        Make changes
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

    name: "FlightEdit",
    props: {
        flight: {
            type: Object,
            default: null
        },
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
            editVisible: true,
            errors: '',

        }

    },


    created() {
        this.airline = this.flight.airline;
        this.cities = this.airline.cities;
        // console.log(this.flight);
        this.origin = this.flight.origin;
        this.destination = this.flight.destination;
        this.departureTime = this.flight.time_departure.replace(' ','T');
        this.arrivalTime = this.flight.time_arrival.replace(' ','T');
    },

    computed: {

        updateCities (){
            if(this.airline != null)
            {
                this.cities = this.airline.cities;
                return this.cities;
            } else return [];

        },

    },


    methods: {

        // changeAirline() {
        //     this.cities = this.airline.cities;
        //     // this.origin = null;
        // },

        emptyCity() {
            this.origin = null;
            this.destination = null;
        },

        onUpdate() {

                        if(this.origin.id != this.destination.id){
                            if( this.departureTime < this.arrivalTime) {
                                axios
                                    .patch('/update-flight/' + this.flight.id, {
                                        airline_id: this.airline.id,
                                        origin_id: this.origin.id,
                                        destination_id: this.destination.id,
                                        time_departure: this.departureTime,
                                        time_arrival: this.arrivalTime,
                                    })
                                    // .then(res => res.json())
                                    .then(res => {
                                        if(res.data.status == 200 ){
                                            alert(res.data.message) ;
                                            this.editVisible = false;
                                            this.$emit('edited');
                                        }else{
                                            this.errors = res.data.message;
                                        }

                                    })
                                    .catch(error => {
                                        this.errors = error.data.message
                                    })
                            }else{
                                this.errors = 'city of origin is the same as city of destination'
                            }
                        }else{

                            this.errors = 'city of origin is the same as city of destination'
                        }



        },
        closeCreate(){
            this.editVisible = false;
            this.$emit('closeEdit');
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
