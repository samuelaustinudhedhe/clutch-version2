<x-guest-layout>
    @isset ($message)
        <div class="flex items-center justify-center">
           501 Error : {{ $message }}
        </div>
    @else
        <div class="flex items-center justify-center">
            Error 501 Not Implemented
        </div>
    @endisset

</x-guest-layout>
