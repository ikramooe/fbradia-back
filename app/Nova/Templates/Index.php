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

class Index extends Template {
   
    use HasTabs;
    /**
     * Get the fields displayed by the resource.
     *
     * @param  \Laravel\Nova\Http\Requests\NovaRequest $request
     * @return array
     */
    public function fields(NovaRequest $request)
    {
        return [
            Tab::make('Slider Section', [
                Text::make('Main Title')
                    ->translatable()
                    ->rules('required'),

                Trix::make('Main Description')
                    ->translatable()
                    ->rules('required'),

                Flexible::make('Slider Items')
                    ->addLayout('Slider Item', 'slider-item', [
                        Text::make('Title')
                            ->translatable()
                            ->rules('required'),

                        Trix::make('Description')
                            ->translatable()
                            ->rules('required'),

                        Image::make('Image')
                            ->disk('public')
                            ->path('slider-images')
                            ->rules('required', 'image'),
                    ])
                   
                    ->button('Add Slider Item'),
            ]),
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
