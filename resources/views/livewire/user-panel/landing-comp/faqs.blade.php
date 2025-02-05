<div class="bg-white">
  <div class="mx-auto max-w-7xl px-6 py-24 sm:py-32 lg:px-8 lg:py-40">
    <div class="mx-auto max-w-4xl divide-y divide-gray-900/10">
      <h2 class="text-4xl font-semibold tracking-tight text-gray-900 sm:text-5xl">Frequently asked questions</h2>
      <dl class="mt-10 space-y-6 divide-y divide-gray-900/10">
      @foreach ($datas as $data)
      <div class="pt-6" x-data="{ open: false }">
                <dt>
                  <!-- Expand/collapse question button -->
                  <button
                    type="button"
                    class="flex w-full items-start justify-between text-left text-gray-900"
                    @click="open = !open"
                    aria-controls="faq-{{ $loop->index }}"
                    :aria-expanded="open">
                    <span class="text-base font-semibold">{{ $data['question'] }}</span>
                    <span class="ml-6 flex h-7 items-center">
                      <!-- Icon when question is collapsed -->
                      <svg
                        class="size-6"
                        :class="{'hidden': open}"
                        fill="none"
                        viewBox="0 0 24 24"
                        stroke-width="1.5"
                        stroke="currentColor"
                        aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v12m6-6H6" />
                      </svg>
                      <!-- Icon when question is expanded -->
                      <svg
                        class="hidden size-6"
                        :class="{'hidden': !open}"
                        fill="none"
                        viewBox="0 0 24 24"
                        stroke-width="1.5"
                        stroke="currentColor"
                        aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M18 12H6" />
                      </svg>
                    </span>
                  </button>
                </dt>
                <!-- Collapsible Answer -->
                <dd
                  class="mt-2 pr-12"
                  id="faq-0"
                  x-show="open"
                  x-collapse
                  x-transition:enter="transition ease-out duration-300"
                  x-transition:enter-start="opacity-0 max-h-0"
                  x-transition:enter-end="opacity-100 max-h-screen"
                  x-transition:leave="transition ease-in duration-300"
                  x-transition:leave-start="opacity-100 max-h-screen"
                  x-transition:leave-end="opacity-0 max-h-0">
                  <p class="text-base text-gray-600">
                      {{ $data['answer'] }}
                  </p>
                </dd>
              </div>
      @endforeach
        <!-- Add more questions in similar structure -->
      </dl>
    </div>
  </div>
</div>


