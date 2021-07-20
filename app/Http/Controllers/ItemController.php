<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreImageRequest;
use App\Http\Requests\StoreItemRequest;
use App\Http\Requests\UpdateItemRequest;
use App\Models\Item;
use App\Models\Image;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;



class ItemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = Item::all();
        return view('items.index', ["items" => $items]);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('items.create');
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreItemRequest $request)
    {
        $user = \App\Models\User::find(Auth::user()->id);
        $data = $request->except("_token");
        $item = $user->items()->create($data);
        return redirect(route('items.show', ['item'=> $item->id]));
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Item  $Item
     * @return \Illuminate\Http\Response
     */
    public function show(Item $item)
    {
        return view('items.show', ["item" => $item]);
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\item  $item
     * @return \Illuminate\Http\Response
     */
    public function edit(Item $item)
    {
        return view('items.edit', ["item" => $item]); //this passes in all the information from the item Model.   this will show the blade for editing, but how to specify which item to update
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\item  $item
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateItemRequest $request, Item $item)
    {
        $data = $request->except('_token', '_method');
        $item->update($data);
        return redirect(route('items.show', ['item'=> $item->id]));
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\item  $item
     * @return \Illuminate\Http\Response
     */
    public function destroy(Item $item)
    {
        $item->delete();
        return redirect(route('items.index'));
    }
}
