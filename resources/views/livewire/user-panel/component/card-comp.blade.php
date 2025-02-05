<div x-data="testimonialCarousel({{ count($datas) }})" class="overflow-hidden py-4 relative">
  <div class="max-w-8xl mx-auto">
    <!-- Header Section -->
    <div class="container mx-auto">
      <h2 class="mt-2 text-4xl font-bold text-gray-900">{{$heading}}</h2>
    </div>

    <!-- Testimonials Section -->
    <div class="mt-8 flex gap-8 px-6 overflow-x-auto snap-x snap-mandatory scroll-smooth w-full no-scrollbar">
        @foreach ($datas as $data)
          <div
            class="relative w-[380px] h-[580px] shrink-0 snap-center rounded-2xl overflow-hidden shadow-lg transition-transform duration-500 ease-in-out">
            <!-- Background Image -->
            <img
              src="{{ $data['img'] }}"
              alt="{{ $data['name'] }}"
              class="absolute inset-0 h-full w-full object-cover"
            />

            <!-- Gradient Overlay -->
            <div class="absolute inset-0 bg-gradient-to-t from-black to-transparent"></div>

            <!-- Text Content -->
            <div class="absolute bottom-0 p-6 text-white">
              <p class="text-lg font-semibold leading-tight border-b border-gray-500 pb-3">
                “{{ $data['quote'] }}”
              </p>
              <div class="mt-4">
                <p class="text-base font-bold ">{{ $data['name'] }}</p>
                <p class="text-sm font-medium text-purple-400">{{ $data['title'] }}</p>
              </div>
            </div>
          </div>
        @endforeach
      </div>

    <!-- Call to Action -->
    <div class="mt-16 flex justify-between items-center mx-auto container">
      <a
        href="#contact"
        class="px-6 py-3 bg-blue-600 text-white rounded-lg shadow hover:bg-blue-700 transition"
      >
        Get in Touch
      </a>

      <div class="hidden sm:flex gap-2">
        @foreach ($datas as $index => $data)
          <button
            class="w-2.5 h-2.5 rounded-full bg-gray-300 hover:bg-gray-400 @if ($loop->first) bg-gray-400 @endif"
            aria-label="Scroll to testimonial from {{ $data['name'] }}"
          ></button>
        @endforeach
      </div>
    </div>
  </div>
</div>
