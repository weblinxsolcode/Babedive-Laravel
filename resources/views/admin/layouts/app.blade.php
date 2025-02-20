<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required Meta Tags Always Come First -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Title -->
    <title> Admin | {{ $title ?? 'Dashboard' }}</title>

    <!-- Favicon -->
    <link rel="shortcut icon" href="{{ asset('logo.png') }}">

    <!-- Font -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600&display=swap" rel="stylesheet">

    <!-- CSS Implementing Plugins -->
    <link rel="stylesheet" href="{{ asset('admin/assets/vendor/bootstrap-icons/font/bootstrap-icons.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/assets/vendor/daterangepicker/daterangepicker.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/assets/vendor/tom-select/dist/css/tom-select.bootstrap5.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/assets/vendor/datatables.net.extensions/fixedColumns.dataTables.min.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/assets/vendor/datatables.net.extensions/dataTables.scroller.min.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/assets/vendor/tom-select/dist/css/tom-select.bootstrap5.css') }}">

    <!-- CSS Front Template -->
    <link rel="preload" href="{{ asset('admin/assets/css/theme.min.css') }}" data-hs-appearance="default" as="style">
    <link rel="preload" href="{{ asset('admin/assets/css/theme-dark.min.css') }}" data-hs-appearance="dark" as="style">

    <!-- Daterange picker -->
    <link rel="stylesheet" href="{{ asset('admin/plugins/daterangepicker/daterangepicker.css') }}">

    <script src="{{ asset('admin/assets/vendor/jquery/dist/jquery.min.js') }}"></script>


    <style data-hs-appearance-onload-styles>
        * {
            transition: unset !important;
        }

        body {
            opacity: 0;
        }

    </style>

    <script>
        window.hs_config = {
            "autopath": "@@autopath"
            , "deleteLine": "hs-builder:delete"
            , "deleteLine:build": "hs-builder:build-delete"
            , "deleteLine:dist": "hs-builder:dist-delete"
            , "previewMode": false
            , "startPath": "/index.html"
            , "vars": {
                "themeFont": "https://fonts.googleapis.com/css2?family=Inter:wght@400;600&display=swap"
                , "version": "?v=1.0"
            }
            , "layoutBuilder": {
                "extend": {
                    "switcherSupport": true
                }
                , "header": {
                    "layoutMode": "default"
                    , "containerMode": "container-fluid"
                }
                , "sidebarLayout": "default"
            }
            , "themeAppearance": {
                "layoutSkin": "default"
                , "sidebarSkin": "default"
                , "styles": {
                    "colors": {
                        "primary": "#377dff"
                        , "transparent": "transparent"
                        , "white": "#fff"
                        , "dark": "132144"
                        , "gray": {
                            "100": "#f9fafc"
                            , "900": "#1e2022"
                        }
                    }
                    , "font": "Inter"
                }
            }
            , "languageDirection": {
                "lang": "en"
            }
            , "skipFilesFromBundle": {
                "dist": ["assets/js/hs.theme-appearance.js", "assets/js/hs.theme-appearance-charts.js", "assets/js/demo.js"]
                , "build": ["assets/css/theme.css", "assets/vendor/hs-navbar-vertical-aside/dist/hs-navbar-vertical-aside-mini-cache.js", "assets/js/demo.js", "assets/css/theme-dark.css", "assets/css/docs.css", "assets/vendor/icon-set/style.css", "assets/js/hs.theme-appearance.js", "assets/js/hs.theme-appearance-charts.js", "node_modules/chartjs-plugin-datalabels/dist/chartjs-plugin-datalabels.min.js", "assets/js/demo.js"]
            }
            , "minifyCSSFiles": ["assets/css/theme.css", "assets/css/theme-dark.css"]
            , "copyDependencies": {
                "dist": {
                    "*assets/js/theme-custom.js": ""
                }
                , "build": {
                    "*assets/js/theme-custom.js": ""
                    , "node_modules/bootstrap-icons/font/*fonts/**": "assets/css"
                }
            }
            , "buildFolder": ""
            , "replacePathsToCDN": {}
            , "directoryNames": {
                "src": "./src"
                , "dist": "./dist"
                , "build": "./build"
            }
            , "fileNames": {
                "dist": {
                    "js": "theme.min.js"
                    , "css": "theme.min.css"
                }
                , "build": {
                    "css": "theme.min.css"
                    , "js": "theme.min.js"
                    , "vendorCSS": "vendor.min.css"
                    , "vendorJS": "vendor.min.js"
                }
            }
            , "fileTypes": "jpg|png|svg|mp4|webm|ogv|json"
        }
        window.hs_config.gulpRGBA = (p1) => {
            const options = p1.split(',')
            const hex = options[0].toString()
            const transparent = options[1].toString()

            var c;
            if (/^#([A-Fa-f0-9]{3}){1,2}$/.test(hex)) {
                c = hex.substring(1).split('');
                if (c.length == 3) {
                    c = [c[0], c[0], c[1], c[1], c[2], c[2]];
                }
                c = '0x' + c.join('');
                return 'rgba(' + [(c >> 16) & 255, (c >> 8) & 255, c & 255].join(',') + ',' + transparent + ')';
            }
            throw new Error('Bad Hex');
        }
        window.hs_config.gulpDarken = (p1) => {
            const options = p1.split(',')

            let col = options[0].toString()
            let amt = -parseInt(options[1])
            var usePound = false

            if (col[0] == "#") {
                col = col.slice(1)
                usePound = true
            }
            var num = parseInt(col, 16)
            var r = (num >> 16) + amt
            if (r > 255) {
                r = 255
            } else if (r < 0) {
                r = 0
            }
            var b = ((num >> 8) & 0x00FF) + amt
            if (b > 255) {
                b = 255
            } else if (b < 0) {
                b = 0
            }
            var g = (num & 0x0000FF) + amt
            if (g > 255) {
                g = 255
            } else if (g < 0) {
                g = 0
            }
            return (usePound ? "#" : "") + (g | (b << 8) | (r << 16)).toString(16)
        }
        window.hs_config.gulpLighten = (p1) => {
            const options = p1.split(',')

            let col = options[0].toString()
            let amt = parseInt(options[1])
            var usePound = false

            if (col[0] == "#") {
                col = col.slice(1)
                usePound = true
            }
            var num = parseInt(col, 16)
            var r = (num >> 16) + amt
            if (r > 255) {
                r = 255
            } else if (r < 0) {
                r = 0
            }
            var b = ((num >> 8) & 0x00FF) + amt
            if (b > 255) {
                b = 255
            } else if (b < 0) {
                b = 0
            }
            var g = (num & 0x0000FF) + amt
            if (g > 255) {
                g = 255
            } else if (g < 0) {
                g = 0
            }
            return (usePound ? "#" : "") + (g | (b << 8) | (r << 16)).toString(16)
        }

    </script>
