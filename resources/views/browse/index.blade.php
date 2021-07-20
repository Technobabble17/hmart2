<x-app-layout>
    <x-slot name="header">
        @if (Auth::check())
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Items') }}
        </h2>
        <a class="text-blue-600 border-b-2 border-transparent hover:border-blue-600 transition duration-300 ease-in-out" href="{{ route('items.create') }}">+ New Item</a>
        @else
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Browses') }}
        </h2>
        @endif
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <?php foreach ($items as $item) : ?>
                <div class="mb-8 bg-white shadow-2xl sm:rounded-lg">
                    <article class="p-6 bg-white border-b border-gray-200 hover:bg-gray-200 hover:shadow-inner transition duration-200 ease-in-out">
                        <h2 class="text-2xl bold pb-4">{{ $item->title }} </h2>
                        <p>{{ $item->description }}</p>
                        <a class="text-blue-600 border-b-2 border-transparent hover:border-blue-600 transition duration-300 ease-in-out" href="{{ route('items.show',['item'=> $item->id]) }}">View</a>
                        @if (Auth::check())
                        <a class="text-blue-600 border-b-2 border-transparent hover:border-blue-600 transition duration-300 ease-in-out" href="{{ route('items.edit',['item'=> $item->id]) }}">| Edit Item</a> |
                        <form class=" inline" action="{{ route('items.destroy',['item'=> $item->id]) }}" method="POST">
                            <input class="cursor-pointer bg-transparent text-red-600 border-b-2 border-transparent hover:border-red-600 transition duration-300 ease-in-out" type="submit" value="Delete Item" />
                            @method('delete')
                            @csrf
                        </form>
                        @endif
                    </article>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</x-app-layout>
