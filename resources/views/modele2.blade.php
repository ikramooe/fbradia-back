@extends('layouts.app')
@section('content')
<style>
    .search-section {
        margin-bottom: 40px;
        padding: 20px;
        background: #f8f9fa;
        border-radius: 8px;
    }

    .search-box {
        position: relative;
        max-width: 600px;
        margin: 0 auto;
    }

    .search-input {
        width: 100%;
        padding: 15px 20px;
        padding-left: 45px;
        border: 2px solid #e0e0e0;
        border-radius: 5px;
        font-size: 16px;
        transition: all 0.3s ease;
    }

    .search-input:focus {
        border-color: #ff4f01;
        outline: none;
        box-shadow: 0 0 0 3px rgba(255, 79, 1, 0.1);
    }

    .search-icon {
        position: absolute;
        left: 15px;
        top: 50%;
        transform: translateY(-50%);
        color: #666;
    }

    .no-results {
        display: none;
        text-align: center;
        padding: 20px;
        color: #666;
    }

    .pagination-container {
        margin-top: 40px;
        margin-bottom: 20px;
        text-align: center;
    }

    .pagination {
        display: inline-flex;
        list-style: none;
        padding: 0;
        margin: 0;
        background: #fff;
        border-radius: 5px;
        box-shadow: 0 2px 4px rgba(0,0,0,0.1);
    }

    .pagination li {
        margin: 0;
        border-right: 1px solid #eee;
    }

    .pagination li:last-child {
        border-right: none;
    }

    .pagination li a {
        display: block;
        padding: 12px 20px;
        color: #2d4a8a;
        text-decoration: none;
        transition: all 0.3s ease;
    }

    .pagination li.active a {
        background: #ff4f01;
        color: #fff;
    }

    .pagination li a:hover:not(.active) {
        background: #f8f9fa;
        color: #ff4f01;
    }

    .pagination li.disabled a {
        color: #ccc;
        pointer-events: none;
    }

    .communication-block {
        margin-bottom: 50px;
        padding: 30px;
        background: #fff;
        border-radius: 8px;
        box-shadow: 0 4px 8px rgba(0,0,0,0.1);
    }

    .communication-block h2 {
        color: #2d4a8a;
        margin-bottom: 20px;
        font-size: 24px;
        border-bottom: 2px solid #ff4f01;
        padding-bottom: 10px;
    }

    .communication-block p {
        margin-bottom: 20px;
        color: #666;
        line-height: 1.6;
    }

    .communication-links {
        list-style: none;
        padding: 0;
    }

    .communication-links li {
        margin-bottom: 15px;
    }

    .communication-links a {
        display: flex;
        align-items: center;
        color: #2d4a8a;
        text-decoration: none;
        transition: all 0.3s ease;
    }

    .communication-links a:hover {
        color: #ff4f01;
    }

    .communication-links i {
        margin-right: 10px;
        color: #ff4f01;
    }

    .download-btn {
        display: inline-block;
        padding: 10px 25px;
        background: #ff4f01;
        color: #fff;
        border-radius: 5px;
        text-decoration: none;
        transition: all 0.3s ease;
    }

    .download-btn:hover {
        background: #2d4a8a;
        color: #fff;
    }
</style>
      <!-- page-title -->
      <div class="ttm-page-title-row ttm-bg ttm-bgimage-yes ttm-bgcolor-darkgrey clearfix">
        <div class="ttm-row-wrapper-bg-layer ttm-bg-layer"></div>
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-12">
                    <div class="ttm-page-title-row-inner">
                        <div class="page-title-heading">
                            <h2 class="title">{{ $page->main_title }}</h2>
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

    <!--site-main start-->
    <div class="site-main">
        <!-- photo-gallery-section -->
        <section class="ttm-row communications-section clearfix">
            <div class="container">
                <!-- Search Section -->
                <div class="search-section">
                    <div class="search-box">
                       
                        <input type="text" class="search-input" placeholder="Rechercher dans les communications..." id="searchInput">
                    </div>
                    <div class="no-results">
                        <p>Aucun résultat trouvé</p>
                    </div>
                </div>

                @php
                $locale = app()->getLocale();
                @endphp
                <!-- 6ème Congrès -->
                @foreach (json_decode($page->documents) as $document)
                <div class="communication-block">
                    <h2>{{ isset($document->attributes->title->$locale) ? $document->attributes->title->$locale : '' }}</h2>
                    <p>{{ isset($document->attributes->content->$locale) ? $document->attributes->content->$locale : '' }}</p>
                    
                    @if(isset($document->attributes->file))
                    <a href="{{"/storage/" . $document->attributes->file }}" target="_blank" class="download-btn"><i class="fa fa-download"></i> Télécharger le document</a>
                    @endif
                </div>
                @endforeach

                

                <!-- Pagination -->
                <div class="pagination-container">
                    <ul class="pagination">
                        <li class="disabled"><a href="#" class="prev">&laquo; Précédent</a></li>
                        <li class="active"><a href="#" data-page="1">1</a></li>
                        <li><a href="#" data-page="2">2</a></li>
                        <li><a href="#" data-page="3">3</a></li>
                        <li><a href="#" class="next">Suivant &raquo;</a></li>
                    </ul>
                </div>
            </div>
        </section>
        
    </div>
@endsection
