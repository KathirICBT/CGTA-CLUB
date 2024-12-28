{{-- CALLING BUTTON COMPONENT - WITH TEXT COLOR ============= --}}
{{-- <div>
    <a href="{{ $url }}"
        class="flex items-center px-6 py-2 rounded-full shadow-md transition duration-300"
        style="
            background-color: {{ $color }};
            color: {{ $textColor }};
            transition: background-color 0.3s ease, color 0.3s ease;"
        onmouseover="this.style.backgroundColor='{{ $hoverColor }}'; this.style.color='{{ $textColor }}'"
        onmouseout="this.style.backgroundColor='{{ $color }}'; this.style.color='{{ $textColor }}'"
    >
        <!-- Display Icon if Provided -->
        @if ($iconURL)
            <img src="{{ asset('images/' . $iconURL) }}" alt="Icon" class="h-5 w-5 mr-2" />
        @endif

        <!-- Display Label -->
        {{ $label }}
    </a>
</div> --}}

{{-- CALLING BUTTON COMPONENT - AUTO TEXT COLOR ============= --}}
{{-- <div>
    <a href="{{ $url }}"
        class="flex items-center px-6 py-2 rounded-full shadow-md transition duration-300"
        style="
            background-color: {{ $color }};
            color: {{ $textColor }};
            transition: background-color 0.3s ease, color 0.3s ease;"
        onmouseover="this.style.backgroundColor='{{ $hoverColor }}';"
        onmouseout="this.style.backgroundColor='{{ $color }}';"
    >
        <!-- Display Icon if Provided -->
        @if ($iconURL)
            <img src="{{ asset('images/' . $iconURL) }}" alt="Icon" class="h-5 w-5 mr-2" />
        @endif

        <!-- Display Label -->
        {{ $label }}
    </a>
</div> --}}

{{-- CALLING BUTTON COMPONENT - AUTO TEXT COLOR - font awesome ICON ============= --}}
{{-- <div>
    <a href="{{ $url }}"
        class="flex items-center px-6 py-2 rounded-full shadow-md transition duration-300"
        style="
            background-color: {{ $color }};
            color: {{ $textColor }};
            transition: background-color 0.3s ease, color 0.3s ease;"
        onmouseover="this.style.backgroundColor='{{ $hoverColor }}';"
        onmouseout="this.style.backgroundColor='{{ $color }}';"
    >
        <!-- Display Font Awesome Icon if Provided -->
        @if ($icon)
            <i class="{{ $icon }} mr-2"></i>
        @endif

        <!-- Display Label -->
        {{ $label }}
    </a>
</div> --}}


{{-- CALLING BUTTON COMPONENT - AUTO TEXT COLOR - WITH ALT MESSAGE ============= --}}
<div>
    <a href="{{ $url }}"
        class="flex items-center px-6 py-2 rounded-full shadow-md transition duration-300"
        style="
            background-color: {{ $color }};
            color: {{ $textColor }};
            transition: background-color 0.3s ease, color 0.3s ease;"
        onmouseover="this.style.backgroundColor='{{ $hoverColor }}';"
        onmouseout="this.style.backgroundColor='{{ $color }}';"
    >
        <!-- Display Icon if Provided -->
        @if ($iconURL)
            <img src="{{ asset('images/' . $iconURL) }}" alt="{{ $iconAlt }}" class="h-5 w-5 mr-2" />
        @endif

        <!-- Display Label -->
        {{ $label }}
    </a>
</div>



