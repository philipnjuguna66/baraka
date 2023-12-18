<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="h-full">
    <head>

        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <link rel="shortcut icon" href="{{\Illuminate\Support\Facades\Storage::url($options?->favicon) }}">
        <title class="capitalize">@yield('title',config('app.name')) - {{ $options?->name  }}</title>
        <meta name="description" content="@yield('description', $options?->meta_description)">
        <link rel="canonical" href="@yield('cononical', url()->current())" />

        @stack('metas')

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@1,200&display=swap" rel="stylesheet">


        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        @livewireStyles
       {{-- {!! app(\App\Settings\ScriptSettings::class)?->header !!}--}}
    </head>
    <body class="h-full bg-gray-100 text-gray-900 ">
   {{-- {!! app(\App\Settings\ScriptSettings::class)?->body !!}--}}

    @include('layouts.partials.navigation',['options' => $options])
        <div class="font-sans text-gray-900 ">
            {{ $slot }}

            @livewire('notifications')

        </div>

    @include('layouts.partials.slider_over')
    @livewireScripts

    @include('layouts.partials.footer')
    @stack('scripts')
    {{--{!! app(\App\Settings\ScriptSettings::class)?->footer !!}--}}
    </body>
</html>
