@extends('dashboard.layout.app')
@section('content')


    <div class="w-full md:w-10/12 xl:w-8/12 md:flex md:justify-start items-start my-16 rounded-lg shadow-xl border border-gray-600 p-5 mx-auto">
        <div class="w-full md:w-4/12 md:border-r md:border-gray-700 p-6">
            <h4 style="color: white; text-align: center; ">Payment QRCode ({{ optional($deposit->payment_method)->name }})</h4>
{{--            {!! QrCode::size(200)->generate($deposit->payment_method->value ? : 'No wallet'); !!}--}}

        </div>

        <div class="w-full mx-5 md:w-7/12 px-2 py-6">
            <h2 class="text-xl text-white font-bold pb-4 border-b border-gray-700">Make Payment To The Address Below</h2>
            <div class="max-h-80 p-2 my-2 overflow-y-auto">
                <h3 style="color: white">Amount to Pay</h3>
                <h4 style="color: white">${{ $deposit->amount }}</h4>
                <br>
                <form action="">
                    <div class="w-12/12 my-5">
                        <label class="block text-white text-sm font-bold my-2">Wallet Address</label>
                        <input id="foo" readonly type="text" value="{{ optional($deposit->payment_method)->value }}" class="bg-gray-900 w-full p-2 border-2 border-gray-700 rounded text-gray-100"/>
                    </div>

                    <div class="w-12/12 my-10">
                        <a href="#" data-clipboard-target="#foo" class="btn bg-green-400 text-gray-900 font-bold p-3 rounded w-full">Copy</a>
                    </div>
                </form>

            </div>
        </div>

    </div>
{{--    <h3 style="color: white">{{ $deposit }}</h3>--}}

    <script src="https://cdnjs.cloudflare.com/ajax/libs/clipboard.js/2.0.10/clipboard.min.js"></script>
    <script>
        new ClipboardJS('.btn');
    </script>
@endsection
