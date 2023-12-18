<?php

namespace App\Utils\Enums;

enum PermerlinkTypeEnums : string
{
    case  PAGE = "page";

    case PROJECT= "project";

    case POST = "post";


    public function template()
    {
        return match ($this) {
            'default' => abort(404),
            static::PAGE => "pages.single",
            static::POST => "pages.post.single",
            static::PROJECT => "pages.property.single",


        };
    }
}
