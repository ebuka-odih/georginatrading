@extends('dashboard.layout.app')
@section('content')


<div class="grid grids-1 md:grid-cols-2 xl:grid-cols-4 gap-5 m-4 md:m-10">
    <div class="rounded-lg shadow-md border border-gray-400 bg-gray-700 p-4 min-h-24 flex justify-between items-center">
        <div>
            <h3 class="text-lg font-normal text-gray-100">Available Balance</h3>
            <h3 class="text-3xl font-extrabold text-gray-50">$ @convert($account_bal)</h3>
        </div>
        <div>
            <i class="fa fa-3x text-white fa-money-check"></i>
        </div>
    </div>

    <div class="rounded-lg shadow-md border border-gray-400 bg-gray-700 p-4 min-h-24 flex justify-between items-center">
        <div>
            <h3 class="text-lg font-normal text-gray-100">Total Deposits</h3>
            <h3 class="text-3xl font-extrabold text-gray-50">$ @convert($total_dep)</h3>
        </div>
        <div>
            <i class="fa fa-3x text-white fa-check-circle"></i>
        </div>
    </div>

    <div class="rounded-lg shadow-md border border-gray-400 bg-gray-700 p-4 min-h-24 flex justify-between items-center">
        <div>
            <h3 class="text-lg font-normal text-gray-100">Total Withdrawals</h3>
            <h3 class="text-3xl font-extrabold text-gray-50">$ @convert($total_with)</h3>
        </div>
        <div>
            <i class="fa fa-3x text-white fa-money-bill"></i>
        </div>
    </div>

    <div class="rounded-lg shadow-md border border-gray-400 bg-gray-700 p-4 min-h-24 flex justify-between items-center">
        <div>
            <h3 class="text-lg font-normal text-gray-100">Pending Withdrawals</h3>
            <h3 class="text-3xl font-extrabold text-gray-50">$@convert($pending_with)</h3>
        </div>
        <div>
            <i class="fa fa-3x text-white fa-spinner"></i>
        </div>
    </div>
</div>

<!-- <div class="my-4 mx-auto w-11/12">
    <script src="https://widgets.coingecko.com/coingecko-coin-list-widget.js"></script>
    <coingecko-coin-list-widget  coin-ids="bitcoin,eos,ethereum,litecoin,tether,binancecoin,binance-ecosystem-value,dogecoin,shiba-inu,alien-worlds,trust-wallet-token,tron" currency="usd" locale="en"></coingecko-coin-list-widget>
</div> -->
<div class="block my-10 bg-gray-900 shadow-xl rounded-lg mx-auto w-full md:w-8/12">
    <!-- TradingView Widget BEGIN -->
    <div class="tradingview-widget-container">
        <div id="tradingview_ee650"></div>
        <div class="tradingview-widget-copyright"><a href="https://www.tradingview.com/symbols/AAPL/" rel="noopener" target="_blank"><span class="blue-text">Apple</span></a> by TradingView</div>
        <script type="text/javascript" src="https://s3.tradingview.com/tv.js"></script>
        <script type="text/javascript">
            new TradingView.MediumWidget(
                {
                    "symbols": [
                        [
                            "Bitcoin",
                            "BINANCE:BTCUSDT|12M"
                        ],
                        [
                            "Apple",
                            "AAPL"
                        ],
                        [
                            "Google",
                            "GOOGL"
                        ],
                        [
                            "Microsoft",
                            "MSFT"
                        ]
                    ],
                    "chartOnly": false,
                    "width": "100%",
                    "height": "500px",
                    "locale": "en",
                    "colorTheme": "dark",
                    "isTransparent": false,
                    "autosize": true,
                    "showVolume": false,
                    "hideDateRanges": false,
                    "scalePosition": "right",
                    "scaleMode": "Normal",
                    "fontFamily": "-apple-system, BlinkMacSystemFont, Trebuchet MS, Roboto, Ubuntu, sans-serif",
                    "noTimeScale": false,
                    "valuesTracking": "1",
                    "chartType": "line",
                    "fontColor": "#787b86",
                    "gridLineColor": "rgba(0, 0, 0, 0.06)",
                    "container_id": "tradingview_ee650"
                }
            );
        </script>
    </div>
    <!-- TradingView Widget END -->
</div>
@endsection
