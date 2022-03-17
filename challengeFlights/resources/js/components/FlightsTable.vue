<template>
    <div class="flex flex-col mt-10">
    <div class="overflow-x-auto shadow-md sm:rounded-lg">

        <div class="inline-block min-w-full align-middle">

            <div class="overflow-hidden ">

                <table class="airline-table min-w-full divide-y divide-gray-200 table-fixed ">
                    <thead class="bg-gray-100 ">
                    <tr>
                        <th scope="col" class="py-3 px-6 text-xs font-medium tracking-wider text-left text-gray-700 uppercase ">
                            Id
                        </th>
                        <th scope="col" class="py-3 px-6 text-xs font-medium tracking-wider text-left text-gray-700 uppercase ">
                            Airline
                        </th>
                        <th scope="col" class="py-3 px-6 text-xs font-medium tracking-wider text-left text-gray-700 uppercase  ">
                            Origin
                        </th>
                        <th scope="col" class="py-3 px-6 text-xs font-medium tracking-wider text-left text-gray-700 uppercase ">
                            Destination
                        </th>
                        <th scope="col" class="py-3 px-6 text-xs font-medium tracking-wider text-left text-gray-700 uppercase ">
                            Departure Time
                        </th>
                        <th scope="col" class="py-3 px-6 text-xs font-medium tracking-wider text-left text-gray-700 uppercase ">
                            Arrival Time
                        </th>
                        <th scope="col" class="p-4">
                            <span class="sr-only">Edit</span>
                        </th>
                        <th scope="col" class="p-4">

                            <div class="ml-14 text-right" >

                                <button type="submit" @click="openCreate" class="add_button text-gray-500  hover:text-green-600 text-3xl mx-auto mr-6">+</button>

                                <flight-create v-if="createVisible" @closeCreate="createVisible = false" :airlines="airlines" @created="createFlight"></flight-create>

                            </div>
                        </th>

                    </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200 ">


                        <tr v-for="flight in flights" class="hover:bg-gray-100">

                            <flight-data :flight="flight" @deleted="deleteFlight" @edit="openEdit"> </flight-data>

                        </tr>

                    </tbody>

                </table>

                <flight-edit   :airlines="airlines" v-if="editVisible" @closeEdit="editVisible = false" @edited="editFlight" :flight="flight"></flight-edit>
            </div>
        </div>
    </div>

    </div>
</template>

<script>
    import FlightData from "./FlightData";
    import PopupWarning from "./popupWarning";
    import FlightCreate from "./FlightCreate";
    import FlightEdit from "./FlightEdit";
    import VueMultiselect from 'vue-multiselect'
    export default {
        name: 'FlightsTable',
        components: {FlightEdit, FlightCreate, PopupWarning, FlightData, VueMultiselect},
        data() {
            return {

                flight: {},
                flights: [],
                airlines: [],
                createVisible: false,
                editVisible: false,
            }
        },

        mounted() {
            this.getFlights();
            this.getAirlines();
        },

        methods: {
            deleteFlight(){

                this.getFlights();
                console.log('funciona');
            },
            createFlight(){

                this.getFlights();
                this.createVisible =false;
                console.log('funciona');
            },
            editFlight(){

                this.getFlights();
                this.editVisible =false;
                console.log('funciona');
            },
            openCreate(){
                this.createVisible = true;
            },
            openEdit(flight){
                 this.flight = flight;

                this.editVisible = true;
            },
            getFlights(){
                axios
                    .get('/fetch-flight')
                    .then(res => {
                        this.flights = res.data.flights;
                    });
            },
            getAirlines(){
                axios
                    .get('/fetch-airline')
                    .then(res => {
                        this.airlines = res.data.airlines;
                    });
            },

        }

    }
</script>
<style  src="vue-multiselect/dist/vue-multiselect.css">

</style>
