<x-guest-layout>
    @if ($message)
        <div class="flex items-center justify-center">
           501 Error : {{ $message }}
        </div>
    @else
        <div class="flex items-center justify-center">
            Error 501 Not Implemented
        </div>
    @endif

</x-guest-layout>
