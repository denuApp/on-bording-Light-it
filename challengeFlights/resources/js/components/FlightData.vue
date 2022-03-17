<template>

        <td class="py-4 px-6 text-sm font-medium text-gray-900 whitespace-nowrap "> {{flight.id}} </td>
        <td class="py-4 px-6 text-sm font-medium text-gray-900 whitespace-nowrap "> {{flight.airline.name}} </td>
        <td class="py-4 px-6 text-sm font-medium text-gray-900  text-sm mt-4 space-y-4">  {{flight.origin.name}} </td>
        <td class="py-4 px-6 text-sm font-medium text-gray-900  text-sm mt-4 space-y-4">  {{flight.destination.name}} </td>
        <td class="py-4 px-6 text-sm font-medium text-gray-900  text-sm mt-4 space-y-4">  {{flight.time_departure}} </td>
        <td class="py-4 px-6 text-sm font-medium text-gray-900  text-sm mt-4 space-y-4">  {{flight.time_arrival}} </td>
        <td class="py-4 px-6 text-sm font-medium text-right whitespace-nowrap">

            <div class="mt-8 md:mt-0 flex items-center">

                    <div>

                    <button @click="$emit('edit', flight)" type="submit" class="text-gray-500  hover:text-blue-600 hover:underline mx-auto mr-6">EDIT</button>

                </div>
            </div>
        </td>
        <td class="py-4 px-6 text-sm font-medium text-right whitespace-nowrap">

            <div class="mt-8 md:mt-0 flex items-center">


                    <button  class="text-gray-500 hover:text-red-600 hover:underline mx-auto" @click="openDelete" >DELETE</button>

                    <popup-warning v-if="isVisible" @closed="isVisible = false" @deleteFlight="onDelete"></popup-warning>
            </div>

        </td>

</template>

<script>

import PopupWarning from "./popupWarning";
export default {
    name: "FlightData",
    components: {PopupWarning},
    data() {
        return {
            isVisible: false
        }

    },
    props: {
        flight: {
            type: Object,
            default: null
        },
    },
    methods: {
        onDelete() {

            axios
                .delete('http://challengeflights.test/delete-flight/'+ this.flight.id )
                .then(response=> {
                    alert(response.message);
                    this.$emit('deleted');
                })

        },
        openDelete() {
            this.isVisible = true;
        }

    },

}


</script>

<style >

</style>
