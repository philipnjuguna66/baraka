<?php

namespace App\Http\Controllers;

use App\Models\Permalink;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function __invoke(Permalink $permalink)
    {

        $page = $permalink->linkable;


        return view($permalink->type->template(), [
            'page' => $page,
            'post' => $page,
        ]);
    }
}
