<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}" dir="{{ app()->getLocale() === 'ar' ? 'rtl' : 'ltr' }}">

<!-- Mirrored from themetechmount.com/html/invess/header-classic.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 11 May 2025 22:57:08 GMT -->
<!-- Added by HTTrack -->
<meta http-equiv="content-type" content="text/html;charset=UTF-8" /><!-- /Added by HTTrack -->

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="keywords" content="HTML5 Template" />
    <meta name="keywords"
        content=" Invess - Accounting & Finance Consulting Html Template, Invess - Accounting & Finance Consulting WordPress theme, Axacus - Business Agency WordPress Theme, Axacus - Business Agency HTML Template, Zippco - Business and Finance Consulting WordPress Theme, Fondex - Business and Finance Consulting Html Template, unlimited colors available, ui/ux, ui/ux design, best html template, html template, html, woocommerce, shopify, prestashop, eCommerce, react js, react template, JavaScript, best CSS theme,css3, elementor theme, latest premium themes 2024, latest premium templates 2024, Preyan Technosys Pvt.Ltd, cymol themes, themetech mount, Web 3.0, multi-theme, website theme and template, woocommerce, bootstrap template, web templates, responsive theme, business, accountant, advisor, advisory, agency, broker, business, consulting, corporate, elementor theme, finance, insurance, investment, consulting firms, business advisors, corporate website, finance insurance, investment agency, accounting service, business and finance, finance services, legal adviser, Marketing advisors, multipurpose template, professional services">
    <meta name="description" content="Invess - HTML Template" />
    <meta name="author" content="https://www.themetechmount.com/" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Ordre National Des Experts Comptables</title>

    <!-- favicon icon -->
    <link rel="shortcut icon" href="images/favicon-32x32.png" />

    <!-- bootstrap -->
    <link rel="stylesheet" type="text/css" href="{{ asset('css/bootstrap.min.css') }}" />

    <!-- animate -->
    <link rel="stylesheet" type="text/css" href="{{ asset('css/animate.css') }}" />

    <!-- flaticon -->
    <link rel="stylesheet" type="text/css" href="{{ asset('css/flaticon.css') }}" />

    <!-- fontawesome -->
    <link rel="stylesheet" type="text/css" href="{{ asset('css/font-awesome.css') }}" />

    <!-- themify -->
    <link rel="stylesheet" type="text/css" href="{{ asset('css/themify-icons.css') }}" />

    <!-- slick -->
    <link rel="stylesheet" type="text/css" href="{{ asset('css/slick.css') }}">

    <!-- prettyphoto -->
    <link rel="stylesheet" type="text/css" href="{{ asset('css/prettyPhoto.css') }}">

    <!-- shortcodes -->
    <link rel="stylesheet" type="text/css" href="{{ asset('css/shortcode.css') }}" />

    <!-- main -->
    <link rel="stylesheet" type="text/css" href="{{ asset('css/main.css') }}" />

    <!-- megamenu -->
    <link rel="stylesheet" type="text/css" href="{{ asset('css/megamenu.css') }}" />

    <!-- responsive -->
    <link rel="stylesheet" type="text/css" href="{{ asset('css/responsive.css') }}" />
    <!-- language switcher -->
    <link rel="stylesheet" type="text/css" href="{{ asset('css/language-switcher.css') }}" />

</head>

