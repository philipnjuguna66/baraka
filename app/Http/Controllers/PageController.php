<?php

namespace App\Http\Controllers;

use App\Models\Permalink;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function __invoke(Permalink $permalink)
    {

        $page = $permalink->linkable;

        if (! filled($page->id))
        {
            return  redirect()->route('home.page');
        }


        return view($permalink->type->template(), [
            'page' => $page,
            'post' => $page,
        ]);
    }
}
