<section  class=" ">
    <div class=" py-24 sm:py-12 md:mx-auto md:w-4/5">
        <div {{ $animationEffect }}  class="md:mx-auto max-w-7xl px-6 lg:px-8">
            <div class="md:mx-auto max-w-2xl text-center">
                <h2 class="text-3xl font-bold tracking-tight sm:text-4xl"> {{ str($section->extra['heading'])->toHtmlString() }}</h2>

            </div>

            @if($section->extra['type'] == "grid")


                <div class="grid grid-cols-2 md:grid-cols-3 gap-4 mt-4">

                    @foreach($section->extra['images'] as $image)
                        <div>

                            <img class="h-auto max-w-full rounded-lg object-cover object-center"
                                 src="{{  \Illuminate\Support\Facades\Storage::url($image['image'])}}"
                                 alt="{{ $page->meta_title }}">

                            <span class="text-center">{{ isset($image['image_name']) ? $image['image_name'] : ""}}</span>


                        </div>
                    @endforeach

                </div>

            @else
             <div class="grid grid-cols-1 md:grid-cols-5 columns-12 gap-4 mt-12">
                 <div class="col-span-3">

                     <div id="custom-controls-gallery" class="relative w-full" data-carousel="slide">
                         <!-- Carousel wrapper -->
                         <div class="relative h-56 overflow-hidden rounded-lg md:h-[500px]">


                             @foreach($section->extra['images'] as $slider)
                                 <!-- Item {{ $loop->index + 1 }} -->
                                 <div class="hidden duration-700 ease-in-out" data-carousel-item>
                                     <img src="{{  \Illuminate\Support\Facades\Storage::url($image['image'])}}"
                                          class="w-[800px] h-auto absolute block max-w-full  -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="">
                                 </div>

                             @endforeach



                         </div>
                         <div class="flex justify-center items-center pt-4">
                             <button type="button" class="flex justify-center items-center mr-4 h-full cursor-pointer group focus:outline-none" data-carousel-prev>
                                 <span class="text-gray-400 hover:text-gray-900 dark:hover:text-white group-focus:text-gray-900 dark:group-focus:text-white">
                                     <svg aria-hidden="true" class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M7.707 14.707a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 1.414L5.414 9H17a1 1 0 110 2H5.414l2.293 2.293a1 1 0 010 1.414z" clip-rule="evenodd"></path></svg>
                                     <span class="sr-only">Previous</span>
                                 </span>
                             </button>
                             <button type="button" class="flex justify-center items-center h-full cursor-pointer group focus:outline-none" data-carousel-next>
                                 <span class="text-gray-400 hover:text-gray-900 dark:hover:text-white group-focus:text-gray-900 dark:group-focus:text-white">
                                     <svg aria-hidden="true" class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M12.293 5.293a1 1 0 011.414 0l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-2.293-2.293a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                                     <span class="sr-only">Next</span>
                                 </span>
                             </button>
                         </div>
                     </div>

                 </div>
                 <div class="col-span-2 prose-2xl mt-12">
                     {!! $section->extra['content'] !!}

                     <div class="my-4 flex flex-col md:flex-row justify-between">

                         @if(isset($section->extra['cta_url'] ) && $section->extra['cta_url'] && $section->extra['cta_name']  )
                             <a href="{{ $section->extra['cta_url'] }}"
                                class="line-clamp-3  leading-6 text-gray-50 button font-semibold rounded-tr-2xl rounded-bl-2xl px-4 py-0.5"
                             >
                                 {{ $section->extra['cta_name'] }}
                             </a>
                         @endif
                     </div>

                 </div>
             </div>
            @endif
        </div>
    </div>
</section>
