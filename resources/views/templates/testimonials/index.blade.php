<section  class="bg-gray-950 py-8 md:py-8  px-2 text-gray-50 ">
    <div class=" md:py-24 sm:py-8 md:mx-auto md:w-4/5 max-w-7xl ">
        <div {{ $animationEffect }}   class="md:mx-auto px-2 lg:px-8">
            <div class="md:mx-auto max-w-2xl text-center">
                <h2 class="text-3xl font-bold tracking-tight sm:text-4xl text-gray-50"> {{ str($section->extra['heading'])->toHtmlString() }}</h2>
                <p class="mt-2 text-lg leading-8 "> {{ str($section->extra['subheading'])->toHtmlString() }}</p>
            </div>

            <?php
            $reviews =  \App\Models\Review::query()->take(6)->get();


            $place = \App\Models\ReviewSetting::query()->first();

            ?>
            <div class="flex items-center py-8  mx-auto max-w-3xl justify-between">

                <div class="flex  items-center ">
                    <svg class="w-4 h-4 text-yellow-300 me-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 22 20">
                        <path d="M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1.617l-.863-5.03L20.537 9.2a1.523 1.523 0 0 0 .387-1.575Z"/>
                    </svg>
                    <p class="ms-2 text-sm font-bold dark:text-white">
                        Google rating score: {{ number_format($place->rating, 1) }}  of 5,based on {{ $place->user_ratings_total }} reviews

                    </p>
                </div>
                <div>
                    <a href="https://www.google.com/search?client=firefox-b-d&q=barakasmiles+nairobi#lrd=0x182f3fb9800958bf:0xcfd3154d501cced3,1,,,," target="_blank" class="button bg-red-600">Leave Review</a>
                </div>

            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-x-4 gap-y-3">

                @foreach($reviews as $places)
                    @php
                        $review = $places->review

                    @endphp
                    <article class="py-2 bg-gray-800 rounded-md shadow-inner px-2">
                        <div class="flex items-center mb-4">

                            @if(isset($review['profile_photo_url']))
                                <img class="w-10 h-10 me-4 rounded-full" src="{{ $review['profile_photo_url'] }}" alt="{{ $review['author_name'] }}">
                            @endif
                            <div class="font-medium dark:text-white">
                                <p>{{ $review['author_name'] }}
                                    <time datetime=" {{ \Carbon\Carbon::parse($review['time'])->format('Y-m-d') }}" class="block text-sm dark:text-gray-400">
                                        {{ \Carbon\Carbon::parse($review['time'])->format('Y-m-d') }} -  {{\Carbon\Carbon::parse($review['time'])->diffForHumans() }}
                                    </time>

                                </p>
                            </div>
                        </div>
                        <div class="flex items-center mb-1 space-x-1 rtl:space-x-reverse">
                            @for($rating = 1; $rating <= $review['rating']; $rating++)
                                <svg class="w-4 h-4 text-yellow-300" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 22 20">
                                    <path d="M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1.617l-.863-5.03L20.537 9.2a1.523 1.523 0 0 0 .387-1.575Z"/>
                                </svg>
                            @endfor
                        </div>
                        <p class="mb-2 dark:text-gray-400">
                            {{  str($review['text'])->limit(150)->toHtmlString() ?? null }}
                            @if(isset($review['text']))
                                <a
                                    href="https://www.google.com/search?client=firefox-b-d&q=barakasmiles+nairobi#lrd=0x182f3fb9800958bf:0xcfd3154d501cced3,1,,,,"
                                    class="text-sm text-primary-600"
                                    target="_blank">
                                    Read More
                                </a>
                            @endif
                        </p>
                    </article>

                @endforeach
            </div>


           {{-- <livewire:testimonial.testimonials :take="$section->extra['count']"/>--}}

           {{-- @if( ! is_null($section->extra['link'] ))

                <div class=" ">
                    <div class="px-6 py-2 sm:px-6 sm:py-1 lg:px-8">
                        <div class="md:mx-auto max-w-2xl text-center">
                            <div class="mt-10 flex items-center justify-center gap-x-6">
                                <a href="/blogs" class="text-sm font-semibold leading-6 text-gray-900">View more blogs
                                    <span aria-hidden="true">→</span></a>
                            </div>
                        </div>
                    </div>
                </div>
            @endif--}}
        </div>
    </div>
</section>
