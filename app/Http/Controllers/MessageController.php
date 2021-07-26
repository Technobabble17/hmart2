<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreItemRequest;
use App\Http\Requests\StoreMessageRequest;
use App\Http\Requests\UpdateItemRequest;
use App\Http\Requests\UpdateMessageRequest;
use App\Models\Item;
use App\Models\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;



class MessageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $messages = Message::all();
        return view('messages.index', ["messages" => $messages]);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Item $item)
    {
        $test = 'blahtest';
        // return redirect(route('messages.create', ['item'=> $item]));
        // return view('messages.create', ['item'=> $item]);
        return View::make('messages.create')->with($item);
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreMessageRequest $request, Item $item)
    {
        // $message = new Message;
        // $message->item_id = $item->id;
        // $message->seller_id = $item->user_id;
        // $message->buyer_id = \App\Models\User::find(Auth::user()->id);
        // $message->content = $request->get('content');
        // $message->save();
        // return redirect(route('items.show', ['item' => $item->id]));

    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Item  $Item
     * @return \Illuminate\Http\Response
     */
    public function show(Message $message)
    {
        // return view('messages.show', ["message" => $message]);
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\item  $item
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {
        //
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\item  $item
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateMessageRequest $request, Message $message)
    {
        // should we call update to add a new comment/content chat?
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\item  $item
     * @return \Illuminate\Http\Response
     */
    public function destroy(Message $message)
    {
        $message->delete();
        return redirect(route('messages.index'));
    }
    public function search(Request $request)
    {
        // $items = Item::search('Hat')->get();
        // dd($items);
        // return view('items.index', ['items' => $items]);
    }
}
