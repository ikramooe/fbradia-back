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
                                    <img class="img-fluid" src="{{ asset('storage/' . $article->image) }}" alt="blog-img">
                                    <div class="ttm-box-post-date">
                                        <span class="ttm-entry-date">
                                            <time class="entry-date" datetime="2021-03-18T04:16:25+00:00">18<span class="entry-month entry-year">Mar</span></time>
                                        </span>
                                    </div>
                                </div>
                            </div><!-- post-featured-wrapper end -->
                            <!-- ttm-blog-single-content -->
                            <div class="ttm-blog-single-content">
                                <div class="ttm-post-entry-header">
                                    <div class="post-meta"> 
                                        <a href="#" class="ttm-meta-line category ttm-textcolor-skincolor">{{ $article->category ? $article->category->name : 'Non Category' }}
                                        </a>
                                      
                                    </div>
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
                        <aside class="widget widget-search">
                            <form role="search" method="get" class="search-form  box-shadow" action="#">
                                <label>
                                <span class="screen-reader-text">Search for:</span>
                                <input type="search" class="input-text" placeholder="Search …" value="" name="s">
                                </label>
                                <button class="btn" type="submit"><i class="fa fa-search"></i> </button>
                            </form>
                        </aside>
                        <aside class="widget widget-Categories with-title">
                            <h3 class="widget-title">Categories</h3>
                            <ul>
                                
                                <li><a href="#">Account</a><span>(1)</span></li>
                                <li><a href="#">Finance</a><span>(1)</span></li>
                                <li><a href="#">Invest</a><span>(2)</span></li>
                                <li><a href="#">Marketing</a><span>(4)</span></li>
                                <li><a href="#">Security</a><span>(3)</span></li>
                            </ul>
                        </aside>
                        <aside class="widget widget-recent-post with-title">
                            <h3 class="widget-title">Recent Posts</h3>
                            <ul class="widget-post ttm-recent-post-list">
                                <li>
                                    <a href="blog-single.html"><img class="img-fluid" src="images/blog/post-001-150x150.jpg" alt="post-img"></a>
                                    <div class="post-detail">
                                        <span class="post-date"><i class="fa fa-calendar"></i>25 March, 2021</span>
                                        <a href="blog-single.html">If the white whale be raised it must be in a month.</a>
                                    </div>
                                </li>
                                <li>
                                    <a href="blog-single.html"><img class="img-fluid" src="images/blog/post-002-150x150.jpg" alt="post-img"></a>
                                    <div class="post-detail">
                                        <span class="post-date"><i class="fa fa-calendar"></i>18 March, 2021</span>
                                        <a href="blog-single.html">The new rules of personal finance in wealth</a>
                                        
                                    </div>
                                </li>
                                <li>
                                    <a href="blog-single.html"><img class="img-fluid" src="images/blog/post-003-150x150.jpg" alt="post-img"></a>
                                    <div class="post-detail">
                                        <span class="post-date"><i class="fa fa-calendar"></i>11 March, 2021</span>
                                        <a href="blog-single.html">Every business owner must be able to answer correctly</a>
                                        
                                    </div>
                                </li>
                            </ul>
                        </aside>
                        <aside class="widget tagcloud-widget with-title">
                            <h3 class="widget-title">Popular Tags</h3>
                            <div class="tagcloud">
                                <a href="#" class="tag-cloud-link">Account</a>
                                <a href="#" class="tag-cloud-link">Bank</a>
                                <a href="#" class="tag-cloud-link">Business</a>
                                <a href="#" class="tag-cloud-link">Creative</a>
                                <a href="#" class="tag-cloud-link">Invest</a>
                                <a href="#" class="tag-cloud-link">Money</a>
                                <a href="#" class="tag-cloud-link">Policy</a>
                                <a href="#" class="tag-cloud-link">Startup</a>
                            </div>
                        </aside>
                        <aside class="widget widget-banner">
                            <div class="ttm-col-bgcolor-yes ttm-bgcolor-darkgrey col-bg-img-thirteen ttm-col-bgimage-yes ttm-bg padding_top50 padding_left25 padding_right20 padding_bottom50">
                                <div class="ttm-col-wrapper-bg-layer ttm-bg-layer">
                                    <div class="ttm-col-wrapper-bg-layer-inner"></div>
                                </div>
                                <div class="layer-content">
                                    <div class="widget-banner-inner">
                                        <h3>First-Class<br>Finance Authority</h3>
                                        <p>Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.</p>
                                        <a class="ttm-btn ttm-btn-size-md ttm-btn-shape-rounded ttm-btn-style-fill ttm-btn-color-skincolor font-weight-600" href="contact-us.html">Get in Touch<i class="flaticon flaticon-right-arrow font-weight-bold"></i></a>
                                    </div>
                                </div>
                            </div>
                        </aside>
                        
                    </div>
                </div><!-- row end -->
            </div>
        </div>


</div><!--site-main end-->
@endsection
