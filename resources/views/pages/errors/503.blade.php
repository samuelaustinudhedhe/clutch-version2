<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>503 Service Unavailable</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <style>
        @keyframes bounce {
            0%, 100% {
                transform: translateY(-25%);
                animation-timing-function: cubic-bezier(0.8, 0, 1, 1);
            }
            50% {
                transform: translateY(0);
                animation-timing-function: cubic-bezier(0, 0, 0.2, 1);
            }
        }
        .bounce {
            animation: bounce 1s infinite;
        }
    </style>
</head>
<body class="bg-gray-100 flex items-center justify-center h-screen">
    <div class="text-center">
        <h1 class="text-9xl font-bold text-gray-800 bounce">503</h1>
        <p class="text-2xl md:text-3xl font-light leading-normal">Service Unavailable</p>

        @if ($message)
            <p class="mt-4">{{ $messgae }}</p>
        @else
            <p class="mt-4">We are currently undergoing maintenance. Please check back later.</p>
        @endif
        
        <a href="{{ url('/') }}" class="mt-6 px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-700 transition duration-300 ease-in-out transform hover:scale-105">Go to Homepage</a>
    </div>
</body>
</html>