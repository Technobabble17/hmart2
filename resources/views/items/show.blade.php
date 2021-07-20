<x-app-layout>
    <x-slot name="header">
        @if (Auth::check())
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Item') }}
        </h2>
        <a class="text-blue-600 border-b-2 border-transparent hover:border-blue-600 transition duration-300 ease-in-out" href="{{ route('items.create') }}">+ New Item</a>
        @else
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Public Items') }}
        </h2>
        @endif
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="mb-8 bg-white overflow-hidden shadow-2xl sm:rounded-lg">
                <article class="p-6 bg-gray-300 border-b border-gray-200">
                    <h2 class="text-2xl bold pb-4">{{ $item->title }}</h2>
                    <p>{{ $item->description }}</p>
                    <p>${{ $item->price }} Pennies</p>
                </article>
                {{--I had a foreach loop here to show all images that would be assigned to an item--}}
                <div class="mb-8 bg-white shadow-2xl sm:rounded-lg">
                    <article class="flex flex-auto p-6 bg-white border-b border-gray-200 hover:bg-gray-200 hover:shadow-inner transition duration-200 ease-in-out">
                        @foreach ($item->images as $image ) {{--laravel magic is looking for images variable, if not how about function "is it a relationship function--yes images() in model--}}
                            <div class="block p-8 ">
                                <img src="{{$image->url}}" alt="Image" class="max-h-44 p-0 transform transition duration-300 hover:scale-150"/>
                                <x-element.delete class="text-center" route-key="image" label="Delete Image" route-name="images.destroy" :id="$image->id"/>
                            </div>
                        @endforeach
                    </article>
                    <form class="pt-40" method="post" action="{{ route('items.images.store', ['item' => $item->id]) }}" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                            <label for="title" class="col-sm-3 col-form-label">Title</label>
                            <div class="p-6 bg-white border-b border-gray-200">
                                <textarea name="title" type="text" class="form-control" placeholder="Title">{{old('title')}}</textarea>
                                @error('title') <p style="color:red"> {{ $message }}</p>  @enderror
                            </div>
                        </div>
                        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                            <label for="content" class="col-sm-3 col-form-label">Description</label>
                            <div class="p-6 bg-white border-b border-gray-200">
                                <textarea name="description" type="text" class="form-control" placeholder="Description">{{old('description')}}</textarea>
                                @error('description') <p style="color:red"> {{ $message }}</p>  @enderror
                            </div>

                            <label for="file" class="col-sm-3 col-form-label">Image</label>
                            <div class="p-6 bg-white border-b border-gray-200">
                                <input name="file" type="file" class="form-control"></input>
                                @error('file') <p style="color:red"> {{ $message }}</p>  @enderror
                            </div>
                        </div>
                        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 pb-64">
                            <input class="rounded-lg text-white text-2xl col-sm-3 col-form-label cursor-pointer p-2 px-8 bg-blue-600 hover:bg-green-600 transition duration-200 ease-in-out" type="submit" value="Save"></input>
                        </div>
                    </form>
                    <x-element.delete route-key="item" label="Delete Item" route-name="items.destroy" :id="$item->id"/> {{-- the : says we are passing native php--}}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
