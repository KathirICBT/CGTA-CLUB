<div>
    <a href="{{ $url }}"
        class="flex items-center px-6 py-2 text-white rounded-full shadow-md transition duration-300"
        style="background-color: {{ $color }}; 
               color: white; 
               transition: background-color 0.3s ease;"
        onmouseover="this.style.backgroundColor='{{ $hoverColor }}'"
        onmouseout="this.style.backgroundColor='{{ $color }}'"
    >
        <!-- Display Icon if Provided -->
        @if ($iconURL)
            <img src="{{ asset('images/' . $iconURL) }}" alt="Icon" class="h-5 w-5 mr-2" />
        @endif

        <!-- Display Label -->
        {{ $label }}
    </a>
</div>
