<div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
    <label for="item" class="col-sm-3 col-form-label">{{$title}}</label>
    <div class="p-6 bg-white border-b border-gray-200">
        <select name="{{$fieldName}}">
            @foreach ( $items as $item )
            <option value="{{$item->id}}">{{$item->title}}</option>
            @endforeach
        </select>
        @error('item') <p style="color:red">{{ $message }}</p>  @enderror
    </div>
