<x-layout>
    <div class="mb-6 text-[0.75em]/loose">@yield('pageTitle', 'PHP 8: Objects, Patterns and Practice')</div>
    <div class="mb-4 text-[0.5em]/loose">
        Code examples from PHP 8: Objects, Patterns and Practice, 7th Edition, Volume 1
    </div>
    <div class="mb-4 text-[0.5em]/loose">
        <a href="<?php echo route('members.show', ['id' => 14]); ?>">Members</a>
    </div>
    <div class="mb-4 text-[0.5em]/loose">
        <a href="<?php echo route('tasks.create'); ?>">Tasks: Create</a>
    </div>
    <div class="mb-4 text-[0.5em]/loose">
        <a href="<?php echo route('tasks.index'); ?>">Tasks: List</a>
    </div>
</x-layout>
