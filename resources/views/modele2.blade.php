@extends('layouts.app')
@section('content')
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
                    <h2>{{ isset($document->title->$locale) ? $document->title->$locale : '' }}</h2>
                    <p>{{ isset($document->content->$locale) ? $document->content->$locale : '' }}</p>
                   
                    <a href="#" class="download-btn"><i class="fa fa-download"></i> Télécharger les communications</a>
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
