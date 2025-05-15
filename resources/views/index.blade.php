<x-layout>

    @foreach ($activeSections as $section)
        @include('sections.' . $section->name)
    @endforeach


</x-layout>
