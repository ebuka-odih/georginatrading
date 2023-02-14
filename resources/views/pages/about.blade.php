@extends('pages.layout.app')
@section('content')

    <link rel='stylesheet' id='quantfury-style-css' href='{{ asset('wp-content/themes/quantfury/frontend/public/styles/style.min8878.css?ver=0a394aaf080e680671f88e507eed108c') }}' type='text/css' media='all' />
    <link rel='stylesheet' id='story-block-styles-css' href='{{ asset('wp-content/themes/quantfury/frontend/public/styles/story.minaffa.css?ver=b2ddef7dd8199fe399af54b899c61e24') }}' type='text/css' media='all' />
    <link rel='stylesheet' id='classic-theme-styles-css' href='{{ asset('wp-includes/css/classic-themes.min68b3.css?ver=1') }}' type='text/css' media='all' />

<main style="background-color: #fff" class="t-base__main js-content">


    <section class="s-story">
        <div class="s-story__container">
            <h1 class="s-story__title el-headline">
                My story
            </h1>

            <div class="s-story__content">
                <div class="s-story__picture">

                    <img decoding="async" loading="lazy" class="s-story__img el-image" src="{{ asset('img/gerog.jpeg') }}" alt="" width="270" height="270">

                </div>

                <div class="s-story__text el-wysiwyg">
                    <p>
                        The idea of predicting events guided me 10 years ahead to start working in the financial industry as a trader in 2009. Since then, I have been a quantitative trader of proprietary capital, forex, futures, commodities and equity markets, working in various financial institutions and has seen the global financial trading industry expanding from serving few, to pretty much everybody with a mobile phone or computer.
                        <br><br>Struck by the global brokerage industry practices of quoting incorrect asset prices and charging various fees, promoting greed and churning and burning users, I came up with an idea of This Professional Trade Executions System and the principles based on trading with unmatched conditions, and a unique transparent business model that is shared with traders and investors as well.
                    </p>
                </div>
            </div>
        </div>
    </section>
</main>


    <script type='text/javascript' src='{{ asset('wp-content/themes/quantfury/frontend/public/js/librariesd198.js?ver=c3ee6f7344dcadc0836ce12f062b5506') }}' id='quantfury-libraries-js'></script>
    <script type='text/javascript' id='quantfury-scripts-js-extra'>
        /* <![CDATA[ */
        var siteLanguage = {"code":"en"};
        /* ]]> */
    </script>
    <script type='text/javascript' src='{{ asset('wp-content/themes/quantfury/frontend/public/js/scripts7c0a.js?ver=f6f77d7bf75cbdf6574645ab18af2db1') }}' id='quantfury-scripts-js'></script>



@endsection
