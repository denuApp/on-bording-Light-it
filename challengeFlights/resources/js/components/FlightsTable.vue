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
<!--                        <flight-data v-for="flight in flights">{{ flight }}</flight-data>-->

<tr v-for="flight in flights" class="hover:bg-gray-100">
    <flight-data :flight="flight" @deleted="deleteFlight" @edit="openEdit"> </flight-data>



<!--    <td class="py-4 px-6 text-sm font-medium text-gray-900 whitespace-nowrap "> {{ flight.id }} </td>-->
<!--    <td class="py-4 px-6 text-sm font-medium text-gray-900 whitespace-nowrap "> {{ flight.airline.name }} </td>-->
<!--    <td class="py-4 px-6 text-sm font-medium text-gray-900  text-sm mt-4 space-y-4">  {{flight.origin.name }} </td>-->
<!--    <td class="py-4 px-6 text-sm font-medium text-gray-900  text-sm mt-4 space-y-4">  {{flight.destination.name }} </td>-->
<!--    <td class="py-4 px-6 text-sm font-medium text-gray-900  text-sm mt-4 space-y-4">  {{flight.time_departure}} </td>-->
<!--    <td class="py-4 px-6 text-sm font-medium text-gray-900  text-sm mt-4 space-y-4">  {{flight.time_arrival}} </td>-->

<!--&lt;!&ndash;    <td class="py-4 px-6 text-sm font-medium text-right whitespace-nowrap">&ndash;&gt;-->

<!--&lt;!&ndash;        <div class="mt-8 md:mt-0 flex items-center">&ndash;&gt;-->
<!--&lt;!&ndash;            <div x-data="{show: false}">&ndash;&gt;-->
<!--&lt;!&ndash;                <form method="POST" action="/update-flight/{{flight.id}}" class=" ml-6">&ndash;&gt;-->
<!--&lt;!&ndash;                    &ndash;&gt;-->
<!--&lt;!&ndash;                    <button type="submit" class="text-gray-500  hover:text-blue-600 hover:underline mx-auto mr-6">EDIT</button>&ndash;&gt;-->
<!--&lt;!&ndash;                </form>&ndash;&gt;-->
<!--&lt;!&ndash;            </div>&ndash;&gt;-->
<!--&lt;!&ndash;        </div>&ndash;&gt;-->
<!--&lt;!&ndash;    </td>&ndash;&gt;-->

<!--    <td class="py-4 px-6 text-sm font-medium text-right whitespace-nowrap">-->

<!--        <div class="mt-8 md:mt-0 flex items-center">-->

<!--            <div x-data="{ show: false }" @click.away="show = false" >-->

<!--                <button @click="show = true" type="submit" class="text-gray-500  hover:text-blue-600 hover:underline mx-auto mr-6">EDIT</button>-->

<!--                &lt;!&ndash;                    <x-edit-flight :flight="flight.>&ndash;&gt;-->
<!--            </div>-->
<!--        </div>-->
<!--    </td>-->
<!--    <td class="py-4 px-6 text-sm font-medium text-right whitespace-nowrap">-->

<!--        <div class="mt-8 md:mt-0 flex items-center">-->

<!--            <form method="POST" action="/delete-flight/{{flight.id}}" class=" ml-6">-->

<!--&lt;!&ndash;                @method('DELETE')&ndash;&gt;-->
<!--                <button  class="text-gray-500 hover:text-red-600 hover:underline mx-auto">DELETE</button>-->
<!--            </form>-->
<!--        </div>-->

<!--    </td>-->
</tr>

                    </tbody>

                </table>


<!--                <popup-warning ></popup-warning>-->
                <flight-edit   :airlines="airlines" v-if="editVisible" @closeEdit="editVisible = false" @edited="editFlight" :flight="flight"></flight-edit>
            </div>
        </div>
    </div>
        <VueMultiselect
            v-model="selected"
            :options="options"
            :close-on-select="true"
            :clear-on-select="false"
            :allow-empty="false"
            placeholder="Your airline name"
            label="name"

        >
        </VueMultiselect>
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
                selected:'',
                options: ['list', 'of', 'options'],
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
//             onAdd() {
// //
//             },
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
                    // .then(res => res.json())
                    .then(res => {
                        this.airlines = res.data.airlines;
                    });
            },

        }

    }
</script>
<style  src="vue-multiselect/dist/vue-multiselect.css">

</style>
