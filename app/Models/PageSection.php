<?php

namespace App\Models;

use App\Utils\Enums\SectionEnum;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PageSection extends Model
{
    use HasFactory;

    protected $casts = [
        'type' => SectionEnum::class,
        'extra' => 'json',
    ];

}
