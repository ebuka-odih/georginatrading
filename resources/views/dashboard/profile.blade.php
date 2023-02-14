@extends('dashboard.layout.app')
@section('content')

    <div style="max-width: 540px;margin:0 auto;">
    <div class="grid grids-1 mx-5 rounded-lg shadow-md border border-gray-400 bg-gray-700 p-4 my-5">
        <div class="my-5 mx-auto w-24 h-24">
            <img src="https://cdn.imgbin.com/7/15/1/imgbin-computer-icons-user-profile-avatar-french-people-xM6vuY3iWZ6yhbNYaVeX2nvVL.jpg"/>
        </div>

        <ul>
            <li class="border-b border-gray-600 pb-4 my-4 flex justify-between items-center">
                <div class="w-4/12"><span class="bg-gray-800 block rounded-lg px-4 py-2 text-sm text-center text-white font-bold">Fullname</span></div>
                <div class="w-8/12 flex justify-end"><span class="font-normal text-md text-gray-200 break-all">{{ $user->name }}</span></div>
            </li>
            <li class="border-b border-gray-600 pb-4 my-4 flex justify-between items-center">
                <div class="w-4/12"><span class="bg-gray-800 block rounded-lg px-4 py-2 text-sm text-center text-white font-bold">Email Address</span></div>
                <div class="w-8/12 flex justify-end"><span class="font-normal text-md text-gray-200 break-all">{{ $user->email }}</span></div>
            </li>
            <li class="border-b border-gray-600 pb-4 my-4 flex justify-between items-center">
                <div class="w-4/12"><span class="bg-gray-800 block rounded-lg px-4 py-2 text-sm text-center text-white font-bold">Country</span></div>
                <div class="w-8/12 flex justify-end"><span class="font-normal text-md text-gray-200 break-all">{{ $user->country }}</span></div>
            </li>
            <li class="border-b border-gray-600 pb-4 my-4 flex justify-between items-center">
                <div class="w-4/12"><span class="bg-gray-800 block rounded-lg px-4 py-2 text-sm text-center text-white font-bold">Phone No.</span></div>
                <div class="w-8/12 flex justify-end"><span class="font-normal text-md text-gray-200 break-all">{{ $user->phone }}</span></div>
            </li>
            <li class="border-b border-gray-600 pb-4 my-4 flex justify-between items-center">
                <div class="w-4/12"><span class="bg-gray-800 block rounded-lg px-4 py-2 text-sm text-center text-white font-bold">Wallet Address</span></div>
                <div class="w-8/12 flex justify-end"><span class="font-normal text-md text-gray-200 break-all">{{ $user->wallet_address }}</span></div>
            </li>
            <li class="border-b border-gray-600 pb-4 my-4 flex justify-between items-center">
                <div class="w-4/12"><span class="bg-gray-800 block rounded-lg px-4 py-2 text-sm text-center text-white font-bold">Member Since</span></div>
                <div class="w-8/12 flex justify-end"><span class="font-normal text-md text-gray-200 break-all">{{ \Carbon\Carbon::parse($user->created_at)->diffForHumans()
}} </span></div>
            </li>
        </ul>
        <div class="my-2 flex justify-between items-center">
            <div>
                <a href="{{ route('user.edit_profile') }}" class="bg-indigo-500 text-white rounded py-2 px-6">Edit Profile</a></div>
            <div>
                <a href="https://www.cryptonfttrade.com/logout" class="bg-red-500 text-white rounded py-2 px-6">Log Out</a>
            </div>
        </div>
    </div>
</div>

@endsection
