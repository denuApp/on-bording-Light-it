/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */



require('./bootstrap');

import { createApp } from 'vue'

import FlightsTable from './components/FlightsTable'
import FlightData from './components/FlightData'
import FlightCreate from "./components/FlightCreate";
import FlightEdit from "./components/FlightEdit";
import popupWarning from "./components/popupWarning";

createApp({
   components: {

       FlightsTable,
       FlightData,
       FlightCreate,
       FlightEdit,
       popupWarning,
   }

}).mount('#app')


