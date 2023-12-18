<?php

namespace App\Models;

use App\Utils\Concerns\InteractsWithPermerlinks;
use App\Utils\Contracts\HasPermalink;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Page extends Model implements HasPermalink
{
    use InteractsWithPermerlinks;

    use HasFactory;

    const CACHE_KEY = 'page';

    protected $with = [
        'link',
    ];

    public function link()
    {
        return $this->morphOne(Permalink::class, 'linkable');
    }

    public function sections()
    {
        return $this->hasMany(PageSection::class, 'page_id', 'id');
    }
}
