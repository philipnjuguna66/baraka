<x-guest-layout>
    @section('title', str($post?->meta_title)->headline()->title())
    @section('description', $post?->meta_description)
    @section('cononical', $post?->cononical)
    @push('metas')
        @meta("url",  route('permalink.show', $post->link->slug))
        @meta("type", "Article")
        @meta("title", $post?->meta_title)
        @meta("description", $post?->meta_description)
        @meta("image", asset(Illuminate\Support\Facades\Storage::url($post?->featured_image)))
    @endpush


    <section class="mt-28 py-4 md:mx-auto max-w-7xl md:w-4/5 px-8 prose-md ">
        <div class="mt-4">
            <div class="bg-transparent px-6 pt-4 sm:pt-12 lg:px-8 flex justify-center max-w-2xl">
                <h1 class="font-bold text-2xl text-center">{{ $post->title }}</h1>
            </div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-2">
            <div class="col-span-2 ">
                <img src="{{ \Illuminate\Support\Facades\Storage::url($post?->featured_image) }}"
                     class="w-[800px] h-[500px] rounded-md object-contain aspect-ratio"
                     alt="{{ $post?->meta_title }}"
                     loading="lazy"
                >
                <article class="prose mt-12 max-w-7xl justify-center align-middle">

                        {{ str($post?->body)->toHtmlString() }}

                </article>
            </div>
            <div class="col-span-1">

                <div class="">
                    <livewire:contact.book-site-visit/>
                </div>

                    <div class="grid grid-cols-1  gap-2 my-12">
                        <h3 class="font-bold text-xl pt-8">Latest projects</h3>
                        <livewire:project.website.similar-project  :grid="1" class="shadow-md rounded-md px-4 mt-5 bg-gray-100 py-8 border-b-4 border-primary-600 border-b-primary-600"/>
                    </div>


            </div>
        </div>

    </section>


</x-guest-layout>
