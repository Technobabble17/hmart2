<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreItemRequest;
use App\Http\Requests\UpdateItemRequest;
use App\Models\Item;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Scopes\OwnedByUser;
use Illuminate\Database\Eloquent\Builder;

abstract class AbstractItemController extends Controller  //can't load class directly only a child "abstract"
{
    protected Builder $itemBuilder;

    public function __construct(User $user)
    {
        $this->middleware(function ($request, $next) {
            $this->itemBuilder = $this->getItemBuilder();
            return $next($request);
        });
    }

    abstract protected function getItemBuilder() : Builder;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = $this->itemBuilder->get();
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
    public function show($item)
    {
        $item = $this->itemBuilder->findOrFail($item);
        return view('items.show', ["item" => $item]);
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\item  $item
     * @return \Illuminate\Http\Response
     */
    public function edit($item)
    {
        $item = $this->itemBuilder->findOrFail($item);
        return view('items.edit', ["item" => $item]); //this passes in all the information from the item Model.   this will show the blade for editing, but how to specify which item to update
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\item  $item
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateItemRequest $request, $item)
    {
        $item = $this->itemBuilder->findOrFail($item);
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
    public function destroy($item)
    {
        $item = $this->itemBuilder->findOrFail($item);
        $item->delete();
        return redirect(route('items.index'));
    }
    public function search(Request $request)
    {
        $items = Item::search($request->search);

        return view('items.search')->with('items', $items);
    }
}