<body>
    <!--page start-->
    <div class="page">
        <!-- preloader start -->
        <div id="preloader" class="blobs-wrapper">
            <div class="ttm-bgcolor-skincolor loader"></div>
        </div>
        <!-- preloader end -->

        <!--header start-->
        <header id="masthead" class="header ttm-header-style-02">
            <!-- ttm-topbar-wrapper -->
            <div class="top_bar ttm-bgcolor-darkgrey clearfix">
                <div class="container">
                    <div class="row no-gutters">
                        <div class="col-md-12 d-flex flex-row align-items-center justify-content-center">
                            <!-- Language Switcher -->
                            <div class="language-switcher mr-auto">
                                <select class="form-control" onchange="window.location.href=this.value" style="color: white; border:1px solid white">
                                    <option value="{{ route('locale', ['locale' => 'en']) }}"
                                        {{ app()->getLocale() === 'en' ? 'selected' : '' }} style="color: white;">English</option>
                                    <option value="{{ route('locale', ['locale' => 'ar']) }}"
                                        {{ app()->getLocale() === 'ar' ? 'selected' : '' }} style="color: white;">العربية</option>
                                    <option value="{{ route('locale', ['locale' => 'fr']) }}"
                                        {{ app()->getLocale() === 'fr' ? 'selected' : '' }} style="color: white;">Français</option>
                                </select>
                            </div>
                            <div class="top_bar_contact_item font-weight-bold padding_left15">
                                <div class="top_bar_icon"><i class="fa fa-map-o"></i>
                                </div>@lang('Adresse'): <span
                                    class="font-weight-500 text-white">{{ isset(json_decode(Page::option('contact')->address)->$locale) ? json_decode(Page::option('contact')->address)->$locale : '' }}</span>
                            </div>
                            <div class="top_bar_contact_item font-weight-bold">
                                <div class="top_bar_icon ttm-highlight-right"><i class="ti ti-email"></i></div>
                                @lang('Email'): <a href="mailto:{{ Page::option('contact')->email ?? '' }}"
                                    class="font-weight-500 text-white">{{ Page::option('contact')->email ?? '' }}</a>
                            </div>

                        </div>
                    </div>
                </div>
            </div><!-- ttm-topbar end -->

            <!-- site-header-menu -->
            <div id="site-header-menu" class="site-header-menu ttm-bgcolor-transpatant">
                <div class="site-header-menu-inner ttm-stickable-header ">
                    <div class="container">
                        <div class="row">
                            <div class="col">
                                <!--site-navigation -->
                                <div class="site-navigation d-flex flex-row align-items-center">
                                    <!-- site-branding -->
                                    <div class="site-branding mr-auto">
                                        <a class="home-link" href="/" title="EC" rel="home">
                                            <img id="logo-img" class="img-center standardlogo" src="images/logo.png"
                                                alt="logo-img">
                                        </a>
                                    </div>



                                    <div class="btn-show-menu-mobile menubar menubar--squeeze">
                                        <span class="menubar-box">
                                            <span class="menubar-inner"></span>
                                        </span>
                                    </div>
                                    <!-- menu -->
                                    <nav class="main-menu menu-mobile" id="menu">
                                        <ul class="menu">
                                            @foreach (App\Models\Menu::all() as $item)
                                                <li
                                                    class="mega-menu-item {{ request()->url() === url($item->url) ? 'active' : '' }}">
                                                    <a href="{{ url($item->url) }}"
                                                        class="mega-menu-link">{{ $item->title }}</a>

                                                    @if (!empty($item->pages) && count($item->pages) > 0)
                                                        <ul class="mega-submenu">
                                                            @foreach ($item->pages as $page)
                                                                <li>
                                                                    <a
                                                                        href="/pages/{{ $page->getTranslation('title', 'fr') }}">{{ $page->title }}</a>
                                                                </li>
                                                            @endforeach
                                                        </ul>
                                                    @endif
                                                </li>
                                            @endforeach
                                        </ul>
                                    </nav>


                                </div><!-- site-navigation end-->
                            </div>
                        </div>
                    </div>
                </div>
            </div><!-- site-header-menu end-->
        </header>
        <!-- Banner -->
        @yield('content')
        <!--footer start-->
        <footer class="footer widget-footer ttm-bgcolor-darkgrey ttm-bg clearfix">
            <div class="ttm-row-wrapper-bg-layer ttm-bg-layer"></div>
            <div class="container">

                <div class="second-footer">
                    <div class="row">
                        <div class="widget-area col-xs-12 col-sm-6 col-md-6 col-lg-4">
                            <div class="widget widget_text  clearfix">
                                <div class="footer-logo">
                                    <img id="logo-img-1" class="img-center standardlogo" src="images/logo.png"
                                        alt="logo-img">
                                </div>
                                <p>Invess offers an extensive range of professional services and a high degree of
                                    spe-cialization. We serves both private & public traded companies. We bring over 35
                                    years of experience.</p>
                            </div>
                            <div class="widget d-flex padding_top15 res-575-margin_bottom20">
                                <h3 class="widget-title margin_right10">@lang('Social Share'):</h3>
                                <div class="social-icons">
                                    <ul class="list-inline d-flex">
                                        <li>
                                            <a class="tooltip-top" target="_blank"
                                                href="{{ Page::option('contact')->facebook ?? '' }}"
                                                data-tooltip="Facebook"><i class="fa fa-facebook"></i></a>
                                        </li>
                                        <li>
                                            <a class="tooltip-top" target="_blank"
                                                href="{{ Page::option('contact')->twitter ?? '' }}"
                                                data-tooltip="Twitter"><i class="fa fa-twitter"></i></a>
                                        </li>
                                        <li>
                                            <a class=" tooltip-top" target="_blank"
                                                href="{{ Page::option('contact')->instagram ?? '' }}"
                                                data-tooltip="instagram"><i class="fa fa-instagram"></i></a>
                                        </li>

                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="widget-area col-xs-12 col-sm-6 col-md-6 col-lg-4">
                            <div class="widget widget_nav_menu clearfix">
                                <h3 class="widget-title">Explore</h3>
                                <ul class="menu-footer-quick-links">
                                    <li><a href="about-us-2.html">@lang('About Us')</a></li>
                                    <li><a href="/blog">@lang('Blog')</a></li>
                                    <li><a href="/contact">@lang('Contact Us')</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="widget-area col-xs-12 col-sm-6 col-md-6 col-lg-4">
                            <div class="widget widget-recent-post res-991-margin_top30 clearfix">
                                <h3 class="widget-title">@lang('Recent Posts')</h3>
                                @php
                                    $locale = app()->getLocale();
                                    $recent_posts = App\Models\Blog::latest()->limit(5)->get();
                                @endphp
                                <ul class="widget-post ttm-recent-post-list">
                                    @foreach ($recent_posts as $item)
                                        <li>
                                            <a href="/article/{{ $item->title }}"><img class="img-fluid"
                                                    src="images/blog/post-001-150x150.jpg" alt="post-img"></a>
                                            <div class="post-detail">
                                                <span class="post-date"><i
                                                        class="fa fa-calendar"></i>{{ $item->created_at }}</span>
                                                <a href="blog-single.html">{{ $item->title }}</a>

                                            </div>
                                        </li>
                                    @endforeach


                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="bottom-footer-text ">
                    <div class="row copyright text-center">
                        <div class="col-lg-12 col-md-12 col-sm-12 d-md-flex d-sm-block justify-content-center">
                            <span>Copyright &#169; {{ date('Y') }} <a href="/"> ONEC.</a>All Rights
                                Reserved.</span>
                            <div id="footer-nav-menu">
                                <ul class="footer-nav-menu">
                                    <li><a href="#">Privacy Policy</a></li>
                                    <li><a href="/contact">Contact Us</a></li>

                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </footer><!-- footer end-->

        <!--back-to-top start-->
        <a id="totop" href="#top">
            <i class="fa fa-angle-up"></i>
        </a>
        <!--back-to-top end-->

    </div>


    <!-- Javascript -->
    <script src="{{ asset('js/jquery-3.7.1.min.js') }}"></script>
    <script src="{{ asset('js/jquery-migrate-3.4.1.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('js/jquery.easing.js') }}"></script>
    <script src="{{ asset('js/jquery-waypoints.js') }}"></script>
    <script src="{{ asset('js/jquery-validate.js') }}"></script>
    <script src="{{ asset('js/jquery.prettyPhoto.js') }}"></script>
    <script src="{{ asset('js/slick.min.js') }}"></script>
    <script src="{{ asset('js/numinate.min.js') }}"></script>
    <script src="{{ asset('js/circle-progress.min.js') }}"></script>
    <script src="{{ asset('js/imagesloaded.min.js') }}"></script>
    <script src="{{ asset('js/jquery-isotope.js') }}"></script>
    <script src="{{ asset('js/main.js') }}"></script>

</body>

<!-- Mirrored from themetechmount.com/html/invess/header-classic.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 11 May 2025 22:57:32 GMT -->

</html>
