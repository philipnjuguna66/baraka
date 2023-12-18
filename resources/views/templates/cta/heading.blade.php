
@if(isset($section['data']))
    <div class=" @if($section['data']['bg_white'] )  bg-white @endif px-6 lg:px-8">
        <div class="mx-auto max-w-5xl text-center">
            <h2 class="text-4xl font-bold tracking-tight sm:text-6xl">{{ $section['data']['heading'] }}</h2>
            <p class="mt-6 text-lg leading-8 text-gray-600 prose">
                {!!  $section['data']['content'] !!}
            </p>
        </div>
    </div>
@else
    <div class=" @if($section->extra['bg_white'] )  bg-white @endif px-6 py-24 sm:py-32 lg:px-8">
        <div class="mx-auto max-w-5xl text-center">
            <h2 class="text-4xl font-bold tracking-tight sm:text-6xl">{{ $section->extra['heading'] }}</h2>
            <p class="mt-6 text-lg leading-8 text-gray-600 prose">
                {!!  $section->extra['content'] !!}
            </p>
        </div>
    </div>

@endif


