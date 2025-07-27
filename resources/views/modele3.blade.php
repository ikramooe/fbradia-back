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
                                    
                                       
                                    @if($page->liens)
                                       @foreach(json_decode($page->liens) as $lien)
                                            <a href="{{$lien->url}}" target="_blank">{{isset($lien->attributes->label) ? $lien->attributes->label->$locale : 'N/A'}}</a>
                                            <br>
                                       @endforeach
                                    @endif
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
      
    </div>
@endsection
