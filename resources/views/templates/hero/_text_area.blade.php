<div class="py-4">

    <div class=" @if($hasBorder) shadow-sm rounded-md py-3 px-2 bg-gray-100 border-b-4 border-primary-600 border-b-primary-600 @endif">
        {{ str($html)->trim(' ')->toHtmlString() }}
    </div>


</div>
