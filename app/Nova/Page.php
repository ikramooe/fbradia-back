<?php

namespace App\Nova;

use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Fields\Select;
use Laravel\Nova\Fields\Image;
use Laravel\Nova\Fields\Trix;
use Laravel\Nova\Fields\BelongsTo;
use Laravel\Nova\Fields\File;
use Whitecube\NovaPage\Pages\Template;
use Whitecube\NovaFlexibleContent\Flexible;
use Laravel\Nova\Http\Requests\NovaRequest;
use Eminiarts\Tabs\Traits\HasTabs;
use Eminiarts\Tabs\Tabs;
use Eminiarts\Tabs\Tab;
use Laravel\Nova\Panel;
use Alexwenzel\DependencyContainer\DependencyContainer;
use Alexwenzel\DependencyContainer\HasDependencies;

class Page extends Resource
{
    use HasDependencies;
    /**
     * The model the resource corresponds to.
     *
     * @var class-string<\App\Models\Page>
     */
    public static $model = \App\Models\Page::class;

    /**
     * The single value that should be used to represent the resource when being displayed.
     *
     * @return string
     */
    public function title()
    {
        return $this->title;
    }

    /**
     * The columns that should be searched.
     *
     * @var array
     */
    public static $search = [
        'id', 'title'
    ];

    /**
     * Get the fields displayed by the resource.
     *
     * @return array
     */
    public function fields(NovaRequest $request)
    {
        return [

            Text::make('Title')
            ->translatable()
            ->rules('required', 'max:255'),

        BelongsTo::make('Menu')
            ->rules('required'),

            Select::make('Template', 'model_type')
                ->options([
                    'model1' => 'Model 1',
                    'model2' => 'Model 2'
                ])
                ->displayUsingLabels()
                ->rules('required')
                ->hideFromIndex(),

            DependencyContainer::make([
                Text::make('Title','main_title')
                    ->translatable()
                  
                    ->onlyOnForms(),

                Text::make('Sub Title','sub_title')
                    ->translatable()
                   
                    ->onlyOnForms(),

                Image::make('Image')
                    ->disk('public')
                    ->path('pages')
                    ->rules('image')
                    ->onlyOnForms(),

                Trix::make('Content')
                    ->translatable()
                    ->rules('required')
                    ->onlyOnForms(),
            ])->dependsOn('model_type', 'model1'),

            DependencyContainer::make([
                Text::make('Title','main_title')
                    ->rules('required')
                    ->onlyOnForms(),
                    
                Trix::make('Description','description')
                   
                    ->onlyOnForms(),
                Flexible::make('Documents')
                    ->addLayout('Document', 'document', [
                        Text::make('Title')
                            ->translatable()
                            ->rules('required'),

                        Trix::make('Description')
                            ->translatable()
                            ->rules('required'),

                        File::make('Document File')
                            ->disk('public')
                            ->path('documents')
                            ->rules('required', 'file'),
                    ])
                    ->button('Add Document')
                    ->onlyOnForms(),
            ])->dependsOn('model_type', 'model2'),
        ];
    }
    

    /**
     * Get the cards available for the request.
     *
     * @return array
     */
    public function cards(NovaRequest $request)
    {
        return [];
    }

    /**
     * Get the filters available for the resource.
     *
     * @return array
     */
    public function filters(NovaRequest $request)
    {
        return [];
    }

    /**
     * Get the lenses available for the resource.
     *
     * @return array
     */
    public function lenses(NovaRequest $request)
    {
        return [];
    }

    /**
     * Get the actions available for the resource.
     *
     * @return array
     */
    public function actions(NovaRequest $request)
    {
        return [];
    }
}
