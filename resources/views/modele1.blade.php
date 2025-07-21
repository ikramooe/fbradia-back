@extends('layouts.app')
@section('content')
    <!-- page-title -->
    @php
       $locale = app()->getLocale();
    @endphp
    <div class="ttm-page-title-row ttm-bg ttm-bgimage-yes ttm-bgcolor-darkgrey clearfix">
        <div class="ttm-row-wrapper-bg-layer ttm-bg-layer"></div>
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-12">
                    <div class="ttm-page-title-row-inner">
                        <div class="page-title-heading">
                            <h2 class="title">{{ $page->title }}</h2>
                        </div>
                        <div class="breadcrumb-wrapper">
                            <span>
                                <a title="Homepage" href="/"><i class="fa fa-home"></i>Home</a>
                            </span>
                            <span>{{ $page->title }}</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- page-title end -->

    <!--site-main start-->
    <div class="site-main">


        @if($page->content)
        <!-- aboutus-section -->
        <section class="ttm-row aboutus-section ttm-bgcolor-white clearfix">
            <div class="container">
                <div class="row row-equal-height"><!-- row -->
                    <div class="col-lg-6 col-md-7 col-sm-12">
                        <div class="ttm_single_image-wrapper">
                            <img class="img-fluid" src="{{ asset('storage/' . $page->image) }}" title="single-img-one" alt="single-img">
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-12 col-sm-12 res-1024-w-100">
                        <div
                            class="padding_left30 res-1024-padding_lr15 res-1024-padding_top40 padding_top20
                    ">
                            <!-- section title -->
                            <div class="section-title clearfix">
                                <div class="title-header">
                                    <h3>{{ $page->main_title }}</h3>
                                    <h2 class="title res-1024-br-none">{{ $page->main_title }}</h2>
                                </div>
                                <div class="title-desc padding_right40">
                                    <p><?php echo $page->content ?></p>
                                       
                                    </p>
                                </div>
                            </div><!-- section title end -->
                        </div>
                    </div>
                </div>
              
            </div>
        </section><!-- aboutus-section end -->

        @endif


        <!-- services-section -->
      




        <!-- team-section -->
        @if($page->members)
        <section
            class="ttm-row team-section bg-img6 ttm-bg ttm-bgimage-yes ttm-bgcolor-white mt_60 res-991-margin_top0 {{ $page->content ? 'padding_top150' : 'padding_top50' }} clearfix">
            <div class="container">
                <!--row -->
                <div class="row">
                    <div class="col-lg-12">
                        <!-- section title -->
                        <div class="section-title title-style-center_text">
                            <div class="title-header">
                                <h3>{{ $page->main_title }}</h3>
                                <h2 class="title">{{ $page->sub_title }}</h2>
                            </div>
                        </div><!-- section title end -->
                    </div>
                </div><!-- row end -->
                <!-- row -->
                <div class="row "
                   >
                   
                    @foreach (json_decode($page->members) as $member)
                  
                    <div class="ttm-box-col-wrapper  col-lg-3 col-md-6 col-sm-12">
                        <!-- featured-imagebox-team -->
                        <div class="featured-imagebox featured-imagebox-team style1">
                            <div class="ttm-box-view-overlay">
                                <div class="featured-iconbox ttm-media-link">
                                    <div class="media-block">
                                       
                                       
                                    </div>
                                </div>
                                <div class="featured-thumbnail">
                                    @if(isset($member->attributes->image))
                                    <img class="img-fluid" src="{{ asset('storage/' .$member->attributes->image) }}" alt="image">
                                    @endif
                                </div>
                            </div>
                            <div class="featured-content featured-content-team">
                                <div class="featured-title">
                                    <h3><a href="#">{{ isset($member->attributes->name->$locale) ? $member->attributes->name->$locale : '' }}</a></h3>
                                </div>
                                <div class="team-position">{{ isset($member->attributes->position->$locale) ? $member->attributes->position->$locale : '' }}</div>
                               
                            </div>
                        </div><!-- featured-imagebox-team end-->
                    </div>
                    @endforeach
                   
                </div>



            </div>
        </section><!-- team-section end -->
        @endif
    </div>
@endsection
