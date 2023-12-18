<div class="  @if($section->extra['bg_white']  ) bg-white @endif py-24 mt-4">
    <div class="mx-auto max-w-7xl px-6 lg:px-8">
        <div class="mx-auto max-w-5xl text-center">
            <h1 class="text-2xl  md:text-5xl font-bold tracking-tight"> {{ str($section->extra['heading'])->toHtmlString() }}</h1>
            <p class="py-3 text-lg leading-8 text-gray-600">{{ str($section->extra['subheading'])->toHtmlString() }}.</p>

        </div>
        <livewire:project.website.list-project :take="$section->extra['count']"/>


        @if(isset($section->extra['project_link']) && ! is_null($section->extra['project_link']))

            <div class=" ">
                <div class="px-6 py-2 sm:px-6 sm:py-1 lg:px-8">
                    <div class="md:mx-auto max-w-2xl text-center">
                        <div class="mt-10 flex items-center justify-center gap-x-6">
                            <a
                                wire:navigate
                                href="{{ route('permalink.show', $section->extra['project_link']) }}"
                                class="button">
                                View more Projects <span aria-hidden="true">→</span></a>
                        </div>
                    </div>
                </div>
            </div>

        @endif

    </div>
</div>





