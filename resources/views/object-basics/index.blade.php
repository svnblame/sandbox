<x-layout>
    <div class="mb-6 text-[1.25em]/loose">@yield('pageTitle', 'Object Basics')</div>
    <div class="mb-4 text-[0.75em]/loose">
        <p class="mb-4">{{ $author }}</p>
        <hr class="mb-4">
        <ul class="mb-4">
            @foreach ($addresses as $address)
                <li class="mb-2">{{ $address }}</li>
            @endforeach
        </ul>
        <hr class="mb-4">
        <p class="mb-4">{{ $summary }}</p>
    </div>
</x-layout>
