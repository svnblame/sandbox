<x-layout>
    <x-slot:title>PHP 8: Objects, Patterns, and Practice</x-slot:title>
    <p class="mb-4">{{ $author }}</p>
    <hr class="mb-4">
    <ul class="mb-4">
        @foreach ($addresses as $address)
            <li class="mb-2">{{ $address }}</li>
        @endforeach
    </ul>
    <hr class="mb-4">
    <p class="mb-4">{{ $summary }}</p>
</x-layout>
