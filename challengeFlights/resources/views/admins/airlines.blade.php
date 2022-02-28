<x-layout>
    @if($airlines->count())

        <x-airlines-table :airlines="$airlines"/>
        {{ $airlines->links() }}
    @endif

</x-layout>
