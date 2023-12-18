<div class="">

    <div class=" @if($hasBorder) rounded-md  bg-gray-100 py-8 border-b-4 border-primary-600 border-b-primary-600 @endif">
        {{ str($html)->trim(' ')->toHtmlString() }}
    </div>


</div>
