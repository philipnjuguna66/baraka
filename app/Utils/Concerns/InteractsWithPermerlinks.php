<?php

namespace App\Utils\Concerns;

trait InteractsWithPermerlinks
{

    public function getTitle(): string
    {
        return str($this->title)->title();
    }

    public function getContent(): string
    {
        return $this->body;
    }

    public function getMetaTitle(): string
    {
        return str($this->meta_title)->headline()->value();
    }

    public function getMetaDescription(): string
    {
        return str($this->meta_description)->ucfirst()->value();
    }
}
