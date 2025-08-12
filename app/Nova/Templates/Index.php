<?php

namespace App\Nova\Templates;

use Laravel\Nova\Http\Requests\NovaRequest;
use Whitecube\NovaPage\Pages\Template;
use Whitecube\NovaFlexibleContent\Flexible;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Fields\Trix;
use Laravel\Nova\Fields\Image;

use Eminiarts\Tabs\Traits\HasTabs;
use Eminiarts\Tabs\Tabs;
use Eminiarts\Tabs\Tab;


class Index extends Template
{
    use HasTabs;

    /**
     * Get the fields displayed by the resource.
     *
     * @param  \Laravel\Nova\Http\Requests\NovaRequest  $request
     * @return array
     */
 
      
            public function fields(NovaRequest $request)
            {
                return [
                    Tabs::make('Page Content', [ // <-- Tabs::make, not Tab::make
                        Tab::make('Slider Section', [
                           
                                

                          
                                

                            Flexible::make('Slider')
                                ->addLayout('item','item', [
                                    Text::make('Title'),    
                                       
                                        

                                    Trix::make('Description'),
                                      

                                    Image::make('Image')
                                        ->disk('public')
                                        ->path('slider-images')
                                        ->rules('image'),
                                ])
                               
                                ->button('Add Slider Item'),
                        ]),

                        Tab::make('About Section', [
                            Text::make('Title 1','title_about_1'),
                                

                            Text::make('Title 2','title_about_2'),
                                

                            Trix::make('Text','text_about'),
                                

                            Image::make('Image 1','image_about')
                                ->disk('public')
                                ->path('about-images')
                                ->rules('image'),

                           
                        ]),

                        Tab::make('Pourquoi nous choisir Section', [

                            Text::make('Title','title_choisir_nous'),
                            
                            Trix::make('Text','text_choisir_nous'),
                            Image::make('Image','image_choisir_nous1')
                                ->disk('public')
                                ->path('choisir-nous-images')
                                ->rules('image'),

                            Image::make('Image','image_choisir_nous2')
                                ->disk('public')
                                ->path('choisir-nous-images')
                                ->rules('image'),
                            
                            Flexible::make('features')
                                ->addLayout('feature', 'feature', [
                                    Text::make('Title')
                                       ,

                                    Text::make('Description'),
                                       

                                    Image::make('Image')
                                        ->disk('public')
                                        ->path('choisir-nous-images')
                                        ->rules('image'),
                                ])
                               
                                ->button('Add Feature'),
                        ]),

                      

                     

                        Tab::make('Services Section', [
                            Text::make('Title','title_section_services')
                               ,
                                
                            Trix::make('Text','text_section_services')
                               ,
                                
                            Flexible::make('Services','services')
                                ->addLayout('Service', 'service', [
                                    Text::make('Title','title_service'),
                                       
                                         
                                    Trix::make('Description','description_service'),
                                       

                                    Image::make('Image','image_service')
                                        ->disk('public')
                                        ->path('services-images')
                                        ->rules('image'),
                                        
                                ])
                               
                                ->button('Add Service'),
                        ]),

                        
                        Tab::make('Partners Section', [
                            Text::make('Title','title_section_partners')
                               ,
                                
                          
                                
                            Flexible::make('Partners','partners')
                                ->addLayout('Partner', 'partner', [
                                    Text::make('Title','title_partner'),
                                       
                                
                
                                    Image::make('Image','image_partner')
                                        ->disk('public')
                                        ->path('partners-images')
                                        ->rules('image'),
                                        
                                ])
                               
                                ->button('Add Partner'),
                        ]),
                    ])
                ];
            }
        
    /**
     * Get the cards available for the request.
     *
     * @param  \Laravel\Nova\Http\Requests\NovaRequest  $request
     * @return array
     */
    public function cards(NovaRequest $request)
    {
        return [];
    }
}
