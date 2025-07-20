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

class About extends Template {

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
    
                'Main Content' => [
                    Text::make('Title')
                        ->translatable()
                        ->rules('required'),
    
                    Trix::make('Text')
                        ->translatable()
                        ->rules('required'),
    
                    Image::make('Image')
                        ->disk('public')
                        ->path('about-images')
                        ->rules('required', 'image'),
                ],
    
                'Team Section' => [
                    Flexible::make('Team Members')
                        ->addLayout('Team Member', 'team-member', [
                            Text::make('Name')
                                ->translatable()
                                ->rules('required'),
    
                            Text::make('Position')
                                ->translatable()
                                ->rules('required'),
    
                            Image::make('Profile Image')
                                ->disk('public')
                                ->path('team-images')
                                ->rules('required', 'image'),
                        ])
                        ->button('Add Team Member'),
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
