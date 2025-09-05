<x-layout>
    <div class="mb-6 text-[0.75em]/loose">@yield('pageTitle', 'Tasks List')</div>
    <div class="mb-4 text-[0.5em]/loose">
        <ul>
        @foreach($tasks as $task)
            <li>{{ $task->name }} - {{ $task->description }}</li>
        @endforeach
        </ul>
    </div>
</x-layout>
