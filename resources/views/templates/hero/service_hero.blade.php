<div class="py-24 sm:py-32 bg-gray-50">
    <div class="mx-auto max-w-7xl px-6 lg:px-8">
        <div class="mx-auto max-w-7xl sm:text-center">

            <h1 class="text-2xl md:text-5xl font-bold tracking-tight"> {{ $section->extra['heading'] }}</h1>

        </div>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-12 space-y-4 mt-4 py-4">

            <div>
                <div class="py-2 dark:text-white">
                 {{ $section->extra['subheading'] }}
                </div>


                @foreach($section->extra['sections'] as $index => $content)
                    <div class="prose shadow-md rounded-md px-4 mt-5 bg-gray-100 py-8 border-b-4 border-primary-600 border-b-primary-600">

                        {{ str($content['content'])->toHtmlString() }}

                    </div>
                @endforeach

                @if(isset($section->extra['has_contact_form']) && $section->extra['has_contact_form'])
                    <div class="shadow-md rounded-md px-4 mt-5 bg-gray-100 py-8 border-b-4 border-primary-600 border-b-primary-600">
                        <livewire:contact.book-site-visit/>
                    </div>
                @endif


            </div>

            <div class="filter bg-blend-multiply  mt-3 ">

                <img src="{{ \Illuminate\Support\Facades\Storage::url($section->extra['image']) }}" class="object-cover py-20">
            </div>


        </div>
    </div>
</div>
