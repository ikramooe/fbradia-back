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

class Contact extends Template {

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
            Tabs::make('Page Content', [
                'Contact Information' => [
                    Text::make('Email')
                        ->translatable()
                        ->rules('required', 'email'),
    
                    Text::make('Address')
                        ->translatable()
                        ->rules('required'),
    
                    Flexible::make('Phone Numbers')
                        ->addLayout('Phone Number', 'phone', [
                            Text::make('Number')
                                ->rules('required')
                                // ->mask('(999) 999-9999') // Comment or remove if unsupported
                        ])
                        ->button('Add Phone Number'),
                ],
    
                'Social Links' => [
                    Text::make('Facebook Link')
                        ->rules('nullable', 'url'),
    
                    Text::make('Instagram Link')
                        ->rules('nullable', 'url'),
    
                    Text::make('LinkedIn Link')
                        ->rules('nullable', 'url'),
                ],
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
