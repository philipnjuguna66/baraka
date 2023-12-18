<div class="mt-4">

    <div class="grid grid-cols-1 md:grid-cols-2 gap-2">

        @php $json = []; @endphp

        @foreach($section->extra['faqs'] as $faq)
        <div @if($loop->first) x-data="{ open: true }" @else x-data="{ open: false }" @endif class=" bg-white rounded-lg  shadow-sm  md:shadow-md  shadow-charcoal-500/50 md:shadow-charcoal-500/50  ">

            <div class="flex justify-between">

                <p class="text-left p-4 rounded-lg font-bold text-xl leading-tight focus:outline-none focus:shadow-outline-blue">
                    {{  str( $faq['title'])->toHtmlString() }}
                </p>


                <button @click="open = !open" class=" p-4">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                         stroke-width="1.5"
                         stroke="currentColor" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round"
                              d="M11.25 4.5l7.5 7.5-7.5 7.5m-6-15l7.5 7.5-7.5 7.5"/>
                    </svg>

                </button>
            </div>

            <div x-show="open" x-cloak
                 class="text-left p-4 prose  rounded-lg  focus:outline-none focus:shadow-outline-blue">
                {{  str( $faq['description'])->toHtmlString() }}
            </div>
        </div>
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
    </div>
</div>
