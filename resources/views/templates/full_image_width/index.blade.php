<section class="">
    <img
        loading="lazy"
        class="w-full object-cover"

        src="{{  \Illuminate\Support\Facades\Storage::url($section->extra['image']) }}"
        alt="{{ settings('site_name') }}"
    >
</section>
