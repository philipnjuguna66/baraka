<section  class=" @if($section->extra['margin_top']  ) -md:mt[{{ $section->extra['margin_top'] }}px] @endif
  @if($section->extra['bg_white']  ) bg-white @endif">
    <div class=" py-4 md:mx-auto md:w-4/5">
        <div  class="lg:mx-auto max-w-7xl px-6 lg:px-8">
            <div class="lg:mx-auto max-w-2xl text-center">
                <h2 class=" font-bold tracking-tight sm:text-xl">{{ $section->extra['heading'] }}</h2>
                <p class="mt-2 text-lg leading-8 text-gray-600">{{ $section->extra['subheading'] }}</p>
            </div>
            <div
                class="mt-16 grid grid-cols-1 gap-x-8 gap-y-4 lg:gap-y-20  lg:mx-0 lg:max-w-none lg:grid-cols-{{ $section->extra['columns'] }}">


                @foreach($section->extra['cards'] as $card)
                    <article class="shadow rounded-md px-4 py-4 mx-auto">

                        @if( isset($card['image']) && ! empty($card['image']))
                        <div class="relative w-full justify-center text-center">
                            <img src="{{\Illuminate\Support\Facades\Storage::url($card['image']) }}" loading="lazy" alt="{{ $card['title'] }}"
                                 class="object-cover">
                            <span class="text-center">{{ isset($card['image_name']) ? $card['image_name'] : ""}}</span>
                        </div>
                        @endif

                        <div class="max-w-xl px-2">
                            <div class="group relative py-4">
                                <h3 class="lg:mt-3 text-lg font-semibold leading-6 group-hover:text-gray-600">

                                        <span class="absolute inset-0"></span>
                                        {{ $card['title'] }}
                                </h3>



                                @if(isset($card['has_modal']) && ! $card['has_modal'])

                                    <p class="mt-5 line-clamp-3 leading-6 text-gray-600">
                                        {{ $card['description'] }}
                                    </p>
                                @endif

                                @if($card['view_more_link_label']?? false)
                                    <div class="mt-4 justify-end  py-4" x-data="{}">
                                        <a
                                            wire:navigate
                                            class="mb-4 button py-1 px-6 rounded-lg shadow-lg text-white absolute bottom-0 mt-4"
                                            href=""
                                        >
                                            {{ $card['view_more_link_label'] }}
                                        </a>


                                    </div>
                                @endif


                            </div>
                        </div>
                    </article>

                @endforeach


            </div>


            <div class=" ">
                <div class="px-6 py-2 sm:px-6 sm:py-1 lg:px-8">
                    <div class="md:mx-auto max-w-2xl text-center">
                        <div class="mt-10 flex items-center justify-center gap-x-6">

                            @if($section->extra['view_more_link'])
                                <a href="{{ $section->extra['view_more_link'] }}"
                                   wire:navigate
                                   class="text-sm font-semibold leading-6 button">{{ $section->extra['view_more_link_label'] }} <span
                                        aria-hidden="true">→</span></a>
                            @endif
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>



    @push('scripts')

        <x-team_modal/>

    @endpush

</section>
