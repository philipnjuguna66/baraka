<?php

namespace App\Utils\Enums;

enum PermerlinkTypeEnums : string
{
    case  PAGE = "page";

    case POST = "post";
    case SERVICE = "service";


    public function template()
    {
        return match ($this) {
            'default' => abort(404),
            static::PAGE => "pages.single",
            static::POST => "pages.post.single",
            static::SERVICE => "pages.single",


        };
    }
}
