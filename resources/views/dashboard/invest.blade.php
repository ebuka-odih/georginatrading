
@extends('dashboard.layout.app')
@section('content')


<div class="w-full md:w-10/12 xl:w-8/12 md:flex md:justify-start items-start my-16 rounded-lg shadow-xl border border-gray-600 p-5 mx-auto">
    <div class="w-full md:w-4/12 md:border-r md:border-gray-700 p-6">
        <h2 class="text-xl text-white font-bold pb-4 border-b border-gray-700"> New Investment</h2>
        <form method="POST" action="{{ route('user.process_invest') }}">
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
                <div style="color: #16b616; text-align: center" class="alert alert-success">
                    {{ session()->get('success') }}
                </div>
            @endif
            @if(session()->has('decline'))
                <div style="color: #bf2121; text-align: center" class="alert alert-success">
                    {{ session()->get('decline') }}
                </div>
            @endif
            @if(session()->has('low_balance'))
                <div style="color: #bf2121; text-align: center" class="alert alert-success">
                    {{ session()->get('low_balance') }}
                </div>
            @endif
            <div class="w-12/12 my-5">
                <label class="block text-white text-sm font-bold my-2">Amount</label>
                <input type="number" name="amount" class="bg-gray-900 w-full p-2 border-2 border-gray-700 rounded text-gray-100">
            </div>
            <div class="w-12/12 my-5">
                <label class="block text-white text-sm font-bold my-2">Select Plans</label>
                <select  name="investment_plans_id" class="outline-none bg-gray-900 w-full p-2 border-2 border-gray-700 rounded text-gray-100">
                    @foreach($package as $item)
{{--                        <input type="hidden" name="plan_id" value="{{ $item->id }}">--}}
                        <option value="{{ $item->id }}">{{ $item->name }} - {{ $item->term_days }} Hours Trades - ${{ $item->min_deposit." - $".$item->max_amt() }}</option>
                    @endforeach
                </select>
            </div>
            <div class="w-12/12 my-10">
                <button type="submit" class="bg-green-400 text-gray-900 font-bold p-3 rounded w-full">Proceed</button>
            </div>
        </form>
    </div>

    <div class="w-full mx-5 md:w-7/12 px-2 py-6">
        <h2 class="text-xl text-white font-bold pb-4 border-b border-gray-700"> Investment History</h2>
        <div class="max-h-80 p-2 my-2 overflow-y-auto">
            <ul>
                <li class="flex justify-between items-center border-b-2 border-gray-700 pb-4 text-gray-200 font-extrabold">
                    <div>Date</div>
                    <div>Amount($)</div>
                    <div>Status</div>
                </li>
                @forelse($investment as $item)
                    <li class="flex justify-between items-center border-b-2 border-gray-700 pb-4 text-gray-200 font-extrabold">
                    <div>{{ date('d-M-y', strtotime($item->created_at)) }}</div>
                    <div>$ @convert($item->amount)</div>
                    <div>{!! $item->status() !!}</div>
                    </li>
                @empty
                <p class="text-white text-center p-5">No data yet..</p>
                @endforelse
            </ul>
        </div>
    </div>

</div>

@endsection
