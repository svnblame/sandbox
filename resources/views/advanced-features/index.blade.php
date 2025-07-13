<x-layout>
    <div class="mb-6 text-[1.25em]/loose">
        @section('pageTitle')
            {{ $pageTitle }}
        @endsection
    </div>
    <div class="mb-4 text-[0.75em]/loose">
        <p class="mb-4">{{ $greeting }}</p>
        <hr class="mb-4">
        <p class="mb-4">{{ $record }}</p>
        <hr class="mb-4">
        <p class="mb-4">{{ $book }}</p>
        <hr class="mb-4">
        <p class="mb-4">{{ $audioProduct }}</p>
        <hr class="mb-4">
        <p class="mb-4">{{ $productCategory }}</p>
        <hr class="mb-4">
        <p class="mb-4">{{ $randomCategory }}</p>
        <hr class="mb-4">
        <p class="mb-4 text-[14px]">
            Output from XmlProductWriter: <br>
            {{ $xmlProduct1 }}
        </p>
        <hr class="mb-4">
        <p class="mb-4 text-[14px]">
            Output from TextProductWriter: <br>
            {{ $textProduct1 }}
        </p>
        <hr class="mb-4">
        <p class="mb-4 text-[14px]">
            Calculated Tax: <br>
            {{ $pCalculatedTax }}
        </p>
        <hr class="mb-4">
        <p class="mb-4 text-[14px]">
            Final Price: <br>
            {{ $uFinalPrice }}
        </p>
        <hr class="mb-4">
        <p class="mb-4 text-[14px]">
            Product2 Final Price: <br>
            {{ $p2FinalPrice }}
        </p>
        <hr class="mb-4">
        <p class="mb-4 text-[14px]">
            Product2 Generated ID: <br>
            {{ $p2ID }}
        </p>
        <hr class="mb-4">
        <p class="mb-4 text-[14px]">
            Document: <br>
            {{ $document }}
        </p>
        <hr class="mb-4">
        <p class="mb-4 text-[14px]">
            User: <br>
            {{ $user }}
        </p>
        <hr class="mb-4">
        <p class="mb-4 text-[14px]">
            SpreadSheet: <br>
            {{ $spreadSheet }}
        </p>
    </div>
</x-layout>
