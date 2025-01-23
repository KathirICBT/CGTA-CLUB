<div class="bg-gray-50/5">
  <div class="xl:w-1200 mx-auto w-11/12 py-12 md:py-20 lg:w-10/12">
    <div class="space-y-20">
      @foreach ($sections as $section)
        <div class="space-y-6 text-center md:flex md:items-center md:justify-around md:space-x-12 md:space-y-0 md:text-left {{ $section['reverse'] ? 'md:flex-row-reverse' : '' }}">
          <div class="w-full space-y-4 md:w-1/3">
            <h3 class="text-3xl lg:text-4xl font-bold text-gray-800">{{ $section['title'] }}</h3>
            <p class="text-gray-600 leading-relaxed">
              {{ $section['content'] }}
            </p>
          </div>
          <div class="mx-auto w-full sm:w-3/4 md:w-1/3">
              <img
                src="{{ $section['image'] }}"
                alt="{{ $section['title'] }}"
                class="w-full h-auto object-cover rounded-lg shadow-lg">
          </div>
        </div>
      @endforeach
    </div>
  </div>
</div>
