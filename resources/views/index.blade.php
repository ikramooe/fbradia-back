@extends('layouts.app')

@section('content')
    <!-- SLIDER AREA START (slider-6) -->
    <div class="ltn__slider-area ltn__slider-3 ltn__slider-6 section-bg-1">
        <div class="ltn__slide-one-active slick-slide-arrow-1 slick-slide-dots-1 arrow-white">
            <!-- ltn__slide-item  -->
            @if (Page::get('slider'))
                @foreach (json_decode(Page::get('slider')) as $item)
                    <div class="ltn__slide-item ltn__slide-item-2 ltn__slide-item-3 ltn__slide-item-5 text-color-white bg-image bg-overlay-theme-black-80"
                        data-bs-bg="{{ asset('storage/' . $item->attributes->image) }}">
                        <div class="ltn__slide-item-inner">
                            <div class="container">
                                <div class="row">
                                    <div class="col-lg-12 align-self-center">
                                        <div class="slide-item-info">
                                            <div class="slide-item-info-inner ltn__slide-animation">
                                                <div class="slide-item-info">
                                                    <div class="slide-item-info-inner ltn__slide-animation">
                                                        <h6 class="slide-sub-title ltn__secondary-color animated"> FABRICANT
                                                            DE RADIATEURS AUTO</h6>
                                                        <h1 class="slide-title animated ">{{ $item->attributes->title }}
                                                        </h1>
                                                        <div class="slide-brief animated">
                                                            <p><?php echo $item->attributes->description; ?></p>
                                                        </div>
                                                        <div class="btn-wrapper animated">
                                                            <a href="/produits" class="theme-btn-1 btn btn-effect-1">NOS
                                                                PRODUITS</a>
                                                            <a href="/about"
                                                                class="btn btn-transparent btn-effect-2 white-color">EN
                                                                SAVOIR PLUS</a>
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                        <div class="slide-item-img">
                                            <img src="img/radia-removebg-preview.png" alt="#">
                                            <span class="call-to-circle-1"></span>
                                            <!--  -->
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            @endif

        </div>
    </div>
    <!-- SLIDER AREA END -->

    <!-- ABOUT US AREA START -->
    <div class="ltn__about-us-area pt-80 pb-85">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 align-self-center">
                    <div class="about-us-img-wrap about-img-left">
                        <img src="{{ asset('storage/' . Page::get('image_about')) }}" alt="Image de l'entreprise FB Radiateur">
                    </div>
                </div>
                <div class="col-lg-6 align-self-center">
                    <div class="about-us-info-wrap">
                        <div class="section-title-area ltn__section-title-2">
                            <h6 class="section-subtitle ltn__secondary-color">{{ Page::get('title_about_1') }}</h6>
                            <h1 class="section-title">{{ Page::get('title_about_2') }}<span>.</span></h1>
                            <p>{{ Page::get('text_about') }}</p>
                        </div>

                       
                        <hr>
                        <div class="about-call-us">
                            <div class="call-us-icon">
                                <img src="img/icons/7.png" alt="Icon Image">
                            </div>
                            <div class="call-us-info">
                                <p>Contactez-nous 24h/24 pour <a href="/contact"
                                        class="ltn__secondary-color text-decoration"><strong>toutes vos
                                            demandes</strong></a>.</p>
                                <h2><a href="tel:+213XXXXXXXXX">+213 XX XX XX XX</a> <small> ou </small> <a
                                        href="tel:+213XXXXXXXXX">+213 XX XX XX XX</a></h2>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <!-- ABOUT US AREA END -->

    <!-- WHY CHOOSE US AREA START -->
    <div class="ltn__why-choose-us-area section-bg-1 pt-120 pb-120">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="why-choose-us-info-wrap">
                        <div class="section-title-area ltn__section-title-2">
                            <h6 class="section-subtitle ltn__secondary-color">// Pourquoi nous choisir</h6>
                            <h1 class="section-title">{{ Page::get('title_choisir_nous') }}</h1>
                            <p>{{ Page::get('text_choisir_nous') }}</p>
                        </div>
                        <div class="row">
                            @if (Page::get('features'))
                            @foreach (json_decode(Page::get('features')) as $item)
                                <div class="col-lg-12 col-md-6">
                                    <div class="why-choose-us-feature-item">
                                        <div class="why-choose-us-feature-icon">
                                            <i class="icon-car-parts-1"></i>
                                        </div>
                                        <div class="why-choose-us-feature-brief">
                                            <h3>{{ $item->attributes->title }}</h3>
                                            <p>{{ $item->attributes->description }}</p>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                            @endif
                            
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="why-choose-us-img-wrap">
                        <div class="why-choose-us-img-1 text-start">
                            <img src="{{ asset('storage/' . Page::get('image_choisir_nous1')) }}" alt="Image">
                        </div>
                        <div class="why-choose-us-img-2 text-end">
                            <img src="{{ asset('storage/' . Page::get('image_choisir_nous2')) }}" alt="Image">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- WHY CHOOSE US AREA END -->

    <!-- SERVICE AREA START (Service 1) -->
    <div class="ltn__service-area ltn__primary-bg before-bg-1 pt-115 pb-70">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title-area ltn__section-title-2 text-center">
                        <h6 class="section-subtitle ltn__secondary-color">// Nos Services</h6>
                        <h1 class="section-title white-color">{{ Page::get('title_services') }}<span>.</span></h1>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center">
                @if (Page::get('services'))
                @foreach (json_decode(Page::get('services')) as $item)
                    <div class="col-lg-4 col-sm-6">
                        <div class="ltn__service-item-1">
                            <div class="service-item-img">
                                <img src="{{ asset('storage/' . $item->attributes->image) }}" alt="#">
                                <div class="service-item-icon">
                                    <i class="icon-mechanic"></i>
                                </div>
                            </div>
                            <div class="service-item-brief">
                                <h3><a href="#">{{ $item->attributes->title }}</a></h3>
                                <p>{{ $item->attributes->description }}</p>
                            </div>
                        </div>
                    </div>
                @endforeach
                @endif
              
            </div>
        </div>
    </div>

    <!-- SERVICE AREA END -->

    <!-- PRODUCT TAB AREA START (product-item-3) -->

    <!-- PRODUCT TAB AREA END -->

    <!-- CALL TO ACTION START (call-to-action-2) -->
    <div class="ltn__call-to-action-area call-to-action-2 pt-20 pb-20" data-bs-bg="img/1.jpg--">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="call-to-action-inner call-to-action-inner-2 text-center">
                        <h2>Contactez-nous pour toute demande</h2>
                        <div class="btn-wrapper">
                            <a class="btn btn-effect-4 btn-white" href="/contact"><i class="fas fa-phone-volume"></i>
                                MAKE A CALL</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- CALL TO ACTION END -->

    <!-- FEATURE AREA START ( Feature - 3) -->
    <div class="ltn__feature-area pt-115 pb-80">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title-area ltn__section-title-2 section-title-style-3">
                        <div class="section-brief-in">
                            <p>FB RADIATEUR vous garantit des produits de qualité, un service de proximité et un
                                savoir-faire 100% algérien.</p>
                        </div>
                        <div class="section-title-in">
                            <h6 class="section-subtitle ltn__secondary-color">// Pourquoi nous choisir</h6>
                            <h1 class="section-title">Nos Atouts Clés<span>.</span></h1>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <!-- Colonne gauche -->
                <div class="col-lg-4">
                    <div class="row justify-content-center">
                        <div class="col-lg-12 col-md-6 col-12">
                            <div class="ltn__feature-item ltn__feature-item-3 text-right text-end">
                                <div class="ltn__feature-icon">
                                    <span><i class="icon-car-parts"></i></span>
                                </div>
                                <div class="ltn__feature-info">
                                    <h2><a href="service-details.html">Fabrication Locale</a></h2>
                                    <p>Production industrielle nationale avec un contrôle qualité rigoureux et des matériaux
                                        certifiés.</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-12 col-md-6 col-12">
                            <div class="ltn__feature-item ltn__feature-item-3 text-right text-end">
                                <div class="ltn__feature-icon">
                                    <span><i class="icon-exterior"></i></span>
                                </div>
                                <div class="ltn__feature-info">
                                    <h2><a href="service-details.html">Compatibilité Multi-Marques</a></h2>
                                    <p>Nos radiateurs sont adaptés à un large éventail de véhicules, toutes marques et
                                        modèles confondus.</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-12 col-md-6 col-12">
                            <div class="ltn__feature-item ltn__feature-item-3 text-right text-end">
                                <div class="ltn__feature-icon">
                                    <span><i class="icon-car-parts-6"></i></span>
                                </div>
                                <div class="ltn__feature-info">
                                    <h2><a href="service-details.html">Durabilité Optimale</a></h2>
                                    <p>Conçus pour résister aux conditions climatiques et mécaniques les plus exigeantes.
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Image centrale -->
                <div class="col-lg-4">
                    <div class="feature-banner-img text-center mb-30">
                        <img src="img/radia-removebg-preview.png" alt="Image FB RADIATEUR">
                    </div>
                </div>

                <!-- Colonne droite -->
                <div class="col-lg-4">
                    <div class="row justify-content-center">
                        <div class="col-lg-12 col-md-6 col-12">
                            <div class="ltn__feature-item ltn__feature-item-3">
                                <div class="ltn__feature-icon">
                                    <span><i class="icon-car-parts-7"></i></span>
                                </div>
                                <div class="ltn__feature-info">
                                    <h2><a href="service-details.html">Service Après-Vente</a></h2>
                                    <p>Assistance et accompagnement technique pour nos clients distributeurs et
                                        particuliers.</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-12 col-md-6 col-12">
                            <div class="ltn__feature-item ltn__feature-item-3">
                                <div class="ltn__feature-icon">
                                    <span><i class="icon-car-parts-8"></i></span>
                                </div>
                                <div class="ltn__feature-info">
                                    <h2><a href="service-details.html">Large Réseau de Distribution</a></h2>
                                    <p>Nos produits sont disponibles dans plusieurs wilayas grâce à nos partenaires agréés.
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-12 col-md-6 col-12">
                            <div class="ltn__feature-item ltn__feature-item-3">
                                <div class="ltn__feature-icon">
                                    <span><i class="icon-car-parts-3"></i></span>
                                </div>
                                <div class="ltn__feature-info">
                                    <h2><a href="service-details.html">Engagement Qualité</a></h2>
                                    <p>Chaque produit est testé en conformité avec les normes techniques internationales.
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- FEATURE AREA END -->

    <!-- IMAGE SLIDER AREA START (img-slider-2) -->
    <div class="ltn__img-slider-area ltn__img-slider-2 section-bg-1 pt-115 pb-250">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title-area ltn__section-title-2 text-center">
                        <h6 class="section-subtitle ltn__secondary-color">// Portfolio</h6>
                        <h1 class="section-title">Nos Produits<span>.</span></h1>
                    </div>
                </div>
            </div>
        </div>
        <div class="container-fluid">
            <div class="row ltn__image-slider-2-active slick-arrow-1 slick-arrow-1-inner">
                <div class="col-lg-12">
                    <div class="ltn__img-slide-item-2">
                        <a href="img/IMG-20250724-WA0050.jpg" data-rel="lightcase:myCollection">
                            <img src="img/IMG-20250724-WA0050.jpg" alt="Image">
                        </a>
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="ltn__img-slide-item-2">
                        <a href="img/IMG-20250724-WA0055.jpg" data-rel="lightcase:myCollection">
                            <img src="img/IMG-20250724-WA0055.jpg" alt="Image">
                        </a>
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="ltn__img-slide-item-2">
                        <a href="img/radia.webp" data-rel="lightcase:myCollection">
                            <img src="img/radia.webp" alt="Image">
                        </a>
                    </div>
                </div>

                <div class="col-lg-12">
                    <div class="ltn__img-slide-item-2">
                        <a href="img/radia.webp" data-rel="lightcase:myCollection">
                            <img src="img/radia.webp" alt="Image">
                        </a>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <!-- IMAGE SLIDER AREA END -->

    <!-- CALL TO ACTION START ( Service Form ) -->

    <!-- CALL TO ACTION END -->

    <!-- TESTIMONIAL AREA START -->

    <!-- TESTIMONIAL AREA END -->

   

    

    <!-- BRAND LOGO AREA START -->
    <div class="ltn__brand-logo-area ltn__brand-logo-1 pt-80 pb-110 plr--9">
        <div class="container-fluid">
            <div class="row ltn__brand-logo-active">
                @if(Page::get('partners'))
                @foreach(Page::get('partners') as $partner)
                <div class="col-lg-12">
                    <div class="ltn__brand-logo-item">
                        <img src="{{ asset('storage/' . $partner->image) }}" alt="Brand Logo">
                    </div>
                </div>
                @endforeach
                @endif
              
            </div>
        </div>
    </div>
    <!-- BRAND LOGO AREA END -->
@endsection
