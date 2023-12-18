<x-guest-layout>
    @section('title', str($page->meta_title)->headline()->title())
    @section('description', $page->meta_description)
    @if(isset($whatsApp->phone_number))
        @section('whatsApp', $whatsApp->phone_number)
    @endif
    @push('metas')

        @meta("title", $page->meta_title)
        @meta("description", $page->meta_description)
    @endpush

    <div class="">


        <div class="mx-auto md:w-4/5 max-w-full	 py-12 md:mt-12 md:py-16 px-8">
            <h1 class="py-12 md:py-4 font-extrabold text-2xl lg:text-4xl text-center uppercase px-8 md:px-0">{{ $page->name }}</h1>

        </div>
    </div>

        @if(! $page->use_page_builder)
        <div class="bg-white">


            <div class="mx-auto md:w-4/5 max-w-full px-8">
                <div class="grid grid-cols-1 md:grid-cols-7 gap-4 py-8">


                    <div class="md:col-span-4">

                        <article class=" ">
                            @if(! is_null($page->video_path))
                                @include('templates.embeded._video_iframe' , [ 'videoUri' =>   $page->video_path, 'autoplay' => true ])
                            @else
                                <img class="h-auto w-full max-w-full rounded-lg object-cover object-center"
                                     src="{{  \Illuminate\Support\Facades\Storage::url($page->featured_image)}}"
                                     alt="{{ $page->meta_title }}"
                                >
                            @endif
                        </article>


                        <div class="mx-auto py-12 max-w-7xl prose md:text-justify">

                            <div class="">

                                {{ str($page->body)->toHtmlString() }}

                            </div>
                        </div>

                        <div>

                            <div class="mt-2">
                                @if( ! is_null($page->map)  )
                                    {{  new \Illuminate\Support\HtmlString($page->map) }}
                                @endif
                            </div>

                            <div class="mt-2">
                                @if( ! is_null($page->mutation)  )
                                    <a
                                        target="_blank"
                                        class="button text-white px-8 py-1 rounded"
                                        href="{{ asset(\Illuminate\Support\Facades\Storage::url($page->mutation)) }}">

                                        Download Project Map
                                    </a>

                                @endif
                            </div>
                        </div>

                    </div>

                    <div class="md:col-span-3">

                        <livewire:contact.book-site-visit :page="$page"/>

                        @if(isset($whatsApp->phone_number))
                            <div class="mt-4 py-3 md:mx-auto md:max-w-2xl md:w-4/5">

                                <div class=" px-4">
                                    <h3 class="py-2 px-4 text-center capitalize">{{ $whatsApp->name }}</h3>
                                    <img
                                        class="  mx-4 px-8 object-cover rounded-md shadow-sm"
                                        loading="lazy"
                                        alt="{{ $whatsApp->name }}"
                                        src="{{ \Illuminate\Support\Facades\Storage::url($whatsApp->avatar) }}"
                                    >

                                    <div class="md:text-center align-middle mt-4">

                                        <div class="flex flex-col gap-1">

                                            <span class="text-lg"> Interested in this Project:?</span>
                                        </div>


                                        <a
                                            target="_blank"
                                            class="button bg-red-600 hover:bg-red-500"
                                            wire:navigate
                                            href="https://wa.me/{{ $whatsApp->phone_number }}/?text=Hi+{{ $whatsApp->name }}%2c+I%e2%80%99d+like+to+chat+about+this+property+I+saw+on+the+Fanaka++Website.+Please+contact+me.+{{ url()->current() }}"
                                        >
                                            Click here to WhatsApp Me
                                        </a>
                                    </div>



                                </div>


                            </div>
                        @endif



                        <div class="">
                            <h3 class="font-semibold text-xl md:text-3xl md:font-extrabold text-center px-2"> Amenities and
                                Features</h3>

                            @if(is_array($page->amenities))
                                <ul class="list-decimal mx-4">
                                    @foreach($page->amenities as $amenity => $value)

                                        <li class="px-8 font-semibold">
                                            {{ str($value)->toHtmlString() }}
                                        </li>

                                    @endforeach
                                </ul>
                            @else
                                <div class="px-8 py-4 prose">
                                    {{ str($page->amenities)->toHtmlString() }}
                                </div>
                            @endif

                        </div>

                    </div>

                </div>

                <div class="max-w-7xl">

                    @if(is_array($page->gallery))

                        <div class="grid grid-cols-1 md:grid-cols-3 gap-4">

                            @foreach($page->gallery as $gallery)
                                <div>

                                    <img class="h-auto w-full max-w-full rounded-lg object-cover object-center"
                                         src="{{  \Illuminate\Support\Facades\Storage::url($gallery)}}"
                                         alt="{{ $page->meta_title }}"
                                    >
                                </div>
                            @endforeach

                        </div>
                    @endif
                    <div class="">

                        <h3 class="py-4 mt-3 text-center font-bold text-md md:text-4xl">Similar Projects</h3>

                        <livewire:project.website.similar-project :project="$page"/>
                    </div>
                </div>

        </div>
    </div>
            @else

                @foreach($page->extra as $extra)


                    <div  class="bg-gray-50  @if($extra['extra']['bg_white'] )  bg-white @endif">
                        <div class="mx-auto md:w-4/5 max-w-full	 py-12 md:mt-20 md:py-16 px-8">
                           <div class="  grid grid-cols-1 md:grid-cols-{{ $extra['extra']['columns'] }}  gap-x-3 space-y-4 mt-4 py-4">
                                @foreach($extra['extra']['columns_sections'] as $index => $columns)
                                    <div class="md:text-justify max-w-7xl">
                                        @foreach($columns as $column)
                                                <?php
                                                $html = match ($column['type'])
                                                {
                                                    "header" => view('templates.hero._header', ['heading' => $column['data']['heading'], "subheading" => $column['data']['subheading']])->render(),
                                                    "video" => view('templates.embeded._video_iframe', ["autoplay" =>  $column['data']['autoplay'] ??  false, 'videoUri' => $column['data']['video_path']])->render(),
                                                    "image" => view('templates.hero._image', ['image' => $column['data']['image'],'title' => $page->name ])->render(),
                                                    "booking_form" => view('templates.hero._site')->render(),
                                                    "text_area" => view('templates.hero._text_area', ['html' => $column['data']['body']])->render(),
                                                    "slider" => view('templates.hero._slider', ['sliders' => $column['data']['body'],'page' => $page])->render(),
                                                    "default" => null,
                                                };
                                                ?>
                                            {{ str($html)->toHtmlString() }}
                                        @endforeach
                                    </div>

                                @endforeach

                            </div>
                        </div>
                    </div>

                @endforeach


            @endif


</x-guest-layout>
