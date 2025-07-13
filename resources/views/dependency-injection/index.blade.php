<x-layout>
    <div class="mb-6 text-[1.25em]/loose">
        @section('pageTitle')
            {{ $pageTitle }}
        @endsection
    </div>
    <div class="mb-4 text-[0.75em]/loose">
        {{ $pageTitle }}
    </div>
</x-layout>
