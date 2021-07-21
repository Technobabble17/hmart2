<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight"> {{ __('Edit Account Info') }} </h2>
    </x-slot>

        <form method="post" action="{{ route('account.update', ['user'=> $user->id]) }}">
            {{ csrf_field() }}
            @method('PUT')
            @csrf

            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <label for="firstname" class="col-sm-3 col-form-label">User Name</label>
                <div class="p-6 bg-white border-b border-gray-200">
                    <textarea name="firstname" type="text" class="form-control" placeholder="First Name">{{ $account->name }}</textarea>
                    @error('firstname') <p style="color:red"> {{ $message }}</p>  @enderror
                </div>
            </div>
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <label for="lastname" class="col-sm-3 col-form-label">About</label>
                <div class="p-6 bg-white border-b border-gray-200">
                    <textarea name="lastname" type="text" class="form-control" placeholder="Last Name">{{ $account->about }}</textarea>
                    @error('lastname') <p style="color:red"> {{ $message }}</p>  @enderror
                </div>
            </div>
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <label for="address1" class="col-sm-3 col-form-label">Email</label>
                <div class="p-6 bg-white border-b border-gray-200">
                    <textarea name="address1" type="text" class="form-control" placeholder="Address1">{{ $account->email }}</textarea>
                    @error('address1') <p style="color:red"> {{ $message }}</p>  @enderror
                </div>
            </div>
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <label for="address2" class="col-sm-3 col-form-label">Phone Number</label>
                <div class="p-6 bg-white border-b border-gray-200">
                    <textarea name="address2" type="text" class="form-control" placeholder="Address2">{{ $account->phone }}</textarea>
                    @error('address2') <p style="color:red"> {{ $message }}</p>  @enderror
                </div>
            </div>
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <label for="city" class="col-sm-3 col-form-label">PayPal</label>
                <div class="p-6 bg-white border-b border-gray-200">
                    <textarea name="city" type="text" class="form-control" placeholder="City">{{ $account->paypal }}</textarea>
                    @error('city') <p style="color:red"> {{ $message }}</p>  @enderror
                </div>
            </div>
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <label for="state" class="col-sm-3 col-form-label">Venmo</label>
                <div class="p-6 bg-white border-b border-gray-200">
                    <textarea name="state" type="text" class="form-control" placeholder="AL">{{ $account->venmo }}</textarea>
                    @error('state') <p style="color:red"> {{ $message }}</p>  @enderror
                </div>
            </div>
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <label for="zip" class="col-sm-3 col-form-label">image change placeholder</label>
                <div class="p-6 bg-white border-b border-gray-200">
                    <textarea name="zip" type="text" class="form-control" placeholder="#####">{{ $account->image_id }}</textarea>
                    @error('zip') <p style="color:red"> {{ $message }}</p>  @enderror
                </div>
            </div>

           {{-- <x-element.image-dropdown title="Choose your image:" field-name="image_id"/> --}}
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 pb-64 mt-16">
                <x-element.save/>
            </div>
    </form>

</x-app-layout>
