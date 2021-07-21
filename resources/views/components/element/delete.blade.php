<form class="inline float-right" action="{{ route($routeName,[$routeKey => $id]) }}" method="POST">
    <input class="rounded-lg text-white text-2xl col-sm-3 col-form-label cursor-pointer p-2 px-8 bg-blue-600 hover:bg-red-600 transition duration-200 ease-in-out" type="submit" value="{{$label}}" />
    @method('delete')
    @csrf
</form>

