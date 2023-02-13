@extends('dashboard.layout.app')
@section('content')


    <div style="max-width: 540px;margin:0 auto;">
    <div class="grid grids-1 mx-5 rounded-lg shadow-md border border-gray-400 bg-gray-700 p-4 my-5">
        <div class="my-5 mx-auto w-24 h-24">
            <img src="https://www.cryptonfttrade.com/images/user.png"/>
        </div>

        <form method="POST" action="{{ route('user.update_profile') }}">
            @csrf
            @method('PATCH')

            @if(session()->has('success'))
                <div style="color: #16b616; text-align: center" class="alert alert-success">
                    {{ session()->get('success') }}
                </div>
            @endif
            <div class="w-12/12 my-5">
                <label class="block text-white text-sm font-bold my-2">Fullname</label>
                <input type="text" name="name" value="{{ $user->name }}" class="bg-gray-900 w-full p-2 border-2 border-gray-700 rounded text-gray-100"/>
            </div>
            <div class="w-12/12 my-5">
                <label class="block text-white text-sm font-bold my-2">Email Address</label>
                <input type="email" name="email" value="{{ $user->email }}" class="bg-gray-900 w-full p-2 border-2 border-gray-700 rounded text-gray-100"/>
            </div>
            <div class="w-12/12 my-5">
                <label class="block text-white text-sm font-bold my-2">Phone Number</label>
                <input type="text" name="phone" value="{{ $user->phone }}" class="bg-gray-900 w-full p-2 border-2 border-gray-700 rounded text-gray-100"/>
            </div>
            <div class="w-12/12 my-5">
                <label class="block text-white text-sm font-bold my-2">Wallet Address</label>
                <input type="text" name="wallet_address" value="{{ $user->wallet_address }}" class="bg-gray-900 w-full p-2 border-2 border-gray-700 rounded text-gray-100"/>
            </div>
            <div class="w-12/12 my-10">
                <button type="submit" class="bg-green-400 text-gray-900 font-bold p-3 rounded w-full">Save changes</button>
            </div>

        </form>
        <hr>

        <form method="POST" action="{{ route('user.update_password') }}">
            @if(session()->has('updated'))
                <div style="color: #16b616; text-align: center" class="alert alert-success">
                    {{ session()->get('updated') }}
                </div>
            @endif
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

            <div class="w-12/12 my-5">
                <label class="block text-white text-sm font-bold my-2">Current Password</label>
                <input type="number" name="current_password" class="bg-gray-900 w-full p-2 border-2 border-gray-700 rounded text-gray-100"/>
            </div>
            <div class="w-12/12 my-5">
                <label class="block text-white text-sm font-bold my-2">New Password</label>
                <input type="text" name="new_password"  class="bg-gray-900 w-full p-2 border-2 border-gray-700 rounded text-gray-100"/>
            </div>
            <div class="w-12/12 my-5">
                <label class="block text-white text-sm font-bold my-2">Confirm New Password</label>
                <input type="password" name="new_confirm_password" autocomplete="off" value="" class="bg-gray-900 w-full p-2 border-2 border-gray-700 rounded text-gray-100"/>
            </div>
            <div class="w-12/12 my-10">
                <button type="submit" class="bg-green-400 text-gray-900 font-bold p-3 rounded w-full">Update Password</button>
            </div>

        </form>


    </div>
</div>
@endsection
