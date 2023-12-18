<div class="py-8 md:py-12">

    <div class="grid  border border-gray-200 rounded-lg shadow-sm dark:border-gray-700 md:grid-cols-2">
        @foreach($testimonials as $testimonial)
            <figure class="flex flex-col items-center justify-center p-8 text-center border-b border-gray-200 rounded-t-lg md:rounded-t-none md:rounded-tl-lg md:border-r dark:bg-gray-800 dark:border-gray-700">
                <blockquote class="max-w-2xl mx-auto mb-4 text-gray-500 lg:mb-8 dark:text-gray-400">
                    <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
                        {{ $testimonial->heading }}
                    </h3>
                    <p class="my-4">{{ $testimonial->body }}"</p>
                </blockquote>
                <figcaption class="flex items-center justify-center space-x-3">
                    <img class="rounded-full w-9 h-9" src="https://flowbite.s3.amazonaws.com/blocks/marketing-ui/avatars/karen-nelson.png" alt="profile picture">
                    <div class="space-y-0.5 font-medium dark:text-white text-left">
                        <div>{{ $testimonial->client }}</div>
                    </div>
                </figcaption>
            </figure>

        @endforeach
       </div>

    @if( $take < 1 ))
    <div class="flex justify-center mt-4 py-8 gap-4">
        {{ $blogs->onEachSide(4)->links() }}
    </div>
    @endif

</div>
