<section class="animate-div" id="business-model">
    <div class="">
        <div {{ $animationEffect }}  class="mx-auto w-4/5 py-4 lg:py-24 lg:max-w-7xl">
            <h2 class=" py-8 text-center font-extrabold text-2xl leading-tight ">
                {{  $section->extra['heading'] }}
            </h2>

            <p class="font-semibold text-center mx-auto text-md py-2">
                {{ $section->extra['subheading'] }}
            </p>


            <!-- component -->
            <div class="mt-0">
                <div class="relative wrap overflow-hidden md:p-10 -md:pt-4 h-full">
                    <div class="md:border-2-2 md:absolute md:border-opacity-20 md:border-gray-700 md:h-full md:border"
                         style="left: 50%"></div>

                    @foreach($section->extra['items'] as $item)
                        <!-- {{ $loop->odd ? "right" : "left "}} timeline -->

                        <div
                            class="mb-0 md:flex md:justify-between md:items-center @if($loop->even) md:flex-row-reverse md:left-timeline @else md:right-timeline @endif">
                            <div class="order-1 w-5/12"></div>
                            <div class="z-20 flex items-center order-1 bg-secondary-800 shadow-xl w-12 h-12 rounded-full">
                                <h4 class="mx-auto text-white font-semibold text-lg">{{ $item['label'] }}</h4>
                            </div>
                            <div class="order-1 bg-gray-100 rounded-lg shadow-sm  md:shadow-xl  shadow-gray-950 md:shadow-gray-500  md:w-5/12    px-6 py-4">
                                <h3 class="mb-3 font-bold text-secondary-500 text-xl">
                                    {{ $item['title'] }}
                                </h3>

                                @if( isset($item['image']) && ! empty($item['image']))
                                    <div class="relative w-full">
                                        <img src="{{\Illuminate\Support\Facades\Storage::url($item['image']) }}" loading="lazy" alt="{{ $item['title'] }}"
                                             class="aspect-[16/9] w-full  bg-gray-100 object-cover sm:aspect-[2/1] lg:aspect-[3/2]">
                                        <div class="absolute inset-0  ring-1 ring-inset ring-gray-900/10"></div>
                                    </div>
                                @endif

                                <p class="text-sm leading-snug tracking-wide text-gray-900 text-opacity-100">

                                   {{ $item['content'] }}
                                </p>
                            </div>
                        </div>

                    @endforeach


                </div>

            </div>
        </div>

    </div>

</section>

