{{--<div>--}}
{{--    --}}{{-- Close your eyes. Count to one. That is how long forever feels. --}}
{{--</div>--}}


<div class="isolate bg-gray-100 min-h-screen px-5 py-5 sm:py-5 md:w-full overflow-x-hidden  scrollbar-custom">

    <form wire:submit.prevent="submitForm" method="POST" class="bg-white mx-auto mt-8 sm:mt-8 md:w-full overflow-auto p-5 border rounded-2xl scrollbar-custom">
        <label for="first_name" class="text-xl font-semibold leading-6 text-sky-600 flex justify-start items-start p-1 ">
            EVENT CATEGORY
        </label>
        <div class="mt-5">
            <div>
                <label for="first_name" class="block text-sm font-semibold leading-6 text-gray-500">
                    Event Category Name
                </label>
                <div class="mt-1">
                    <input type="text" id="name" wire:model="name" placeholder="Event Category Name"
                           class="block w-full border-0 px-3.5 py-2 rounded-lg  shadow-sm ring-1 ring-inset ring-gray-300  focus:ring-2 focus:ring-inset  sm:text-md sm:leading-6" />
                    @error('name') <span class="text-red-500 text-md">{{ $message }}</span> @enderror
                </div>
            </div>

        <!-- Submit Button -->
        <div class="mt-6 w-full flex justify-end ">
            <button type="submit"
                    class="bg-sky-400 text-black py-2 px-7 rounded-md shadow-sm hover:bg-sky-600 focus:ring-2 focus:ring-inset focus:ring-sky-700">
                {{ $eventCategoryId ? 'Update' : 'Create' }}
            </button>
        </div>
    </form>
</div>
