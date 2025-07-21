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
                        <h2 class="title">@lang('Contact')</h2>
                    </div>
                    <div class="breadcrumb-wrapper">
                        <span>
                            <a title="Homepage" href="/"><i class="fa fa-home"></i>@lang('Home')</a>
                        </span>
                        <span>@lang('Contact')</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- page-title end -->

<!--site-main start-->
<div class="site-main">
    <!--- conatact-section -->
    <section class="ttm-row conatact-section ttm-bgcolor-white clearfix">
        <div class="container">
            <!-- row -->
            <div class="row row-equal-height">
                <div class="col-xl-6">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3198.079582172874!2d3.1783368999999997!3d36.7206499!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x128e51f578d8ae47%3A0x9e6effe26e75ad55!2sOrdre%20National%20Des%20Experts%20Comptable!5e0!3m2!1sfr!2sdz!4v1753085652869!5m2!1sfr!2sdz" style="border:0; width:100%; height:450px;" allowfullscreen="" loading="lazy"></iframe>
                </div>
                <div class="col-xl-6">
                    <div class="padding_left30 res-1199-padding_left0 padding_top20 res-1199-padding_top40">
                        <!-- section title -->
                        <div class="section-title">
                            <div class="title-header">
                                <h3>@lang('CONTACTEZ-NOUS')</h3>
                                <h2 class="title">@lang('Besoin d\'aide ? Contactez<br> ONEC')</h2>
                            </div>
                            <div class="title-desc padding_right30">
                                <p>L'Ordre National des Experts-Comptables est à votre disposition pour répondre à vos questions et vous accompagner dans vos démarches professionnelles.</p>
                            </div>
                        </div><!-- section title end -->

                        <div class="row">
                            <div class="col-lg-12 col-md-12">
                                <!--featured-icon-box-->
                                <div class="featured-icon-box icon-align-before-content">
                                    <div class="featured-icon">
                                        <div
                                            class="ttm-icon ttm-icon_element-border ttm-icon_element-color-skincolor
                                        ttm-icon_element-style-round ttm-icon_element-size-sm ">
                                            <i
                                                class="flaticon flaticon-phone-call ttm-textcolor-skincolor"></i>
                                        </div>
                                    </div>
                                    <div class="featured-content padding_left25">
                                        <div class="featured-title text-left">
                                            <h3 class="margin_bottom0">@lang('Appelez-nous'): <span> 
                                            
                                                @if(Page::option('contact')->phone)
                                                     @foreach(json_decode(Page::option('contact')->phone_numbers) as $phone)
                                                     <span>{{ $phone->number }}</span>
                                                     @endforeach
                                                @endif
                                            
                                            
                                            </span>
                                            </h3>
                                        </div>
                                       
                                    </div>
                                </div><!-- featured-icon-box end-->
                            </div>
                            <div class="col-lg-12 col-md-12">
                                <!--featured-icon-box-->
                                <div class="featured-icon-box icon-align-before-content">
                                    <div class="featured-icon">
                                        <div
                                            class="ttm-icon ttm-icon_element-border ttm-icon_element-color-skincolor
                                        ttm-icon_element-style-round ttm-icon_element-size-sm ">
                                            <i class="flaticon flaticon-email-1 ttm-textcolor-skincolor"></i>
                                        </div>
                                    </div>
                                    <div class="featured-content padding_left25">
                                        <div class="featured-title text-left">
                                            <h3 class="margin_bottom0">@lang('Email'):</h3>
                                        </div>
                                        <div class="featured-desc text-left">{{Page::option('contact')->email}}</div>
                                    </div>
                                </div><!-- featured-icon-box end-->
                            </div>
                            <div class="col-lg-12 col-md-12">
                                <!--featured-icon-box-->
                                <div class="featured-icon-box icon-align-before-content">
                                    <div class="featured-icon">
                                        <div
                                            class="ttm-icon ttm-icon_element-border ttm-icon_element-color-skincolor
                                        ttm-icon_element-style-round ttm-icon_element-size-sm ">
                                            <i class="flaticon flaticon-location ttm-textcolor-skincolor"></i>
                                        </div>
                                    </div>
                                    @php
                                       $locale = app()->getLocale();   
                                    @endphp
                                    <div class="featured-content padding_left25">
                                        <div class="featured-title text-left">
                                            <h3 class="margin_bottom0">@lang('Address'):</h3>
                                        </div>
                                        <div class="featured-desc text-left">{{isset(json_decode(Page::option('contact')->address)->$locale) ? json_decode(Page::option('contact')->address)->$locale : ''}}</div>
                                    </div>
                                </div><!-- featured-icon-box end-->
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12 col-md-12">
                                <p class="padding_top30 rajdhani fs-18 padding_right30">@lang('Suivez-nous sur') <a href="{{Page::option('contact')->facebook}}"><strong>Facebook</strong></a> et <a href="{{Page::option('contact')->linkedin}}"><strong>LinkedIn</strong></a></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div><!-- row end -->
        </div>
    </section><!-- conatact-section end -->

    <section class="ttm-row form-section ttm-bgcolor-grey bg-img11 ttm-bg ttm-bgimage-yes clearfix">
        <div class="container">
            <!--row -->
            <div class="row">
                <div class="col-lg-12">
                    <!-- section title -->
                    <div class="section-title title-style-center_text">
                        <div class="title-header">
                            <h2 class="title">@lang('Envoyez-nous un message')</h2>
                        </div>
                        <div class="title-desc">
                            <p>@lang("Pour toute question ou demande d\'information, n'hésitez pas à nous contacter via ce formulaire. Notre équipe vous répondra dans les plus brefs délais").</p>
                        </div>
                    </div><!-- section title end -->
                </div>
            </div>
            <!--row -->
            <div class="row">
                <div class="col-lg-12">
                    <form id="request_qoute_form" class="request_qoute_form wrap-form clearfix"
                        method="post" novalidate="novalidate" action="#">
                        <div class="row">
                            <div class="col-md-6">
                                <span class="text-input"><input name="name" type="text" value=""
                                        placeholder="Votre Nom*" required="required"></span>
                            </div>
                            <div class="col-md-6">
                                <span class="text-input"><input name="subject" type="text"
                                        value="" placeholder="Sujet*"
                                        required="required"></span>
                            </div>
                            <div class="col-md-6">
                                <span class="text-input"><input name="phone" type="text" value=""
                                        placeholder="Numéro de téléphone*" required="required"></span>
                            </div>
                            <div class="col-md-6">
                                <span class="text-input"><input name="email" type="email" value=""
                                        placeholder="Votre Email*" required="required"></span>
                            </div>
                            <div class="col-lg-12">
                                <span class="text-input">
                                    <textarea name="message" rows="4" placeholder="Votre Message" required="required"></textarea>
                                </span>
                            </div>
                            <div class="col-lg-12">
                                <div class="padding_top15 text-center">
                                    <button
                                        class="submit ttm-btn ttm-btn-size-md ttm-btn-shape-rounded ttm-btn-style-fill ttm-btn-color-skincolor"
                                        type="submit">@lang('Envoyer le message')<i
                                            class="flaticon flaticon-right-arrow"></i></button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>

    <section class="ttm-row services-section ttm-bgcolor-white clearfix">
        <div class="container">
            <!--row -->
            <div class="row">
                <div class="col-lg-3 col-md-6">
                    <div class="ttm-bgcolor-white featured-icon-box icon-align-top-content box-shadow style2">
                        <div class="featured-icon">
                            <div
                                class="ttm-icon ttm-icon_element-fill ttm-icon_element-color-grey ttm-icon_element-style-round ttm-icon_element-size-md">
                                <i class="flaticon flaticon-checklist"></i>
                            </div>
                        </div>
                        <div class="featured-content">
                            <div class="featured-title">
                                <h3>Publications</h3>
                            </div>
                            <div class="featured-desc">
                                @lang('Consultez nos publications, rapports et communications professionnelles.')
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="ttm-bgcolor-white featured-icon-box icon-align-top-content box-shadow style2">
                        <div class="featured-icon">
                            <div
                                class="ttm-icon ttm-icon_element-fill ttm-icon_element-color-grey ttm-icon_element-style-round ttm-icon_element-size-md">
                                <i class="fa fa-headphones"></i>
                            </div>
                        </div>
                        <div class="featured-content">
                            <div class="featured-title">
                                <h3>@lang('Tableau des Experts')</h3>
                            </div>
                            <div class="featured-desc">
                                @lang('Consultez l\'annuaire des experts-comptables inscrits à l\'Ordre.')
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="ttm-bgcolor-white featured-icon-box icon-align-top-content box-shadow style2">
                        <div class="featured-icon">
                            <div
                                class="ttm-icon ttm-icon_element-fill ttm-icon_element-color-grey ttm-icon_element-style-round ttm-icon_element-size-md">
                                <i class="ti ti-comment"></i>
                            </div>
                        </div>
                        <div class="featured-content">
                            <div class="featured-title">
                                <h3>Formation Continue</h3>
                            </div>
                            <div class="featured-desc">
                                Découvrez nos programmes de formation et de développement professionnel.
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="ttm-bgcolor-white featured-icon-box icon-align-top-content box-shadow style2">
                        <div class="featured-icon">
                            <div
                                class="ttm-icon ttm-icon_element-fill ttm-icon_element-color-grey ttm-icon_element-style-round ttm-icon_element-size-md">
                                <i class="flaticon flaticon-time"></i>
                            </div>
                        </div>
                        <div class="featured-content">
                            <div class="featured-title">
                                <h3>Assistance en Ligne</h3>
                            </div>
                            <div class="featured-desc">
                                Contactez-nous via notre plateforme d'assistance en ligne pour un support rapide
                            </div>
                        </div>
                    </div>
                </div>
            </div><!-- row end -->
        </div>
    </section>
</div>

@endsection