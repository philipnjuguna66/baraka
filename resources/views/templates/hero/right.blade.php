<div class="md:mx-auto max-w-7xl  md:w-4/5 grid grid-cols-1 md:grid-cols-4 justify-start  content-start gap-8 py-12">


        <div class="md:col-span-2 mt-4">

            <img src="{{ \Illuminate\Support\Facades\Storage::url($section->extra['image']) }}"
                 loading="lazy"
                 class="rounded-md object-cover"
                 alt="{{ $page->title }}">


            @if(isset($section->extra['image_2']))

                <img src="{{ \Illuminate\Support\Facades\Storage::url($section->extra['image_2']) }}"
                     loading="lazy"
                     class="rounded-md object-cover mt-2"
                     alt="{{ $page->title }}">
            @endif


        </div>

        <div class="md:col-span-2 mx-4  @if(isset($section->extra['margin_top'])  && $section->extra['margin_top'] == true) mt-20 lg:mt-28 @endif">

            <h2 class="font-extrabold text-xl lg:text-3xl text-start ">
                {{ $section->extra['heading'] }}
            </h2>

            <p  class="font-normal text-md lg:text-xl   py-2 px-3 md:px-0 sm:mx-auto">

                {!! $section->extra['description'] !!}


            </p>

            <div class="my-4 flex flex-col md:flex-row justify-between">

                @if($section->extra['cta_url'] && $section->extra['cta_name']  )
                    <a href="{{ $section->extra['cta_url'] }}"
                       class="line-clamp-3  leading-6 text-gray-50 button font-semibold rounded-tr-2xl rounded-bl-2xl px-4 py-0.5"
                    >
                        {{ $section->extra['cta_name'] }}
                    </a>
                @endif
            </div>
        </div>



    </div>

