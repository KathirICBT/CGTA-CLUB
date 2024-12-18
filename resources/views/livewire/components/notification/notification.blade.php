{{--<div>--}}
{{--    --}}{{-- Close your eyes. Count to one. That is how long forever feels. --}}
{{--</div>--}}

<div
    @if($banner)
        style="display:block;"
    @else
        style="display:none;"
    @endif
    class="p-4 rounded-md absolute top-20 right-5
           {{ $bannerStyle === 'success' ? 'bg-emerald-200 text-emerald-900 border-emerald-900 border' :
              ($bannerStyle === 'danger' ? 'bg-red-200 text-red-900 border-red-900 border' :
              'bg-gray-500 text-white') }}"
>
    <div class="flex justify-between items-center space-x-5">
        <!-- Notification Message -->
        <p class="truncate">{{ $banner }}</p>

        <!-- Close Button -->
        <button
            @click="$el.closest('div[style]').style.display = 'none'"
            wire:click="clearNotification"
            class="text-white hover:text-gray-300 focus:outline-none text-lg bg-gray-800 w-5 h-5 rounded-full flex justify-center items-center"
        >
            &times;
        </button>
    </div>
</div>

