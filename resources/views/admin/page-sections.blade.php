<x-admin-layout>

        @foreach ($activeSections as $section)
            @include('sections.' . $section->name)
        @endforeach
</x-admin-layout>
