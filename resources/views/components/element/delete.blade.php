<form class=" inline" action="{{ route($routeName,[$routeKey => $id]) }}" method="POST">
    <input class="cursor-pointer bg-transparent text-red-600 border-b-2 border-transparent hover:border-red-600 transition duration-300 ease-in-out" type="submit" value="{{$label}}" />
    @method('delete')
    @csrf
</form>

