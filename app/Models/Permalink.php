<?php

namespace App\Models;

use App\Utils\Enums\PermerlinkTypeEnums;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Permalink extends Model
{
    use HasFactory;

    protected $casts = [
        'type' => PermerlinkTypeEnums::class
    ];
    public function linkable()
    {
        return $this->morphTo();
    }

}
