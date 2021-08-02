<x-app-layout>
    <x-slot name="header">

        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Items') }}
        </h2>

        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Browse') }}
        </h2>

        <div class="flex flex-row-reverse col-md-4">
                <div class="form-group">
                    <input type="search" name="search" class="form-control py-1 pt-2">
                    <button type="submit" class="rounded-lg text-white text-2xl col-sm-3 col-form-label cursor-pointer py-1 px-4 bg-blue-600 hover:bg-green-600 transition duration-200 ease-in-out">Search!</button>
                </div>
            </form>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

        </div>
    </div>
</x-app-layout>
