@extends('dashboard.layout.app')
@section('content')


    <div class="w-full md:w-10/12 xl:w-8/12 md:flex md:justify-start items-start my-16 rounded-lg shadow-xl border border-gray-600 p-5 mx-auto">
    <div class="w-full md:w-4/12 md:border-r md:border-gray-700 p-6">
        <h2 class="text-xl text-white font-bold pb-4 border-b border-gray-700"> Make A Deposit</h2>
        <form method="POST" action="{{ route('user.make_deposit') }}">
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
            <div class="w-12/12 my-5">
                <label class="block text-white text-sm font-bold my-2">Amount</label>
                <input type="number" name="amount" class="bg-gray-900 w-full p-2 border-2 border-gray-700 rounded text-gray-100"/>
            </div>
            <div class="w-12/12 my-5">
                <label class="block text-white text-sm font-bold my-2">Select Method</label>
                <select name="payment_method_id" class="outline-none bg-gray-900 w-full p-2 border-2 border-gray-700 rounded text-gray-100">
                    @foreach($wallets as $item)
                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="w-12/12 my-10">
                <button type="submit" class="bg-green-400 text-gray-900 font-bold p-3 rounded w-full">Proceed</button>
            </div>
        </form>
    </div>

    <div class="w-full mx-5 md:w-7/12 px-2 py-6">
        <h2 class="text-xl text-white font-bold pb-4 border-b border-gray-700"> Deposit History</h2>
        <div class="max-h-80 p-2 my-2 overflow-y-auto">
            <ul>
                <li class="flex justify-between items-center border-b-2 border-gray-700 pb-4 text-gray-200 font-extrabold">
                    <div>Date</div>
                    <div>Amount($)</div>
                    <div>Status</div>
                </li>
                @foreach($deposits as $item)
                <li class="flex justify-between items-center border-b-2 border-gray-700 py-4 text-gray-50 font-normal">
                    <div>{{ \Carbon\Carbon::parse($item->created)->diffForHumans() }}</div>
                    <div>$ @convert($item->amount)</div>
                    <div>{!! $item->status() !!}
                        @if($item->status == 0)
                        <a href="{{ route('user.payment', $item->id) }}"  class="inline-block bg-green-300 text-gray-600 rounded px-3 py-1 text-sm font-bold"> Pay</a>
                        @else
                        @endif
                    </div>
                </li>
                @endforeach


            </ul>
        </div>
    </div>

</div>


@endsection
