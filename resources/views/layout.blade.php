<!DOCTYPE html>
<html lang="{{ LaravelLocalization::getCurrentLocale() }}">

<head>
    <!-- Google tag (gtag.js) -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-YCBKVNPRLP"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());

        gtag('config', 'G-YCBKVNPRLP');
    </script>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <meta name="description"
        content="Future Leaders est l'endroit idéal qui vous permettra de développer vos connaissances et compétences dans le domaine de Trading, Forex et Crypto.">
    <meta name='copyright' content='Future Leaders'>
    <meta name='author' content='kazalmedia, alaebenmarraze@kazalmedia.com'>
    <meta name='designer' content='Walid Arbaoui'>

    <meta name='og:title' content='Future Leaders'>
    <meta name='og:image' content='{{ asset('assets/images/social-media-image.webp') }}'>

    <meta name='og:site_name' content='Future Leaders'>
    <meta name='og:description'
        content="Future Leaders est l'endroit idéal qui vous permettra de développer vos connaissances et compétences dans le domaine de Trading, Forex et Crypto.">


    <meta name="google" content="notranslate">

    <link rel="icon" href="{{ asset('assets/icons/flat_icon/flat_icon_16x16.png') }}" sizes="16x16"
        type="image/png">
    <link rel="icon" href="{{ asset('assets/icons/flat_icon/flat_icon_32x32.png') }}" sizes="32x32"
        type="image/png">
    <link rel="icon" href="{{ asset('assets/icons/flat_icon/flat_icon_48x48.png') }}" sizes="48x48"
        type="image/png">
    <link rel="icon" href="{{ asset('assets/icons/flat_icon/flat_icon_62x62.png') }}" sizes="62x62"
        type="image/png">
    <link rel="icon" href="{{ asset('assets/icons/flat_icon/flat_icon_192x192.png') }}" sizes="192x192"
        type="image/png">
    <link rel="icon" href="{{ asset('assets/icons/flat_icon/flat_icon.png') }}" type="image/png">

    <link rel="alternate" hreflang="en" href="https://www.futureleaders.ma/en" />
    <link rel="alternate" hreflang="fr-FR" href="https://www.futureleaders.ma/fr" />
    <link rel="alternate" hreflang="ar-AR" href="https://www.futureleaders.ma/ar" />

    <title>Future Leaders</title>

    <!-- Swiper CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.css" />

    <!-- Main App CSS -->
    <link rel="stylesheet" href="{{ asset('css/style.css') }}" />

</head>

<body>
    <script>
        // Determines if the user has a set theme
        function detectColorScheme() {
            let theme = "light";
            // Local storage is used to override OS theme settings
            if (localStorage.getItem("theme")) {
                if (localStorage.getItem("theme") == "dark") {
                    theme = "dark";
                }
            } else if (!window.matchMedia) {
                // matchMedia method not supported
                return false;
            } else if (window.matchMedia("(prefers-color-scheme: dark)").matches) {
                // OS theme setting detected as dark
                theme = "dark";
            }

            // Dark theme preferred, set document with a `data-theme` attribute
            if (theme == "dark") {
                document.documentElement.setAttribute("data-theme", "dark");
            }
            return theme;
        }
        let theme = detectColorScheme();
    </script>

    @yield('content')

    <!-- ScrollMagic JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/ScrollMagic/2.0.6/ScrollMagic.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/ScrollMagic/2.0.6/plugins/debug.addIndicators.min.js"></script>

    <!-- Swiper JS -->
    <script src="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.js"></script>

    <!-- App JS -->
    <script type="text/javascript" src="{{ asset('assets/js/app.js?v=4') }}"></script>

</body>

</html>
