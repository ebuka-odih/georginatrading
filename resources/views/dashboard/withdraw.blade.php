@extends('dashboard.layout.app')
@section('content')


    <div class="w-full md:w-10/12 xl:w-8/12 md:flex md:justify-start items-start my-16 rounded-lg shadow-xl border border-gray-600 p-5 mx-auto">
    <div class="w-full md:w-4/12 md:border-r md:border-gray-700 p-6">
        <h2 class="text-xl text-white font-bold pb-4 border-b border-gray-700"> Request Withdrawal</h2>
        <form method="POST" action="{{ route('user.process_withdraw') }}">
            @csrf
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            @if(session()->has('success'))
                <div style="color: #0f910f" class="alert alert-success">
                    {{ session()->get('success') }}
                </div>
            @endif
            @if(session()->has('declined'))
                <div style="color: #dc1230" class="alert alert-success">
                    {{ session()->get('declined') }}
                </div>
            @endif
            <div class="w-12/12 my-5">
                <label class="block text-white text-sm font-bold my-2">Amount</label>
                <input type="number"  required="" name="amount" class="bg-gray-900 w-full p-2 border-2 border-gray-700 rounded text-gray-100">
            </div>
            <div class="w-12/12">
                <label class="block text-white text-sm font-bold my-2">Withdraw To:</label>
                <input type="text" required name="wallet_type" class="bg-gray-900 w-full p-2 border-2 border-gray-700 rounded text-gray-100">

{{--                <p class="text-md font-extrabold text-green-300 my-5 break-all rounded shadow border border-green-200 p-2 bg-gray-900"></p>--}}
            </div>
            <div class="w-12/12 my-10">
                <button type="submit" class="bg-green-400 text-gray-900 font-bold p-3 rounded w-full">Proceed</button>
            </div>
            <h2 style="color: white">Account Bal: $@convert(auth()->user()->acct_bal)</h2>
        </form>
    </div>

    <div class="w-full mx-5 md:w-7/12 px-2 py-6">
        <h2 class="text-xl text-white font-bold pb-4 border-b border-gray-700"> Withdrawal History</h2>
        <div class="max-h-80 p-2 my-2 overflow-y-auto">
            <ul>
                <li class="flex justify-between items-center border-b-2 border-gray-700 pb-4 text-gray-200 font-extrabold">
                    <div>Date</div>
                    <div>Amount($)</div>
                    <div>Status</div>
                </li>
                @forelse($withdrawal as $item)
                    <li class="flex justify-between items-center border-b-2 border-gray-700 py-4 text-gray-50 font-normal">
                        <div>{{ \Carbon\Carbon::parse($item->created)->diffForHumans() }}</div>
                        <div>$ @convert($item->amount)</div>
                        <div>{!! $item->status() !!}
{{--                            <a href="{{ route('user.payment', $item->id) }}"  class="inline-block bg-green-300 text-gray-600 rounded px-3 py-1 text-sm font-bold">--}}
{{--                            </a>--}}
                        </div>
                    </li>
                @empty
                    <p class="text-white text-center p-5">No data yet..</p>
                @endforelse

            </ul>
        </div>
    </div>

</div>

@endsection