</head>

<body class="has-navbar-vertical-aside navbar-vertical-aside-show-xl   footer-offset">

    <script src="{{ asset('admin/assets/js/hs.theme-appearance.js') }}"></script>

    <script src="{{ asset('admin/assets/vendor/hs-navbar-vertical-aside/dist/hs-navbar-vertical-aside-mini-cache.js') }}"></script>

    <!-- INCLUDE HEADER -->
    @include('admin.layouts.partials.header')

    <!-- INCLUDE SIDEBAR -->
    @include('admin.layouts.partials.sidebar')

    <!-- ========== MAIN CONTENT ========== -->
    <main id="content" role="main" class="main">
        @yield('content')

        <!-- FOOTER -->
        <div class="footer">
            <div class="row justify-content-between align-items-center">
                <div class="col">
                    <p class="fs-6 mb-0 text-center">
                        Diving Application &copy; <span class="d-none d-sm-inline-block">{{ date('Y') }}</span>
                        |
                        All Rights Reserved.
                    </p>
                </div>
                <!-- End Col -->

                <!-- Light Mode / Dark Mode -->
                <div class="col-auto">
                    <div class="d-flex justify-content-end">
                        <!-- List Separator -->
                        <ul class="list-inline list-separator">

                            <li class="list-inline-item">
                                <!-- Style Switcher -->
                                <div class="dropdown dropup">
                                    <button type="button" class="btn btn-ghost-secondary btn-icon rounded-circle" id="selectThemeDropdown" data-bs-toggle="dropdown" aria-expanded="false" data-bs-dropdown-animation>
                                    </button>
                                    <div class="dropdown-menu navbar-dropdown-menu navbar-dropdown-menu-borderless" aria-labelledby="selectThemeDropdown">
                                        <a class="dropdown-item" href="#" data-icon="bi-moon-stars" data-value="auto">
                                            <i class="bi-moon-stars me-2"></i>
                                            <span class="text-truncate" title="Auto (system default)">Auto (system default)</span>
                                        </a>
                                        <a class="dropdown-item" href="#" data-icon="bi-brightness-high" data-value="default">
                                            <i class="bi-brightness-high me-2"></i>
                                            <span class="text-truncate" title="Default (light mode)">Default (light mode)</span>
                                        </a>
                                        <a class="dropdown-item active" href="#" data-icon="bi-moon" data-value="dark">
                                            <i class="bi-moon me-2"></i>
                                            <span class="text-truncate" title="Dark">Dark</span>
                                        </a>
                                    </div>
                                </div>
                                <!-- End Style Switcher -->
                            </li>

                        </ul>
                        <!-- End List Separator -->
                    </div>
                </div>
                <!-- End Col -->
            </div>
            <!-- End Row -->
        </div>
    </main>
    <!-- ========== END MAIN CONTENT ========== -->

    <!-- INCLUDE FOOTER -->
    @include('admin.layouts.partials.footer')
    @include('toastr')
</body>

</html>
