<?php

namespace App\Http\Controllers;

use App\Models\Item;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Auth;

class BrowseController extends AbstractItemController
{

    protected function getItemBuilder() : Builder
    {
        dd(Auth::id());
        dd(Item::browse(Auth::id()));
        return Item::browse();
    }

    // public function search(Request $request)
    // {
    //     $items = Item::search($request->search)->query(function($builder){
    //         $builder->withoutGlobalScope(OwnedByUser::class);
    //     })->get();
    //     // dd($items);

    //     return view('items.search', ["items" => $items]);
    // }

}
