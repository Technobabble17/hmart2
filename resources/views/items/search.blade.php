<x-app-layout>
    <x-slot name="header">
        @if (Auth::check())  {{--if Authenticated / else--}}
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Items') }}
        </h2>
        <a class="text-blue-600 border-b-2 border-transparent hover:border-blue-600 transition duration-300 ease-in-out" href="{{ route('items.create') }}">+ New Item</a>
        @else
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Browse') }}
        </h2>
        @endif
        <div class="flex flex-row-reverse col-md-4">
            <form action="{{ route('items.search') }}" autocomplete="off" name="search" action="search" method="get">
                <div class="form-group">
                    <input type="search" name="search" class="form-control py-1 pt-2">
                    <button type="submit" class="rounded-lg text-white text-2xl col-sm-3 col-form-label cursor-pointer py-1 px-4 bg-blue-600 hover:bg-green-600 transition duration-200 ease-in-out">Search!</button>
                </div>
            </form>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <?php foreach ($items as $item) : ?>
                <div class="mb-8 bg-white shadow-2xl sm:rounded-lg">
                    <article class="p-6 bg-white border-b border-gray-200 hover:bg-gray-200 hover:shadow-inner transition duration-200 ease-in-out">
                        <h2 class="text-2xl bold pb-4">{{ $item->title }} </h2>
                        <p>{{ $item->description }}</p>
                        @if (Auth::check() && Auth::user()->id === $item->user_id)
                        <a class="text-blue-600 border-b-2 border-transparent hover:border-blue-600 transition duration-300 ease-in-out" href="{{ route('items.show',['item'=> $item->id]) }}">View</a>
                        <a class="text-blue-600 border-b-2 border-transparent hover:border-blue-600 transition duration-300 ease-in-out" href="{{ route('items.edit',['item'=> $item->id]) }}">| Edit Item</a>
                        <x-element.delete class="float-right" route-key="item" label="Delete Item" route-name="items.destroy" :id="$item->id"/>
                        @else
                        <a class="text-blue-600 border-b-2 border-transparent hover:border-blue-600 transition duration-300 ease-in-out" href="{{ route('browse.show',['browse'=> $item->id]) }}">View</a>
                        @endif
                    </article>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</x-app-layout>
