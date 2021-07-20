<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Image Library') }} {{--i18n https://laravel.com/docs/8.x/localization --}}
        </h2>
        <a class="text-blue-600 border-b-2 border-transparent hover:border-blue-600 transition duration-300 ease-in-out" href="{{ route('images.create') }}">+ New Image</a>
    </x-slot>
    <form method="post" action="{{ route('images.store') }}" enctype="multipart/form-data">
        {{ csrf_field() }}
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

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
            <x-element.item-dropdown title="Choose item:" field-name="item_id"/>
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 pb-64">
                <input class="rounded-lg text-white text-2xl col-sm-3 col-form-label cursor-pointer p-2 px-8 bg-blue-600 hover:bg-green-600 transition duration-200 ease-in-out" type="submit" value="Save"></input>
            </div>
    </form>
</x-app-layout>
