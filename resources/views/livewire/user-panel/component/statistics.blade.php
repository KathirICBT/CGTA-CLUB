{{-- <div class="grid grid-cols-2 sm:grid-cols-4 gap-8 w-full">
    @foreach ($stats as $stat)
        <div class="flex flex-col justify-center items-center text-center">
            <!-- Icon -->
            <img src="{{ asset('images/' . $stat['icon']) }}" alt="{{ $stat['label'] }}" class="h-12 w-12 mb-4 text-blue-500" />

            <!-- Value -->
            <p class="text-2xl font-bold text-gray-700">{{ $stat['value'] }}</p>

            <!-- Label -->
            <p class="text-sm text-gray-500 uppercase">{{ $stat['label'] }}</p>
        </div>
    @endforeach
</div> --}}


{{-- <div class="grid grid-cols-2 sm:grid-cols-4 gap-8 w-full">
    @foreach ($stats as $stat)
        <div class="flex flex-col justify-center items-center text-center">
            <!-- Icon -->
            <i class="{{ $stat['icon'] }} text-blue-500 text-4xl mb-4"></i>

            <!-- Value -->
            <p class="text-2xl font-bold text-gray-700">{{ $stat['value'] }}</p>

            <!-- Label -->
            <p class="text-sm text-gray-500 uppercase">{{ $stat['label'] }}</p>
        </div>
    @endforeach
</div> --}}

{{-- <div class="grid grid-cols-2 sm:grid-cols-4 gap-4 w-full">
    @foreach ($stats as $stat)
        <div class="flex flex-col justify-center items-center text-center">
            <!-- Icon -->
            <i class="{{ $stat['icon'] }} text-blue-500 text-2xl mb-2"></i>

            <!-- Value -->
            <p class="text-3xl font-bold text-gray-700">{{ $stat['value'] }}</p>

            <!-- Label -->
            <p class="text-sm text-gray-500 uppercase">{{ $stat['label'] }}</p>
        </div>
    @endforeach
</div> --}}

<div class="grid grid-cols-2 sm:grid-cols-4 gap-4 w-full">
    @foreach ($stats as $stat)
        <div class="flex flex-col justify-start items-start text-left relative">
            <!-- Icon with Ping Effect -->
            <div class="relative flex items-center justify-center h-8 w-8">
                <!-- Ping Effect -->
                <span 
                    class="absolute h-12 w-12 rounded-full bg-blue-500 opacity-75 animate-ping">
                </span>
                <!-- Icon -->
                <i class="{{ $stat['icon'] }} text-blue-500 text-2xl relative"></i>
            </div>

            <!-- Value -->
            <p class="text-3xl font-bold text-blue-800 mt-2">{{ $stat['value'] }}</p>

            <!-- Label -->
            <p class="text-sm text-gray-500 uppercase">{{ $stat['label'] }}</p>
        </div>
    @endforeach
</div>





