<x-layout>
    @if($cities->count())
        <x-cities-table :cities="$cities" />
        {{ $cities->links() }}
    @endif

    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <x-cities-jquery :cities="$cities"/>
</x-layout>
