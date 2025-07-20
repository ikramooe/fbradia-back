<?php

namespace App\Nova;

use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Fields\Number;
use Laravel\Nova\Fields\Select;
use Laravel\Nova\Fields\Trix;
use Laravel\Nova\Fields\BelongsTo;
use Laravel\Nova\Http\Requests\NovaRequest;

class Menu extends Resource
{
    /**
     * The model the resource corresponds to.
     *
     * @var class-string<\App\Models\Menu>
     */
    public static $model = \App\Models\Menu::class;

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
        'id', 'title', 'url', 'parent_id'
    ];

    /**
     * Get the fields displayed by the resource.
     *
     * @return array
     */
    public function fields(NovaRequest $request)
    {
        return [
            ID::make()->sortable(),

            Text::make('Title')
                ->translatable()
                ->rules('required', 'max:255'),

            Text::make('URL')
                ->rules('required'),

         

          

            Number::make('Order')
                ->rules('required', 'integer')
               ->default(0),

        
        ];
    }

    /**
     * Get the parent menu options for the select field.
     *
     * @return array
     */
    protected function getParentMenuOptions()
    {
        return Menu::whereNull('parent_id')
            ->pluck('title', 'id')
            ->toArray();
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
