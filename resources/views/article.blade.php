@extends('layouts.app')
@section('content')
    <!-- page-title -->
    @php
       $locale = app()->getLocale();
    @endphp
   
      <!-- page-title -->
      <div class="ttm-page-title-row ttm-bg ttm-bgimage-yes ttm-bgcolor-darkgrey clearfix">
        <div class="ttm-row-wrapper-bg-layer ttm-bg-layer"></div>
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-12">
                    <div class="ttm-page-title-row-inner">
                        <div class="page-title-heading">
                            <h2 class="title">@lang('Article')</h2>
                        </div>
                        <div class="breadcrumb-wrapper">
                            <span>
                                <a title="Homepage" href="/"><i class="fa fa-home"></i>@lang('Home')</a>
                            </span>
                            <span>@lang('Article')</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>                    
    <!-- page-title end -->
   
    <!--site-main start-->
    <div class="site-main">
         <div class="ttm-row sidebar ttm-sidebar-right ttm-bgcolor-grey overflow-hidden clearfix">
            <div class="container">
                <!-- row -->
                <div class="row">
                    <div class="col-lg-9 content-area">
                       <!-- post -->
                       <article class="post ttm-blog-single clearfix">
                            <!-- post-featured-wrapper -->
                            <div class="ttm-post-featured-wrapper ttm-featured-wrapper">
                                <div class="ttm-post-featured">
                                    @if ($article->image)
                                    <img class="img-fluid" src="{{ asset('storage/' . $article->image) }}" alt="blog-img">
                                    @else
                                    <img class="img-fluid" src="{{ asset('images/logo.png') }}" alt="blog-img">
                                    @endif
                                    <div class="ttm-box-post-date">
                                        <span class="ttm-entry-date">
                                            <time class="entry-date" datetime="2021-03-18T04:16:25+00:00" style="font-size: 18px;">{{ $article->created_at->format('d M, Y') }}</time>
                                        </span>
                                    </div>
                                </div>
                            </div><!-- post-featured-wrapper end -->
                            <!-- ttm-blog-single-content -->
                            <div class="ttm-blog-single-content">
                                <div class="ttm-post-entry-header">
                                    <div class="post-meta"> 
                                        <a href="#" class="ttm-meta-line category ttm-textcolor-skincolor">{{ $article->category ? $article->category->name : '' }}
                                        </a>
                                      
                                    </div>
                                    @if($article->file)
                                        <div class="download-button mt-3">
                                            <a href="{{ asset('storage/' . $article->file) }}" class="ttm-btn ttm-btn-size-sm ttm-btn-shape-rounded ttm-btn-style-fill ttm-btn-color-skincolor" download>
                                                <i class="fa fa-download mr-2"></i>Télécharger le document
                                            </a>
                                        </div>
                                    @endif
                                </div>
                                <div class="entry-content">
                                    <div class="ttm-box-desc-text">
                                        <div class="margin_bottom20">
                                            <?php echo $article->content ?>
                                        </div>
                                    </div>
                                  
                                </div>
                            </div>
                        </article><!-- ttm-blog-single-content end -->
                    </div>
                    <div class="col-lg-3 widget-area sidebar-right  mt_100 padding_top100 mb_100 padding_bottom100 res-991-margin_top0 res-991-padding_top0">
                      
                        
                    </div>
                </div><!-- row end -->
            </div>
        </div>


</div><!--site-main end-->
@endsection
