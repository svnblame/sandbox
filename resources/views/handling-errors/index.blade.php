<x-layout>
    <div class="mb-6 text-[1.25em]/loose">@yield('pageTitle', 'Handling Errors')</div>
    <div class="mb-4 text-[0.75em]/loose">
        <ul>
            <li>User: {{ $results['user'] }}</li>
            <li>Host: {{ $results['host'] }}</li>
        </ul>
    </div>
</x-layout>
