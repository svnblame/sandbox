<x-layout>
    <div class="mb-6 text-[0.75em]/loose">@yield('pageTitle', 'Create Task')</div>
    <div class="mb-4 text-[0.5em]/loose">
        <form class="bg-gray-100 shadow-md rounded px-8 pt-6 pb-8 mb-4" action="{{ route('tasks.store') }}"
              method="POST">
            @csrf
            <div class="mb-6">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="name">
                    Name
                </label>
                <input
                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                    id="name" name="name" type="text" placeholder="Task Name">
            </div>
            <div class="mb-6">
                <label
                    for="description"
                    class="block text-gray-700 text-sm font-bold mb-2">
                    Task Description
                </label>
                <textarea
                    id="description"
                    name="description"
                    placeholder="Task Description"
                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                >
                </textarea>
            </div>
            <div class="flex items-center justify-between">
                <button
                    class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline"
                    type="submit">
                    Create Task
                </button>
            </div>
        </form>
    </div>
</x-layout>
