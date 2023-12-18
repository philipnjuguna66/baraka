<section class=" @if($section->extra['bg_white']  ) bg-white @endif">
    <div class=" py-24 sm:py-12 md:mx-auto md:w-4/5">
        <div class="lg:mx-auto max-w-7xl px-6 lg:px-8">
            <div  {{ $animationEffect }}>
                <div class="lg:mx-auto max-w-2xl text-center">
                    <h2 class="text-3xl font-bold tracking-tight sm:text-4xl">{{ $section->extra['heading'] }}</h2>
                    <p class="mt-2 text-lg leading-8 text-gray-600">{{ $section->extra['subheading'] }}</p>
                </div>
                <div
                    class="mt-16 grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-1">


                    @foreach($section->extra['videos'] as $video)
                        <article class="">
                            <div class="rounded-xl shadow-2xl shadow-secondary-400/20">

                                @include('templates.embeded._video_iframe' , [ 'videoUri' =>   $video['video_link']])
                            </div>
                        </article>

                    @endforeach


                </div>
            </div>
        </div>
    </div>

</section>
