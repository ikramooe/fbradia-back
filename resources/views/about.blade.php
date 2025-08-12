@extends('layouts.app')
@section('content')
 <!-- BREADCRUMB AREA START -->
 <div class="ltn__breadcrumb-area ltn__breadcrumb-area-2 ltn__breadcrumb-color-white bg-overlay-theme-black-90 bg-image" data-bs-bg="img/bg/9.jpg">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="ltn__breadcrumb-inner ltn__breadcrumb-inner-2 justify-content-between">
                    <div class="section-title-area ltn__section-title-2">
                        <h6 class="section-subtitle ltn__secondary-color"> Bienvenue chez FB RADIATEUR</h6>
                        <h1 class="section-title white-color">À propos de nous</h1>
                    </div>
                    <div class="ltn__breadcrumb-list">
                        <ul>
                            <li><a href="/">Accueil</a></li>
                            <li>À propos</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- BREADCRUMB AREA END -->

<!-- ABOUT US AREA START -->
<div class="ltn__about-us-area pt-120 pb-120">
    <div class="container">
        <div class="row">
            <!-- Image -->
            <div class="col-lg-6 align-self-center">
                <div class="about-us-img-wrap about-img-left">
                    <img src="{{ asset('storage/' . Page::get('image')) }}" alt="Image de l'entreprise FB Radiateur">
                </div>
            </div>

            <!-- Texte -->
            <div class="col-lg-6 align-self-center">
                <div class="about-us-info-wrap">
                    <div class="section-title-area ltn__section-title-2">
                        <h6 class="section-subtitle ltn__secondary-color">À propos de nous</h6>
                        <h1 class="section-title">{{ Page::get('title') }}<span>.</span></h1>
                        <p>
                            <?php echo Page::get('text') ?>
                        </p>
                    </div>

                   

                    <div class="btn-wrapper">
                        <a href="/produits" class="theme-btn-3 btn btn-effect-4">NOS PRODUITS</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- ABOUT US AREA END -->

<!-- FEATURE AREA START ( Feature - 6) -->
<div class="ltn__feature-area section-bg-1 pt-115 pb-90">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-title-area ltn__section-title-2 text-center">
                    <h6 class="section-subtitle ltn__secondary-color"> {{ Page::get('title_services') }} </h6>
                    <h1 class="section-title">{{ Page::get('title_services_2') }}<span>.</span></h1>
                </div>
            </div>
        </div>
        <div class="row justify-content-center">
            @if(Page::get('Services'))
            @foreach (json_decode(Page::get('Services')) as $service)
            <!-- Point Fort 1 -->
            <div class="col-lg-4 col-sm-6 col-12">
                <div class="ltn__feature-item ltn__feature-item-7">
                    <div class="ltn__feature-icon-title">
                        <div class="ltn__feature-icon">
                            <span><i class="icon-car-parts-3"></i></span>
                        </div>
                        <h3><a href="#">{{ $service->attributes->title }}</a></h3>
                    </div>
                    <div class="ltn__feature-info">
                        <p>{{ $service->attributes->description }}</p>
                    </div>
                </div>
            </div>
            @endforeach
            @endif

         
        </div>
    </div>
</div>

<!-- FEATURE AREA END -->

<!-- CALL TO ACTION START (call-to-action-5) -->
<div class="call-to-action-area call-to-action-5 bg-image bg-overlay-theme-90 pt-40 pb-25" data-bs-bg="img/bg/13.jpg">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="call-to-action-inner call-to-action-inner-5 text-center">
                    <h2 class="white-color text-decoration">24/7 Availability, Make <a href="/contact.html">An Appointment</a></h2>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- CALL TO ACTION END -->
<div class="call-to-action-area call-to-action-5 bg-image bg-overlay-theme-90 pt-40 pb-25" data-bs-bg="img/bg/13.jpg">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="call-to-action-inner call-to-action-inner-5 text-center">
                    <h2 class="white-color text-decoration">
                        Disponibilité 24h/24 – Prenez <a href="/contact.html">un rendez-vous</a> dès maintenant
                    </h2>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- PROGRESS BAR AREA START -->

@endsection