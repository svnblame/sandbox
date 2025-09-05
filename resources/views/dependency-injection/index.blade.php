<x-layout>
    <div class="mb-6 text-[1.25em]/loose">
        @section('pageTitle')
            {{ $pageTitle }}
        @endsection
    </div>
    <div class="mb-4 text-[0.75em]/loose">
        {{ $pageTitle }}
    </div>
    <div class="mb-4 text-[0.75em]/loose">
        <p class="mb-4">
            <strong>Output:</strong> {{ $output1 }}
        </p>
{{--        <hr class="mb-4">--}}
{{--        <p class="mb-4">--}}
{{--            <strong>Checker:</strong> {{ $checker->toString() }}--}}
{{--        </p>--}}
    </div>
</x-layout>
