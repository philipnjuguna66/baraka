<?php

namespace App\Utils\Enums;

enum ProjectStatusEnum: string
{
    case FOR_SALE = 'for sale';

    case SOLD_OUT = 'sold out';
    case DRAFT = 'draft';
}
