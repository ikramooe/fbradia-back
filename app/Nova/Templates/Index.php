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
                                    Text::make('Title')
                                        ->translatable(),
                                        

                                    Trix::make('Description')
                                        ->translatable(),
                                      

                                    Image::make('Image')
                                        ->disk('public')
                                        ->path('slider-images')
                                        ->rules('image'),
                                ])
                               
                                ->button('Add Slider Item'),
                        ]),

                        Tab::make('About Section', [
                            Text::make('Title 1','title1')
                                ->translatable(),
                                

                            Text::make('Title 2','title2')
                                ->translatable(),
                                

                            Trix::make('Text','text')
                                ->translatable(),
                                

                            Image::make('Image 1','image1')
                                ->disk('public')
                                ->path('about-images')
                                ->rules('image'),

                            Image::make('Image 2','image2')
                                ->disk('public')
                                ->path('about-images')
                                ->rules('image'),
                        ]),

                        Tab::make('Partners Section', [

                            Text::make('Title','titlepartners')
                                ->translatable(),
                            
                            Flexible::make('Partners')
                                ->addLayout('Partner', 'partner', [
                                    Text::make('Name')
                                       ,

                                    Text::make('Link'),
                                       

                                    Image::make('Logo')
                                        ->disk('public')
                                        ->path('partners-logos')
                                        ->rules('image'),
                                ])
                               
                                ->button('Add Partner'),
                        ]),

                        Tab::make('Features Section', [
                            Text::make('Title 1','titlefeatures')
                                ->translatable(),
                                

                            Text::make('Title 2','titlefeatures2')
                                ->translatable(),
                                

                            Trix::make('Text','textfeatures')
                                ->translatable(),
                                

                            Image::make('Main Image','mainimagefeatures')
                                ->disk('public')
                                ->path('features-images')
                                ->rules('image'),

                            Flexible::make('Features','features')
                                ->addLayout('Feature', 'feature', [
                                    Text::make('Title')
                                        ->translatable(),
                                        

                                    Trix::make('Description')
                                        ->translatable(),
                                        
                                ])
                               
                                ->button('Add Feature'),
                        ]),

                        Tab::make('Content Section', [
                            Text::make('Section Title','sectiontitle')
                                ->translatable(),
                                

                            Trix::make('Section Text','sectiontext')
                                ->translatable(),
                                

                            Image::make('Section Image','sectionimage')
                                ->disk('public')
                                ->path('content-section-images')
                                ->rules('image'),
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
