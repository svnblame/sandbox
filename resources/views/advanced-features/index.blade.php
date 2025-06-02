<x-layout>
    <div class="mb-6 text-[1.25em]/loose">@yield('pageTitle', 'Advanced Features')</div>
    <div class="mb-4 text-[0.75em]/loose">
        <p class="mb-4">{{ $greeting }}</p>
        <hr class="mb-4">
        <p class="mb-4">{{ $record }}</p>
        <hr class="mb-4">
        <p class="mb-4">{{ $book }}</p>
        <hr class="mb-4">
        <p>{{ $audioProduct }}</p>
    </div>
</x-layout>
