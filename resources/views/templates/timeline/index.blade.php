<div  class=" mt-0 @if(isset($section->extra['bg_white']) && $section->extra['bg_white']) bg-white @endif">
    @if($section->extra['type'] == "horizontal")
        @include('templates.timeline.horizontal')
    @endif
    @if($section->extra['type'] == "vertical")
        @include('templates.timeline.vertical')
    @endif
</div>
