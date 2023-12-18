<x-guest-layout>
    @section('title', str($page->meta_title)->headline()->title())
    @section('description', $page->meta_description)
    @push('metas')
        @meta("title", $page->meta_title)
        @meta("description", $page->meta_description)
    @endpush

    <div class="mt-0 md:mt-4 py-12 ">
        @foreach($page->sections as $section)

            @php
                $animationEffect = new \Illuminate\Support\HtmlString(' loading="lazy" data-aos="fade-right" set="200" data-aos-easing="ease-in-sine" data-aos-duration="600"');
                if ($loop->even){
                     $animationEffect = new \Illuminate\Support\HtmlString(' loading="lazy" data-aos="fade-left" set="200" data-aos-easing="ease-in-sine" data-aos-duration="600"');
                }
            @endphp
            @include($section->type->sectionPath() ,['section' => $section ,'animationEffect' => $animationEffect])
        @endforeach

    </div>

</x-guest-layout>
