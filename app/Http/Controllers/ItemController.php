<?php

namespace App\Http\Controllers;

use App\Models\Item;
use Illuminate\Database\Eloquent\Builder;

class ItemController extends AbstractItemController
{
    protected function getItemBuilder() : Builder
    {
        return Item::items();
    }
}
