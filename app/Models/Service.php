<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\MorphOne;

class Service extends Model
{
    use HasFactory;

    const CACHE_KEY = 'service';

    protected $with = [
        'link',
    ];

    public function link() : MorphOne
    {
        return $this->morphOne(Permalink::class, 'linkable');
    }

    public function sections(): HasMany
    {
        return $this->hasMany(ServiceSection::class, 'service_id', 'id');
    }
    public function categories() : BelongsToMany
    {
        return $this->belongsToMany(Category::class)->using(ServiceCategory::class)->withTimestamps();
    }
}
