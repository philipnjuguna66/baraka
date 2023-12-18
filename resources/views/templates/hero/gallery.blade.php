@if($section['type'] == "grid")

    <div class="grid grid-cols-2 md:grid-cols-3 gap-4 mt-4">

        @foreach($section['images'] as $image)
            <div>

                <img class="h-auto max-w-full rounded-lg object-cover object-center"
                     src="{{  \Illuminate\Support\Facades\Storage::url($image['image'])}}"
                     alt="{{ $page->meta_title }}">
                <div class="mx-auto w-2/5 max-w-2xl flex justify-center items-center text-center">

                    <span class="text-center font-normal text-lg  py-2">{{ isset($image['image_name']) ? $image['image_name'] : ""}}</span>
                </div>


            </div>
        @endforeach

    </div>

@else

@endif

