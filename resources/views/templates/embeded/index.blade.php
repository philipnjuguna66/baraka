<section  class=" @if($section->extra['bg_white']  ) bg-white @endif">
    <div class=" py-24 sm:py-12 mx-auto md:w-4/5">
        <div {{ $animationEffect }}  class="mx-auto max-w-7xl px-6 lg:px-8">
            <div class="mx-auto max-w-2xl text-center">
                <h2 class="text-3xl font-bold tracking-tight sm:text-4xl">{{ $title }}</h2>
                <p class="mt-2 text-lg leading-8 text-gray-600">{{ $description }}</p>
            </div>
            <div class="mx-auto mt-16 grid max-w-2xl grid-cols-1 gap-x-8 gap-y-20 lg:mx-0 lg:max-w-none lg:grid-cols-3">


                @foreach(range(0,2) as $range)
                    <article class="flex flex-col items-start justify-between shadow-md rounded-md">
                        <div class="relative w-full">
                            <iframe
                                    class="aspect-[16/9] w-full  bg-gray-100 object-cover sm:aspect-[2/1] lg:aspect-[3/2]"
                                    src="https://www.youtube.com/embed/cMO-sgr7GcY" title="Top Reason Why You Should Invest In Satellite Towns Around Nairobi - Kamulu" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
                           <div class="absolute inset-0  ring-1 ring-inset ring-gray-900/10"></div>
                        </div>
                    </article>

                @endforeach


            </div>


            <div class="">
                <div class="px-6 py-2 sm:px-6 sm:py-1 lg:px-8">
                    <div class="mx-auto max-w-2xl text-center">
                        <div class="mt-10 flex items-center justify-center gap-x-6">
                            <a href="#" class="text-sm font-semibold leading-6 text-gray-900">View more Projects <span aria-hidden="true">→</span></a>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>

</section>
