@php $json = []; @endphp

@foreach($section->extra['faqs'] as $faq)

    <dl class="mt-3 space-y-2 divide-y divide-gray-900/10" x-data="{ faqIsOpen: false }">
        <div class="pt-6" >
            <dt >
                <!-- Expand/collapse question button -->
                <button @click="faqIsOpen= !faqIsOpen" type="button" class="flex w-full items-start justify-between text-left text-gray-900" aria-controls="faq-0" aria-expanded="false">
                    <span class="text-base font-semibold leading-7">{{ $faq['title'] }}</span>
                    <span class="ml-6 flex h-7 items-center">

                                    <svg  class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v12m6-6H6" />
                                    </svg>
                        <!--
                          Icon when question is expanded.

                          Item expanded: "", Item collapsed: "hidden"
                        -->
                                    <svg class="hidden h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M18 12H6" />
                                    </svg>
                                </span>
                </button>
            </dt>
            <dd x-cloak class="mt-2 pr-12" id="faq-0" x-show="faqIsOpen">
                <p class="text-base leading-7 prose text-gray-600">
                    {{  str( $faq['description'])->toHtmlString() }}
                </p>
            </dd>
        </div>


    </dl>

    @php

        $json[]= (["@type" => "Question", "name" => $faq['title'], "acceptedAnswer" => ["@type" => "Answer", "text" => str($faq['description'])->stripTags()]]);

    @endphp

@endforeach

@push('scripts')

    <script type="application/ld+json">
        {
            "@context": "https://schema.org",
            "@type": "FAQPage",
            "mainEntity": {!! json_encode($json) !!}
        }

</script>
@endpush
