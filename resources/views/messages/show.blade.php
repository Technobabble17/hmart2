<x-app-layout>
    <x-slot name="header">
        @if (Auth::check())
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Message') }}
        </h2>
        @endif
    </x-slot>
    <div class="py-12">
        <div class="max-w-min mx-auto sm:px-6 lg:px-8">
            <div class="mb-8 bg-white overflow-hidden shadow-2xl sm:rounded-lg">
                <article class="p-6 bg-gray-300 border-b border-gray-200">
                    <h2 class="text-2xl bold pb-4">{{ $message->content }}</h2>
                </article>
                <div class="mb-8 bg-white shadow-2xl sm:rounded-lg">
                    <article class="mb-8 grid justify-items-center p-6 bg-white border-b border-gray-200 hover:bg-gray-200 hover:shadow-inner transition duration-200 ease-in-out">
                        @foreach ($message->comments as $comment )
                            <div class="grid justify-items-center p-8" >
                                <div class="bg-gray-400" style="display:none" id="ImageData">
                                    <h2 class="text-2xl bold pb-4">{{ $comment->comment }} </h2>
                                </div>
                                <x-element.delete class="text-center" route-key="comment" label="Delete Comment" route-name="comments.destroy" :id="$comment->id"/>
                            </div>
                        @endforeach
                        <iframe src="https://www.google.com/maps/embed/v1/place?key=AIzaSyCAamlGnq7plQ6sDUpO0U-kXwLO6UntYUQ&q=Space+Needle,Seattle+WA" frameborder="0" height="500" width="600"></iframe>
                    </article>
                    @if (Auth::check() && Auth::user()->id === $message->user_id or $message->seller_id)
                    <button class="rounded-lg text-white text-2xl col-sm-3 col-form-label cursor-pointer p-2 px-8 bg-blue-600 hover:bg-green-600 transition duration-200 ease-in-out" onclick="myFunction()">+ Add New Message</button>
                    <x-element.back/>
                    <x-element.delete class="float-right" route-key="message" label="Delete Message" route-name="messages.destroy" :id="$message->id"/>
                    @else
                    <x-element.back/>
                    <a class="animate-pulse rounded-lg text-white text-2xl col-sm-3 col-form-label cursor-pointer p-2 px-8 bg-blue-600 hover:bg-green-600 transition duration-200 ease-in-out" href="{{ route('messages.create', ['item'=> $item->id]) }}">Purchase</a>
                    @endif
                    <div>
                        <form class="pt-40" method="post" action="{{ route('messages.comments.store', ['message' => $message->id]) }}">
                            {{ csrf_field() }}
                            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                                <label for="comment" class="col-sm-3 col-form-label">New Chat Message</label>
                                <div class="p-6 bg-white border-b border-gray-200">
                                    <textarea name="comment" type="text" class="form-control" placeholder="comment">{{old('comment')}}</textarea>
                                    @error('comment') <p style="color:red"> {{ $message }}</p>  @enderror
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
