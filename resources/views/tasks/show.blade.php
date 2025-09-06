<x-layout>
    <div class="mb-6 text-[0.75em]/loose">@yield('pageTitle', $task->name)</div>
    <div class="mb-4 text-[0.5em]/loose">
        <p class="mb-3 text-xl text-gray-500 dark:text-gray-400">
            {{ $task->description }}
        </p>
        <div class="flex items-center justify-between">
            <form action="{{ route('tasks.destroy', $task) }}" method="POST">
                @method('DELETE')
                @csrf
                <button
                    class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline"
                    type="submit">
                    Delete Task
                </button>
            </form>
        </div>
    </div>
</x-layout>
