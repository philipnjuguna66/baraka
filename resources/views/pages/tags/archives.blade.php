<x-guest-layout>
    @section('title', "TAG: " . $tag->name . ": projects for Sale")
    <section class="mt-8  mt-4 py-8     bg-white">
        <div class="mx-auto md:w-4/5">
            <div class="md:mx-auto max-w-7xl">
                <div class="mx-auto max-w-2xl text-center">
                    <h1 class="text-3xl font-bold tracking-tight sm:text-4xl"> {{ $tag->name  }} </h1>
                </div>

                <livewire:blog.tag-posts :tag="$tag"/>

            </div>
        </div>

    </section>




</x-guest-layout>
