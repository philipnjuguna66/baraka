<div class="">
    <div class="bg-white relative">
        <div class="w-full md:pt-[4.9rem] -mb-[4rem] md:-mb-[6rem]"  data-carousel="slide">

            <div class="relative h-56 overflow-hidden lg:h-[580px]">
                @foreach($sliders as $slider)


                        <div class="hidden duration-700  ease-in-out" data-carousel-item>
                            <img  src="{{ \Illuminate\Support\Facades\Storage::url($slider['image']) }}"
                                  class="absolute block object-cover bg-center bg-contain bg-no-repeat  w-full object-center -translate-x-1/2 -translate-y-1/2  top-1/2 left-1/2"
                                  alt="{{ $page->meta_title }}">
                        </div>

                @endforeach

            </div>
        </div>
    </div>
</div>
