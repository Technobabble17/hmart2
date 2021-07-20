<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight"> {{ __('Account Info') }} </h2>
        {{-- <a class="text-blue-600 border-b-2 border-transparent hover:border-blue-600 transition duration-300 ease-in-out" href="{{ route('user.edit') }}">Edit Account Details</a> --}}
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="mb-8 bg-white overflow-hidden shadow-2xl sm:rounded-lg">
                <article class="p-6 bg-gray-300 border-b border-gray-200">
                    <h2 class="text-2xl bold pb-4">{{ auth()->user()->name }}</h2>
                    <p>{{ auth()->user()->about }}</p>
                    <p>{{ auth()->user()->email }}</p>
                    <p>{{ auth()->user()->phone }}</p>
                    <p>{{ auth()->user()->paypal }}</p>
                    <p>{{ auth()->user()->venmo }}</p><br>
                    {{-- <img src="{{Storage::disk('public')->url($user->image->path);}}" alt="Image" class="max-h-32"/> --}}
                    {{--put  Delete here--}}
                </article>
            </div>
        </div>
    </div>

</x-app-layout>
