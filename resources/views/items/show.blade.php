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
        <div class="max-w-min mx-auto sm:px-6 lg:px-8">
            <div class="mb-8 bg-white overflow-hidden shadow-2xl sm:rounded-lg">
                <article class="p-6 bg-gray-300 border-b border-gray-200">
                    <h2 class="text-2xl bold pb-4">{{ $item->title }}</h2>
                    <p>{{ $item->description }}</p><br>
                    <p>{{ $item->price }} USD</p>
                </article>
                <div class="mb-8 bg-white shadow-2xl sm:rounded-lg">
                    <article class="mb-8 grid justify-items-center p-6 bg-white border-b border-gray-200 hover:bg-gray-200 hover:shadow-inner transition duration-200 ease-in-out">
                        @foreach ($item->images as $image )
                            <div class="grid justify-items-center p-8" >
                                @if (Auth::check() && Auth::user()->id === $item->user_id)

                                <div class="bg-gray-400" style="display:none" id="ImageData">
                                    <h2 class="text-2xl bold pb-4">{{ $image->title }} </h2>
                                    <h2 class="text-xl bold pb-4">{{ $image->description }} </h2>
                                </div>
                                <img  src="{{$image->url}}" alt="Image" class="max-h-64 p-0 transform transition duration-300 hover:scale-150" onclick="ShowData()"/>
                                <x-element.delete class="text-center" route-key="image" label="Delete Image" route-name="images.destroy" :id="$image->id"/>
                                @else
                                <img src="{{$image->url}}" alt="Image" class="max-h-64 p-0 transform transition duration-300 hover:scale-150" onclick="ShowData()"/>
                                @endif
                            </div>
                        @endforeach
                        <iframe src="https://www.google.com/maps/embed/v1/place?key=AIzaSyCAamlGnq7plQ6sDUpO0U-kXwLO6UntYUQ&q=Space+Needle,Seattle+WA" frameborder="0" height="500" width="600"></iframe>
                    </article>
                    @if (Auth::check() && Auth::user()->id === $item->user_id)
                    <button class="rounded-lg text-white text-2xl col-sm-3 col-form-label cursor-pointer p-2 px-8 bg-blue-600 hover:bg-green-600 transition duration-200 ease-in-out" onclick="myFunction()">+ Add Image</button>
                    <x-element.back/>
                    <x-element.delete class="float-right" route-key="item" label="Delete Item" route-name="items.destroy" :id="$item->id"/>
                    @else
                    <x-element.back/>
                    <a class="animate-pulse rounded-lg text-white text-2xl col-sm-3 col-form-label cursor-pointer p-2 px-8 bg-blue-600 hover:bg-green-600 transition duration-200 ease-in-out" href="{{ route('messages.create', ['item'=> $item]) }}">Purchase</a>
                    @endif
                    <div style="display:none" id="myDIV"> {{--myFunction--}}
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
                    </div>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>


<script>
    function myFunction() {
        var x = document.getElementById("myDIV");
        if (x.style.display === "none") {
        x.style.display = "block";
        } else {
        x.style.display = "none";
        }
    }
</script>
<script>
    function ShowData() {
        var x = document.getElementById("ImageData");
        if (x.style.display === "none") {
        x.style.display = "block";
        } else {
        x.style.display = "none";
        }
    }
</script>
