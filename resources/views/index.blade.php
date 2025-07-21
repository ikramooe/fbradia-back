@extends('layouts.app')
@section('content')
    <!-- Banner -->
   
    @php
        $slider = Page::get('slider');
        $locale = app()->getLocale();
      
    @endphp
  
    <div class="banner_slider banner_slider_2 arrow banner_slider_wide">
        @foreach (json_decode($slider) as $item)
        <div class="slide s1 shadow">
            <div class="slide_img" style="background-image: url({{isset($item->attributes->image) ? asset('storage/' . $item->attributes->image) : ''}});"></div>
            <div class="slide__content">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="slide__content--headings ttm-textcolor-white text-left">

                                <h2 data-animation="fadeInDown" data-delay="0.1s">{{isset($item->attributes->title->$locale) ? $item->attributes->title->$locale : ''}}</h2>
                                <p class="d-none d-md-block" data-animation="fadeInDown" data-delay="0.3s">
                                    {{isset($item->attributes->description->$locale) ? $item->attributes->description->$locale : ''}}
                                </p>
                                <div class="d-inline-block margin_top20" data-animation="fadeInUp" data-delay="0.6s">
                                    <a class="ttm-btn ttm-btn-size-md  ttm-btn-shape-rounded ttm-btn-style-fill ttm-icon-btn-right ttm-btn-color-skincolor"
                                        href="/about">@lang('Lire plus')<i class="flaticon flaticon-right-arrow"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
       
      
    </div><!-- Banner end-->
   
    
    <!--site-main start-->
    <div class="site-main">

        @php
        $articles =App\Models\Blog::latest()->take(3)->get();
        @endphp
        <!-- article-section -->
        <section class="ttm-row article-section ttm-bgcolor-grey clearfix">
            <div class="container">
                <!--row -->
                <div class="row">
                    <div class="col-lg-12">
                        <!-- section title -->
                        <div class="section-title style2">
                            <div class="title-header">
                                <h3>@lang('Actualités')</h3>
                                <h2 class="title">@lang('Nos dernières actualités')</h2>
                            </div>
                           
                        </div><!-- section title end -->
                    </div>
                </div><!-- row end -->
                <div class="row">
                    @foreach ($articles as $article)
                    <div class="col-lg-4 col-md-6">
                        <!-- featured-imagebox-blog -->
                      
                        <div class="featured-imagebox featured-imagebox-post style1 box-shadow">
                            <div class="ttm-box-view-overlay">
                                <div class="featured-thumbnail"><!-- featured-thumbnail -->
                                    @if(isset($article->image))
                                    <a href="/blog/{{ $article->getTranslation('title', 'fr') }}"> <img class="img-fluid w-100"
                                            src="{{asset('storage/' . $article->image)}}" alt="post-001"> </a>
                                    @else 
                                    <a href="/blog/{{ $article->getTranslation('title', 'fr') }}"> <img class="img-fluid w-100"
                                            src="{{asset('images/logo.png')}}" alt="post-001"> </a>
                                    @endif
                                </div>
                                <div class="ttm-media-link">
                                    <a href="/blog/{{ $article->getTranslation('title', 'fr') }}" tabindex="0"
                                        class="ttm-icon ttm-icon_element-border ttm-icon_element-style-round ttm-icon_element-color-skincolor ttm-icon_element-size-xs">
                                        <i class="flaticon flaticon-right-arrow"></i>
                                    </a>

                                </div>
                            </div>
                            <div class="featured-content"><!-- featured-content -->
                                <div class="post-meta post-category"><!-- post-meta -->
                                    <span class="ttm-meta-line category">{{ $article->category ? $article->category->name : '' }}</span>
                                    <span class="ttm-entry-date">
                                        <time class="entry-date" datetime="2019-01-16T07:07:55+00:00">{{ $article->created_at->format('d M, Y') }}</time>
                                    </span>
                                </div>
                                <div class="featured-title"><!-- featured-title -->
                                    <h3><a href="/blog/{{ $article->getTranslation('title', 'fr') }}">{{ $article->title }}</a></h3>
                                </div>

                            </div>
                        </div><!-- featured-imagebox-blog end -->
                    </div>
                    @endforeach
                 
                </div>
            </div>
        </section><!-- article-section end -->

        <!-- aboutus-section -->
        <section class="ttm-row aboutus-section ttm-bgcolor-white clearfix">
            <div class="container">
                <div class="row"><!-- row -->
                    <div class="col-lg-6 col-md-12 col-sm-12">
                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-sm-6">
                                <img class="img-fluid w-100" src="{{Page::get('image1') ? asset('storage/' . Page::get('image1')) : ''}}" title="single-img-3"
                                    alt="single-img">
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-6 res-575-margin_top30">
                                <img class="img-fluid w-100" src="{{Page::get('image2') ? asset('storage/' . Page::get('image2')) : ''}}" title="single-img-4"
                                    alt="single-img">
                            </div>
                        </div>
                        <div class="margin_top30 blockquote_1">
                            <blockquote class="ttm-bgcolor-grey">
                                <div class="qoute-text">
                                    <h4>{{Page::get('quote') ? Page::get('quote') : ''}}</h4>
                                    <p>{{Page::get('quote_author') ? Page::get('quote_author') : ''}}</p>
                                </div>
                            </blockquote>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-12 col-sm-12">
                        <div class="padding_left35 res-991-padding_left0 res-991-margin_top30">
                            <!-- section title -->
                            <div class="section-title clearfix">
                                <div class="title-header">
                                    <h3>{{isset(json_decode(Page::get('title1'))->$locale) ? json_decode(Page::get('title1'))->$locale : ''}}</h3>
                                    <h2 class="title">{{isset(json_decode(Page::get('title2'))->$locale) ? json_decode(Page::get('title2'))->$locale : ''}}</h2>
                                </div>
                                <div class="title-desc">
                                    <p><?php echo isset(json_decode(Page::get('text'))->$locale) ? json_decode(Page::get('text'))->$locale : '' ?></p>
                                </div>
                            </div><!-- section title end -->
                           
                        </div>
                    </div>
                </div>
            </div>
        </section><!-- aboutus-section end -->

        <!-- services-section -->
        <section class="ttm-row services-section bg-img3 ttm-bg ttm-bgimage-yes ttm-bgcolor-darkgrey clearfix" style="background-color:#c42934;">
            <div class="container">
                <!--row -->
                <div class="row">
                    <div class="col-lg-12">
                        <!-- section title -->
                        <div class="section-title style2">
                            <div class="title-header">
                                <h3 style="color:#fff;">NOS SERVICES</h3>
                                <h2 class="title" style="color:#fff;">Services Professionnels</h2>
                            </div>
                            <div class="title-desc ttm-textcolor-white">
                                L'Ordre National des Experts-Comptables offre une gamme complète de services professionnels
                                pour soutenir et développer la profession comptable.
                                <a href="/about-us-1.html"
                                    class="ttm-btn btn-inline ttm-btn-color-skincolor ttm-icon-btn-right rajdhani fs-15 padding_right10">
                                    <strong>En savoir plus<i class="flaticon flaticon-right-arrow"></i></strong></a>
                            </div>
                        </div><!-- section title end -->
                    </div>
                </div><!-- row end -->
                <!--row -->
                <div class="row">
                    <div class="col-lg-4 col-md-12 col-sm-12">
                        <div class="featured-icon-box icon-align-bottom-content box-shadow style7">
                            <div class="featured-content">
                                <div class="featured-title">
                                    <h3>Formation Continue</h3>
                                </div>
                                <div class="featured-desc">
                                    Programme de formation continue pour maintenir et développer les compétences
                                    professionnelles.
                                </div>
                            </div>
                            <div class="featured-icon">
                                <div
                                    class="ttm-icon ttm-icon_element-onlytxt ttm-icon_element-color-skincolor  ttm-icon_element-size-md">
                                    <i class="flaticon flaticon-graduation"></i>
                                </div>
                                <a class="ttm-btn ttm-btn-size-md  ttm-btn-shape-rounded ttm-btn-style-fill ttm-icon-btn-right ttm-btn-color-dark float-right"
                                    href="/about-us-1.html">Lire plus<i class="flaticon flaticon-right-arrow"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-12 col-sm-12">
                        <div class="featured-icon-box icon-align-bottom-content box-shadow style7">
                            <div class="featured-content">
                                <div class="featured-title">
                                    <h3>Support Professionnel</h3>
                                </div>
                                <div class="featured-desc">
                                    Accompagnement et conseil pour les experts-comptables dans leur pratique
                                    professionnelle.
                                </div>
                            </div>
                            <div class="featured-icon">
                                <div
                                    class="ttm-icon ttm-icon_element-onlytxt ttm-icon_element-color-skincolor  ttm-icon_element-size-md">
                                    <i class="flaticon flaticon-support"></i>
                                </div>
                                <a class="ttm-btn ttm-btn-size-md  ttm-btn-shape-rounded ttm-btn-style-fill ttm-icon-btn-right ttm-btn-color-dark float-right"
                                    href="/about-us-1.html">Lire plus<i class="flaticon flaticon-right-arrow"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-12 col-sm-12">
                        <div class="featured-icon-box icon-align-bottom-content box-shadow style7">
                            <div class="featured-content">
                                <div class="featured-title">
                                    <h3>Normes Professionnelles</h3>
                                </div>
                                <div class="featured-desc">
                                    Développement et mise à jour des normes et standards de la profession comptable.
                                </div>
                            </div>
                            <div class="featured-icon">
                                <div
                                    class="ttm-icon ttm-icon_element-onlytxt ttm-icon_element-color-skincolor  ttm-icon_element-size-md">
                                    <i class="flaticon flaticon-checklist"></i>
                                </div>
                                <a class="ttm-btn ttm-btn-size-md  ttm-btn-shape-rounded ttm-btn-style-fill ttm-icon-btn-right ttm-btn-color-dark float-right"
                                    href="/about-us-1.html">Lire plus<i class="flaticon flaticon-right-arrow"></i></a>
                            </div>
                        </div>
                    </div>
                </div><!-- row end -->
                <div class="row">
                    <div class="col-lg-12">
                        @php
                            $partners = Page::get('partners');
                        @endphp
                        <div class="margin_top35 res-991-margin_top30 text-center">
                            <a class="end_button">
                                <span>{{isset(json_decode(Page::get('titlepartners'))->$locale) ? json_decode(Page::get('titlepartners'))->$locale : ''}}</span>
                            </a>
                        </div>
                    </div>
                </div>
                <!--client-row -->
                <div class="row slick_slider"
                    data-slick='{"slidesToShow": 6, "slidesToScroll": 1, "arrows":false, "autoplay":false, "infinite":true, "responsive": [{"breakpoint":1200,"settings":{"slidesToShow": 6}}, {"breakpoint":1024,"settings":{"slidesToShow": 5}}, {"breakpoint":777,"settings":{"slidesToShow":4}},
            {"breakpoint":575,"settings":{"slidesToShow":3}},
            {"breakpoint":480,"settings":{"slidesToShow":2}}]}'>
                    
            @foreach (json_decode($partners) as $partner)
            <div class="col-lg-12">
                        <div class="client-box style2">
                            <div class="ttm-client-logo">
                                <div class="ttm-client-logo-inner">
                                    <div class="client-thumbnail">
                                        <img class="img-fluid" src="{{asset('storage/' . $partner->logo)}}"
                                            alt="image">
                                    </div>
                                    <div class="client-thumbnail_hover">
                                        <img class="img-fluid" src="{{asset('storage/' . $partner->logo)}}"
                                            alt="image">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
            @endforeach
                   
                </div><!-- slick_slider end -->
            </div>
        </section><!-- services-section end  -->

        <!-- skill-section -->
        <section class="ttm-row skill-section ttm-bgcolor-white clearfix">
            <div class="container">
                <div class="row"><!-- row -->
                    <div class="col-lg-6 col-md-6 col-sm-12">
                        <div class="padding_right50 res-991-padding_right0">
                            <!-- section title -->
                            <div class="section-title clearfix">
                                <div class="title-header">
                                    <h3>{{isset(json_decode(Page::get('titlefeatures'))->$locale) ? json_decode(Page::get('titlefeatures'))->$locale : ''}}</h3>
                                    <h2 class="title">{{isset(json_decode(Page::get('titlefeatures2'))->$locale) ? json_decode(Page::get('titlefeatures2'))->$locale : ''}}</h2>
                                </div>
                                <div class="title-desc">
                                    <p>{{isset(json_decode(Page::get('textfeatures'))->$locale) ? json_decode(Page::get('textfeatures'))->$locale : ''}}</p>
                                </div>
                            </div><!-- section title end -->
                            @php
                            $features = Page::get('features');
                            @endphp
                            <div class="ttm-tabs ttm-tab-style-01 padding_top20 clearfix" data-effect="fadeIn">
                                <ul class="tabs">
                                    @foreach (json_decode($features) as $feature)
                                    <li class="tab active"><a href="#"><i class="flaticon flaticon-legal"></i>{{isset($feature->title->$locale) ? $feature->title->$locale : ''}}</a></li>
                                    @endforeach
                                </ul>
                                <div class="content-tab">
                                    <!-- content-inner -->
                                    @foreach (json_decode($features) as $feature)
                                    <div class="content-inner active">
                                        <div>{{isset($feature->text->$locale) ? $feature->text->$locale : ''}}</div>
                                    </div><!-- content-inner end-->
                                    @endforeach
                                    <!-- content-inner -->
                                    
                                    <!-- content-inner -->
                                  
                                </div>
                            </div>
                            <div class="row no-gutters">
                                <div class="col-lg-8 col-md-8 col-sm-8">
                                    <div
                                        class="ttm-fid inside ttm-fid-without-icon ttm-highlight-fid style1 res-575-margin_bottom30">
                                       
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-4 col-sm-4">
                                    <div class="ttm_single_image-wrapper border-style res-575-margin_bottom30">
                                        <img class="img-fluid" src="{{asset('storage/' . Page::get('mainimagefeatures'))}}" title="single-img-five"
                                            alt="single-img">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-12">
                        <div class="row">
                            <div class="col-12">
                              
                                <div class="ttm_single_image-wrapper">
                                    <img class="img-fluid" src="{{asset('storage/' . Page::get('mainimagefeatures'))}}" title="single-img-6"
                                        alt="single-img">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section><!-- skill-section end -->




        <!-- features-section -->
        <section
            class="ttm-row features-section bg-img4 ttm-bg ttm-bgimage-yes ttm-col-bgcolor-yes ttm-bgcolor-skincolor clearfix">
            <div class="ttm-row-wrapper-bg-layer ttm-bg-layer"></div>
            <div class="container">
                <!--row -->
                <div class="row">
                    <div class="col-lg-12">
                        <!-- section title -->
                        <div class="section-title style2 res-991-margin_bottom0">
                            <div class="title-header text-right">
                                <h3>{{isset(json_decode(Page::get('sectiontitle'))->$locale) ? json_decode(Page::get('sectiontitle'))->$locale : ''}}</h3>
                                <h2 class="title mr_10">{{isset(json_decode(Page::get('sectiontitle2'))->$locale) ? json_decode(Page::get('sectiontitle2'))->$locale : ''}}</h2>
                            </div>
                            <div
                                class="title-desc padding_left100 padding_top20  res-991-padding_left0 res-991-padding_top0">
                                <p class="padding_bottom20 res-991-padding_bottom0">{{isset(json_decode(Page::get('sectiontext'))->$locale) ? json_decode(Page::get('sectiontext'))->$locale : ''}}</p>
                                <div class="ttm-play-icon-btn text-left margin_top30 style2 res-991-margin_left20">
                                    <div class="ttm-play-icon-animation">
                                        <a href="#" target="_self" class="ttm_prettyphoto">
                                            <div
                                                class="ttm-icon ttm-icon_element-onlytxt ttm-icon_element-color-white ttm-icon_element-size-sm ttm-icon_element-style-rounded">
                                                <i class="fa fa-play ttm-textcolor-skincolor"></i>
                                            </div>
                                        </a>

                                    </div>

                                </div>
                            </div>
                        </div><!-- section title end -->
                    </div>
                </div><!-- row end -->
            </div>
        </section><!-- features-section end -->


      
    </div>
@endsection
