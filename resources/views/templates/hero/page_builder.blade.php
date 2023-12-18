<div class="bg-gray-50 md:py-12  @if($section->extra['bg_white'] )  bg-white @endif"
     @if(isset($section->extra['bg_image']))
         style=" background-image: url('{{ url(Storage::url($section->extra['bg_image'])) }}');
     background-position: center center; background-size: cover; background-repeat: no-repeat "
     @endif

>
    <div class="mx-auto w-4/5 max-w-7xl  lg:px-8">
        <div class="mx-auto max-w-5xl text-center">
            <h3 class="text-2xl font-bold tracking-tight sm:text-6xl">{{ $section->extra['heading'] ?? null }}</h3>
            <p class="mt-6 text-lg leading-8 text-gray-600 prose">
                {!!  $section->extra['sub_heading'] ?? null!!}
            </p>
        </div>

        <div class="  grid grid-cols-1 md:grid-cols-{{ $section->extra['columns'] }}  gap-x-1 space-y-4 mt-4 py-4">
            @foreach($section->extra['columns_sections'] as $index => $columns)
                <div class="md:text-justify max-w-7xl">
                    @foreach($columns as $column)

                            <?php
                            $html = match ($column['type'])
                            {
                                "header" => view('templates.hero._header', ['heading' => $column['data']['heading'], "subheading" => $column['data']['subheading']])->render(),
                                "video" => view('templates.embeded._video_iframe', ["autoplay" => 0, 'videoUri' => $column['data']['video_path']])->render(),
                                "image" => view('templates.hero._image', ['image' => $column['data']['image'],'title' => $column['data']['title'],'section' => $section])->render(),
                                "booking_form" => view('templates.hero._site')->render(),
                                "text_area" => view('templates.hero._text_area', ['html' => $column['data']['body'], 'hasBorder' => $column['data']['has_border_color'] ?? false])->render(),
                                "slider" => view('templates.hero._slider', ['sliders' => $column['data']['body'],'page' => $page])->render(),
                                "masonary_block" => view('templates.hero.masionary', ['masonrySections' => $column['data'], 'page' => $page])->render(),
                                "header_section" => view("templates.cta.heading",['section' => $column]),
                                "default" => null,
                            };
                            ?>
                    <div class="mx-auto px-8">
                        {{ str($html)->toHtmlString() }}
                    </div>


                    @endforeach
                </div>

            @endforeach

        </div>
    </div>
</div>
