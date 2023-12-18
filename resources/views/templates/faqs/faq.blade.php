<section  class="@if($section->extra['bg_white']  ) bg-white @endif">
    <div class="py-12 md:py-24 md:mx-auto md:w-4/5 max-w-7xl ">
        <div {{ $animationEffect }}   class="md:mx-auto px-6 lg:px-8">
            <div class="md:mx-auto max-w-2xl text-center">
                <h2 class="text-3xl font-bold tracking-tight sm:text-4xl"> {{ str($section->extra['heading'])->toHtmlString() }}</h2>
                <p class="mt-2 text-lg leading-8 text-gray-600"> {{ str($section->extra['subheading'])->toHtmlString() }}</p>
            </div>


                <div class="mt-4 lg:mt-8 lg:py-8 mx-auto max-w-4xl divide-y divide-gray-900/10">



                    @if(isset($section->extra['template']) && $section->extra['template'] == "default")
                        @include('templates.faqs.default')
                    @else
                        @include('templates.faqs.grid')
                    @endif
                </div>
        </div>
    </div>
</section>
