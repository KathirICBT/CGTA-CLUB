{{--<div>--}}
{{--    --}}{{-- Be like water. --}}
{{--</div>--}}

<button class="
    {{ $type === 'edit' ? 'text-amber-500 hover:text-amber-300' : '' }}
    {{ $type === 'delete' ? 'text-rose-500 hover:text-rose-300' : '' }}
    text-lg flex justify-center items-center space-x-2"
    wire:click="emitAction"
>

    @if ($icon)
        <i class="
            {{ $type === 'edit' ? 'fas fa-edit' : '' }}
            {{ $type === 'delete' ? 'fas fa-trash-alt' : '' }}">
        </i>
    @endif

    @if ($text)
        <span>{{ $text }}</span>
    @endif
</button>
