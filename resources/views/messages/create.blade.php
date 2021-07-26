<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Send Message to ' . $item) }}
        </h2>
    </x-slot>
    <form method="post" action="{{ route('messages.store') }}">
        {{ csrf_field() }}
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            {{-- <h2 class="text-2xl bold pb-4">{{ $item->title }}</h2> --}}











            {{--

    now the buyer is the MessageOwner
    the ItemOwner sees all messages where OwnedByUser/Item status = pending
    the buyer sees all messages where message=OwnedbyUser



    display     Item title
    Item price
    Owner/seller name

    google maps pickup location

    comment/actual messages text

    save Message = setItem status to pending





    --}}




            {{-- <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
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
                <x-element.save/>
            </div> --}}


        </div>
    </form>



</x-app-layout>
