<div class="@if($section->extra['bg_white']  ) bg-white @endif  ">
    <div class="mx-auto md:w-4/5 mt-2 max-w-7xl py-12 md:py-24 md:px-6 px-8">

        <div {{ $animationEffect }}  class="lg:mx-auto max-w-7xl px-6 lg:px-8">
            <div class="lg:mx-auto max-w-2xl text-center">
                <h1 class="text-3xl font-bold tracking-tight sm:text-4xl py-12">{{ $section->extra['heading'] }}</h1>
                <p class="mt-2 text-lg leading-8 text-gray-600 py-4">{{ $section->extra['subheading'] }}</p>
            </div>
        <div id="accordion-color" data-accordion="collapse" data-active-classes="bg-primary-600 text-gray-50 dark:text-white mt-4">
            @php $json = [] @endphp

            @foreach($section->extra['faqs'] as $faq)
                <h2 id="accordion-color-heading-{{ $loop->iteration }}">
                    <button type="button" class="flex items-center justify-between w-full p-5 font-medium text-left text-gray-500 border border-b-0 border-gray-200 rounded-t-xl focus:ring-4 focus:ring-primary-600 dark:focus:ring-primary-800 dark:border-gray-700 dark:text-gray-400 hover:bg-secondary-600/70 dark:hover:bg-gray-950" data-accordion-target="#accordion-color-body-{{ $loop->iteration }}" aria-expanded="true" aria-controls="accordion-color-body-{{ $loop->iteration }}">
                        <span>{{ $faq['title'] }} </span>
                        <svg data-accordion-icon class="w-3 h-3 rotate-180 shrink-0" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5 5 1 1 5"/>
                        </svg>
                    </button>
                </h2>



                <div id="accordion-color-body-{{ $loop->iteration }}" class="hidden" aria-labelledby="accordion-color-heading-1">
                    <div class="p-5 border border-b-0 border-gray-200 dark:border-gray-700 dark:bg-gray-900">
                        <p class="mb-2 text-gray-500 dark:text-gray-400 prose">
                            {{  str( $faq['description'])->toHtmlString() }}
                        </p>

                    </div>
                </div>
            @endforeach

            @php

                $json[]= (["@type" => "Question", "name" => $faq['title'], "acceptedAnswer" => ["@type" => "Answer", "text" => str($faq['description'])->stripTags()]]);

            @endphp
            @push('scripts')

                <script type="application/ld+json">
            {
                "@context": "https://schema.org",
                "@type": "FAQPage",
            }
        </script>
            @endpush
        </div>
        </div>
    </div>

</div>
