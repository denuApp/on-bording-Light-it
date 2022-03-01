<x-layout>
    @if($cities->count())
        <x-cities-table :cities="$cities" />
        {{ $cities->links() }}
    @endif
</x-layout>
