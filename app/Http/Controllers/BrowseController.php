<?php

namespace App\Http\Controllers;

use App\Models\Item;
use Illuminate\Support\Facades\Auth;
use App\Scopes\OwnedByUser;

class BrowseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = Item::withoutGlobalScope(OwnedByUser::class)->browse()->get();     //stores a query builder for the model in the variable/$itemsQuery  // browse() is calling the Item scopeBrowse()
        return view('items.index', ["items" => $items]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($item)
    {
        $item = Item::withoutGlobalScope(OwnedByUser::class)->findOrFail($item);
        return view('items.show', ["item" => $item]);
    }

}
