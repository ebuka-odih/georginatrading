<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Georginatrading</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/0.0.0-359252c/tailwind.min.css"/>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/alpinejs/3.1.0/cdn.js"></script>

    <style>
        #google_translate_element {

            color: transparent;
        }

        #google_translate_element a {

            display: none;
        }

        select.google_translate_element {

            color: black;
        }

        div.goog-te-gadget {

            color: transparent;
        }

        div.goog-te-gadget {

            color: transparent !important;
        }

        .goog-te-gadget .goog-te-combo {

            margin: 4px 0 !important;
            padding: 3px 2px;
            background: #1d1d1d;
            border: 1px solid #feb729;
            color: #ffffff;
            border-radius: 5px;
            cursor: pointer;
            outline: none;
        }
    </style>
</head>
<body class="bg-gray-800 w-full">
<nav x-data="{ isOpen: false }" :aria-expanded="isOpen" @keydown.escape="isOpen = false">
    <div class="shadow-b-xl h-22 bg-gray-700 w-full p-2 m-0">
        <div class="mx-4 flex justify-between items-center">
            <div class="flex items-center">
                <div>
                    <a href="{{ route('index') }}">
                        <h1 style="color: white; font-weight: bolder; font-size: 25px">Georginatrading</h1>
{{--                        <img src="{{ asset('sites/all/themes/geode_zen/logo-white.png') }}" width="80" height="80" alt="" class="image-8" />--}}
                    </a>

                </div>
                <!--<div style="margin-left:10px;font-size: 24px;color:white;font-weight: 800;">-->
                <!--    <a href="https://www.cryptonfttrade.com/home">NFT Trades</a>-->
                <!--</div>-->
            </div>


            <div class="hidden md:flex md:items-center">
                <a href="{{ route('user.dashboard') }}" class="mx-3 text-gray-100 text-lg font-bold">Dashboard</a>
                <a href="{{ route('user.profile') }}" class="mx-3 text-gray-100 text-lg font-bold">Profile</a>
                <a href="{{ route('user.invest') }}" class="mx-3 text-gray-100 text-lg font-bold">Investments</a>
                <a href="{{ route('user.deposit') }}" class="mx-3 text-gray-100 text-lg font-bold">Deposit</a>
                <a href="{{ route('user.withdraw') }}" class="mx-3 text-gray-100 text-lg font-bold">Withdrawals</a>

                <a class="mx-3 text-red-400 text-lg font-bold" href="{{ route('logout') }}"
                   onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                    {{ __('Logout') }}
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>
            </div>
            <div class="block md:hidden">
                <button :aria-expanded="isOpen" @click="isOpen = !isOpen" type="button" class="bg-green-300 rounded p-3 text-white">
                    <i class="fa fa-bars fa-2x"></i>
                </button>
            </div>
        </div>
    </div>
    <div class="bg-gray-500 z-50" :hidden="!isOpen">
        <a href="{{ route('user.dashboard') }}" class="block text-gray-100 text-lg font-bold p-4 border-b-2 border-gray-100">Dashboard</a>
        <a href="{{ route('user.profile') }}" class="block text-gray-100 text-lg font-bold p-4 border-b-2 border-gray-100">Profile</a>
        <a href="{{ route('user.invest') }}" class="block text-gray-100 text-lg font-bold p-4 border-b-2 border-gray-100">Investments</a>
        <a href="{{ route('user.deposit') }}" class="block text-gray-100 text-lg font-bold p-4 border-b-2 border-gray-100">Deposit</a>
        <a href="{{ route('user.withdraw') }}" class="block text-gray-100 text-lg font-bold p-4 border-b-2 border-gray-100">Withdrawals</a>
        <a class="block text-red-400 text-lg font-bold p-4 border-b-2 border-gray-100" href="{{ route('logout') }}"
           onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
            {{ __('Logout') }}
        </a>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
            @csrf
        </form>
{{--        <a href="https://www.cryptonfttrade.com/logout" class="block text-red-400 text-lg font-bold p-4 border-b-2 border-gray-100">Logout</a>--}}
    </div>
</nav>
<div class="my-10 mx-auto">
{{--    <div style="margin-left: 40px" id="google_translate_element"></div>--}}
{{--    <script>--}}
{{--        function googleTranslateElementInit() {--}}
{{--            new google.translate.TranslateElement({--}}
{{--                pageLanguage: 'en'--}}
{{--            }, 'google_translate_element');--}}
{{--        }--}}
{{--    </script>--}}
    <div style="height:62px; background-color: #1D2330; overflow:hidden; box-sizing: border-box; border: 1px solid #282E3B; border-radius: 4px; text-align: right; line-height:14px; block-size:62px; font-size: 12px; font-feature-settings: normal; text-size-adjust: 100%; box-shadow: inset 0 -20px 0 0 #262B38;padding:1px;padding: 0px; margin: 0px; width: 100%;">
        <div style="height:40px; padding:0px; margin:0px; width: 100%;">
            <!-- TradingView Widget BEGIN -->
            <div class="tradingview-widget-container">
                <div class="tradingview-widget-container__widget"></div>
                <div class="tradingview-widget-copyright"><a href="https://www.tradingview.com/markets/" rel="noopener" target="_blank"></a></div>
                <script type="text/javascript" src="https://s3.tradingview.com/external-embedding/embed-widget-ticker-tape.js" async>
                    {
                        "symbols": [
                        {
                            "proName": "FOREXCOM:SPXUSD",
                            "title": "S&P 500"
                        },
                        {
                            "proName": "FOREXCOM:NSXUSD",
                            "title": "US 100"
                        },
                        {
                            "proName": "FX_IDC:EURUSD",
                            "title": "EUR/USD"
                        },
                        {
                            "proName": "BITSTAMP:BTCUSD",
                            "title": "Bitcoin"
                        },
                        {
                            "proName": "BITSTAMP:ETHUSD",
                            "title": "Ethereum"
                        }
                    ],
                        "showSymbolLogo": true,
                        "colorTheme": "dark",
                        "isTransparent": false,
                        "displayMode": "adaptive",
                        "locale": "en"
                    }
                </script>
            </div>
            <!-- TradingView Widget END -->

        </div>

        <!-- <div style="color: #626B7F; line-height: 14px; font-weight: 400; font-size: 11px; box-sizing: border-box; padding: 2px 6px; width: 100%; font-family: Verdana, Tahoma, Arial, sans-serif;"><a href="https://coinlib.io" target="_blank" style="font-weight: 500; color: #626B7F; text-decoration:none; font-size:11px">Cryptocurrency Prices</a>&nbsp;by Coinlib</div> -->
    </div>
</div>

@yield('content')
{{--<script src="https://translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>--}}

</body>
</html>
