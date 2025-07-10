<x-layout>
    <div class="mb-6 text-[1.25em]/loose">@yield('pageTitle', 'Generating Objects')</div>
    <div class="mb-4 text-[0.75em]/loose">
        <ul class="mb-4">
            @foreach ($output as $item)
                <li class="mb-2">{{ $item }}</li>
            @endforeach
        </ul>
        <hr class="mb-4">
        <p class="mb-4">
            <strong>Name:</strong> {{ $name }}
        </p>
        <hr class="mb-4">
        <p>{{ $earthSea }}</p>
        <p>{{ $earthPlains }}</p>
        <p class="mb-4">{{ $earthForest }}</p>
        <hr class="mb-4">
        <p>{{ $megaApptEncoding }}</p>
        <hr class="mb-4">
        <p>{{ $appointmentOutput }}</p>
        <hr class="mb-4">
        <p>{{ $appointmentOutput2 }}</p>
    </div>
</x-layout>
