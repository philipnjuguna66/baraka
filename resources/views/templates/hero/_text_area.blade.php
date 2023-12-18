<div class="">

    <div class="prose-md  md:text-justify @if($hasBorder) shadow-md rounded-md px-4 mt-5 bg-gray-100 py-8 border-b-4 border-primary-600 border-b-primary-600 @endif">
        {{ str($html)->trim(' ')->toHtmlString() }}
    </div>


</div>
