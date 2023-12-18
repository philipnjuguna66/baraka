<?php

namespace App\Models;

use App\Utils\Enums\SectionEnum;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ServiceSection extends Model
{
    use HasFactory;
    protected $casts = [
        'type' => SectionEnum::class,
        'extra' => 'json',
    ];
}
