<?php

namespace App\Utils\Contracts;

interface HasPermalink
{
    public function getTitle(): string;

    public function getContent(): string;

    public function getMetaTitle(): string;

    public function getMetaDescription(): string;
}
