@extends('layouts.app')
@section('content')
    <!-- page-title -->
    @php
       $locale = app()->getLocale();
       $articles = \App\Models\Blog::all();
    @endphp
     
     <div class="ttm-page-title-row ttm-bg ttm-bgimage-yes ttm-bgcolor-darkgrey clearfix">
        <div class="ttm-row-wrapper-bg-layer ttm-bg-layer"></div>
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-12">
                    <div class="ttm-page-title-row-inner">
                        <div class="page-title-heading">
                            <h2 class="title">@lang('Actualités')</h2>
                        </div>
                        <div class="breadcrumb-wrapper">
                            <span>
                                <a title="Homepage" href="/"><i class="fa fa-home"></i>Home</a>
                            </span>
                            <span>@lang('Actualités')</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div><!-- page-title end -->
   
    <!--site-main start-->
    <div class="site-main">
        <div class="ttm-row sidebar ttm-sidebar-right ttm-bgcolor-grey overflow-hidden clearfix">
            <div class="container">
                <!-- row -->
                <div class="row">
                    <div class="col-lg-9 content-area">
                        <div class="row">
                            @foreach ($articles as $item)
                                <div class="col-lg-6">
                                    <!-- featured-imagebox-blog -->
                                    <div class="featured-imagebox featured-imagebox-post style1 box-shadow">
                                        <div class="ttm-box-view-overlay">
                                            <div class="featured-thumbnail"><!-- featured-thumbnail -->
                                                @if($item->image)
                                                    <img class="img-fluid" src="{{asset('storage/' . $item->image)}}" alt="">
                                              
                                                @else
                                                    <img class="img-fluid" src="{{asset('images/logo.png')}}" alt="">
                                                @endif
                                            </div>
                                            <div class="ttm-media-link">
                                                <a  href="/blog/{{ $item->id }}" tabindex="0" class="ttm-icon ttm-icon_element-border ttm-icon_element-style-round ttm-icon_element-color-skincolor ttm-icon_element-size-xs">
                                                    <i class="flaticon flaticon-right-arrow"></i>
                                                </a>
                                            </div>
                                        </div>
                                        <div class="featured-content"><!-- featured-content -->
                                            <div class="post-meta post-category"><!-- post-meta -->
                                                <span class="ttm-meta-line category">{{ $item->blogCategory? $item->blogCategory->name : '' }}</span>
                                                <span class="ttm-entry-date">
                                                    <time class="entry-date" datetime="2019-01-16T07:07:55+00:00"> <span class="entry-month entry-year">{{ $item->created_at->format('F, Y') }}</span></time>
                                                </span>
                                            </div>
                                            <div class="featured-title"><!-- featured-title -->
                                                <h3><a href="/blog/{{ $item->getTranslation('title', 'fr')  }}">{{ $item->title }}</a></h3>
                                            </div>
                                        </div>
                                    </div><!-- featured-imagebox-blog end -->
                                </div>
                            @endforeach
                            
                          
                        </div>
                    </div>
                    <div class="col-lg-3 widget-area sidebar-right res-991-margin_top0 res-991-padding_top0">
                     
                        <aside class="widget widget-Categories with-title">
                            <h3 class="widget-title">@lang('Categories')</h3>
                            <ul>
                                @foreach (\App\Models\BlogCategory::all() as $category)
                                    <li><a href="#">{{ $category->name }}</a><span>({{ $category->blogs->count() }})</span></li>
                                @endforeach
                            </ul>
                        </aside>
                     
                    </div>
                </div><!-- row end -->
            </div>
        </div>
    </div><!--site-main end-->

@endsection
