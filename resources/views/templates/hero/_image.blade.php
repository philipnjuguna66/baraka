<div class=" dark:text-white">

    <img
        loading="lazy"
        class="object-cover"
        alt="{{ $title ?? null }}"
        src="{{ \Illuminate\Support\Facades\Storage::url($image) }}">
</div>
