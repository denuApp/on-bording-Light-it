<x-layout>
{{--    <flights-component></flights-component>--}}


    <div id='app' >
        <flight-component> </flight-component>
    </div>

    @if($flights->count())
        <x-flights-table :flights="$flights" />
        {{ $flights->links() }}
    @endif
    <script src="http://cdnjs.cloudfare"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.26.0/axios.js"></script>
    <script src="js/app.js" > </script>
</x-layout>

