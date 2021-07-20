<?php

namespace App\Http\Controllers;

use App\Models\Item;
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
        $items = Item::withoutGlobalScope(OwnedByUser::class)->get();
        //$posts = Post::all();
        return view('browse.index', ["items" => $items]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $item = Item::withoutGlobalScope(OwnedByUser::class)->findOrFail($id);
        return view('browse.show', ["item" => $item]);
    }

}
