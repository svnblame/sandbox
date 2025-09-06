<x-layout>
    <div class="mb-6 text-[0.75em]/loose">@yield('pageTitle', 'Tasks List')</div>
    <div class="mb-4 text-[0.5em]/loose">
        <ul>
        @foreach($tasks as $task)
            <li>
                <a href="{{ route('tasks.show', $task->id) }}" class="text-blue-500 hover:text-blue-700">{{ $task->name }}</a> - {{ $task->description }}
            </li>
        @endforeach
        </ul>
    </div>
</x-layout>
